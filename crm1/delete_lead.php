<?php
/**
 * Delete Lead (CRM Admin)
 * Deletes a lead and its associated tasks.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdmin();

if (!isset($_GET['id']) || !isset($_GET['type'])) {
    die('Missing parameters');
}

$lead_id = intval($_GET['id']);
$lead_type = trim($_GET['type']);

// Validate lead type against whitelist
$valid_types = ['mileage', 'price', 'request_quote'];
if (!in_array($lead_type, $valid_types, true)) {
    die('Invalid lead type');
}

$table_map = [
    'mileage' => 'mileage_requests',
    'price' => 'price_requests',
    'request_quote' => 'quote_requests'
];
$table = $table_map[$lead_type];

// Use transaction for multi-table delete
$conn->begin_transaction();

try {
    // Delete from main lead table
    $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->bind_param("i", $lead_id);
    $stmt->execute();
    $stmt->close();

    // Also delete from emp_tasks table
    $stmt2 = $conn->prepare("DELETE FROM emp_tasks WHERE lead_id = ? AND lead_type = ?");
    $stmt2->bind_param("is", $lead_id, $lead_type);
    $stmt2->execute();
    $stmt2->close();

    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    error_log("CRM lead deletion failed: " . $e->getMessage());
    die('Deletion failed');
}

$conn->close();

// Redirect back to leads page
header("Location: leads_admin.php");
exit;
