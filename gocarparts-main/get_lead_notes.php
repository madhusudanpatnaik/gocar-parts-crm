<?php
// header('Content-Type: application/json');
require_once 'db_config.php';

// Check if the request is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

// Validate input
if (!isset($_GET['lead_id'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Lead ID is required']);
    exit;
}

$lead_id = $_GET['lead_id'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT * FROM lead_notes WHERE lead_id = :lead_id ORDER BY created_at DESC");
    $stmt->bindParam(':lead_id', $lead_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['status' => 'success', 'data' => $notes]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>