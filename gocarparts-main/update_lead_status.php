<?php
/**
 * Update Lead Status
 * Marks a lead task as completed.
 * Requires employee or admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireRoleApi(['admin', 'employee']);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$lead_id = isset($_POST['lead_id']) ? intval($_POST['lead_id']) : 0;
$lead_type = trim($_POST['lead_type'] ?? '');

if (!$lead_id || !$lead_type) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    exit;
}

// Validate lead_type
$valid_types = ['mileage', 'price', 'request_quote'];
if (!in_array($lead_type, $valid_types, true)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid lead type']);
    exit;
}

$stmt = $conn->prepare("UPDATE emp_tasks SET status = 'completed' WHERE lead_id = ? AND lead_type = ?");
$stmt->bind_param("is", $lead_id, $lead_type);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    error_log("Lead status update failed: " . $stmt->error);
    echo json_encode(['status' => 'error', 'message' => 'Update failed']);
}

$stmt->close();
$conn->close();
?>
