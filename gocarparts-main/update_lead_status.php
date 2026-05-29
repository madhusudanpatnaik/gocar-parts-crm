<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lead_id = $_POST['lead_id'] ?? null;
    $lead_type = $_POST['lead_type'] ?? null;

    if (!$lead_id || !$lead_type) {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
        exit;
    }

    // DB connection
    $conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE emp_tasks SET status = 'completed' WHERE lead_id = ? AND lead_type = ?");
    $stmt->bind_param("is", $lead_id, $lead_type);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failed']);
    }

    $stmt->close();
    $conn->close();
}
?>
