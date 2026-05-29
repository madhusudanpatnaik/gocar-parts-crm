<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

// Database connection
$host = "mysql";
$user = "root";
$pass = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'DB connection failed: ' . $conn->connect_error]);
    exit;
}

// Get product ID
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid product ID']);
    exit;
}

// Delete product from products table
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Query preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $id);
if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Delete failed: ' . $stmt->error]);
    exit;
}

$affected_rows = $stmt->affected_rows;
$stmt->close();

if ($affected_rows > 0) {
    echo json_encode(['status' => 'success', 'message' => 'Product deleted successfully']);
} else {
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'Product not found or already deleted']);
}

$conn->close();
