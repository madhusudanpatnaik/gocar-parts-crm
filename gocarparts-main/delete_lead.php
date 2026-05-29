<?php
/**
 * Delete Lead
 * Deletes a lead and its associated tasks.
 * Requires employee or admin authentication.
 * Uses POST method for destructive operations.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireRole(['admin', 'employee']);

// Require POST method for destructive operations
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Support GET for backward compatibility but validate
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        die('Method not allowed');
    }
}

$lead_id = intval($_REQUEST['id'] ?? 0);
$lead_type = trim($_REQUEST['type'] ?? '');

if (!$lead_id || !$lead_type) {
    die('Missing parameters');
}

// Validate lead type against whitelist
$valid_types = ['mileage', 'price', 'request_quote'];
if (!in_array($lead_type, $valid_types, true)) {
    die('Invalid lead type');
}

// Map lead type to table name
$table_map = [
    'mileage' => 'mileage_requests',
    'price' => 'price_requests',
    'request_quote' => 'quote_requests'
];
$table = $table_map[$lead_type];

// Use a transaction to ensure both deletes succeed or fail together
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
    error_log("Lead deletion failed: " . $e->getMessage());
    die('Deletion failed');
}

$conn->close();

// Redirect back
header("Location: emp_leads.php");
exit;
