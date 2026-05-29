<?php
header('Content-Type: application/json');

$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$order_id   = intval($data['order_id'] ?? 0);
$payment_id = $data['payment_id'] ?? '';
$cart_items = $data['cart_data'] ?? [];

if (!$order_id || !$payment_id || empty($cart_items)) {
    echo "Missing data";
    exit;
}

$stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price, subtotal, product_image, payment_id, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($cart_items as $item) {
    $name     = $item['product_name'];
    $qty      = $item['quantity'];
    $price    = $item['price'];
    $subtotal = $qty * $price;
    $image    = $item['product_image'];
    $status   = 'Paid';

    $stmt->bind_param("isiddsss", $order_id, $name, $qty, $price, $subtotal, $image, $payment_id, $status);
    $stmt->execute();
}

echo "success";
$conn->close();
?>
