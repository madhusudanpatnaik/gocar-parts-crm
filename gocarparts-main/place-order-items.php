<?php
header("Content-Type: application/json");

// Database connection
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}

// Receive raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Check if data received
if (!$data || empty($data['cartItems'])) {
    echo json_encode(['status' => 'error', 'message' => 'No cart data received.']);
    exit;
}

// Prepare insert
$stmt = $conn->prepare("INSERT INTO orders (product_name, quantity, price) VALUES (?, ?, ?)");

foreach ($data['cartItems'] as $item) {
    $product = $item['product_name'];
    $qty = (int)$item['quantity'];
    $price = (float)$item['price'];

    $stmt->bind_param("sid", $product, $qty, $price);
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
?>
