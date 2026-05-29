<?php
/**
 * Get Lead Notes API
 * Returns notes for a specific lead.
 * Requires employee or admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireRoleApi(['admin', 'employee']);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

if (!isset($_GET['lead_id'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Lead ID is required']);
    exit;
}

$lead_id = intval($_GET['lead_id']);

$stmt = $conn->prepare("SELECT * FROM lead_notes WHERE lead_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $lead_id);
$stmt->execute();
$result = $stmt->get_result();

$notes = [];
while ($row = $result->fetch_assoc()) {
    $notes[] = $row;
}

echo json_encode(['status' => 'success', 'data' => $notes]);

$stmt->close();
$conn->close();
?>