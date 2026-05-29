<?php
/**
 * Place Order Items
 * Inserts cart items into orders table.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireLoginApi();

header("Content-Type: application/json");

// Receive raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Check if data received
if (!$data || empty($data['cartItems'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'No cart data received.']);
    exit;
}

// Prepare insert
$stmt = $conn->prepare("INSERT INTO orders (product_name, quantity, price) VALUES (?, ?, ?)");

$conn->begin_transaction();

try {
    foreach ($data['cartItems'] as $item) {
        $product = trim($item['product_name'] ?? '');
        $qty = (int)($item['quantity'] ?? 0);
        $price = (float)($item['price'] ?? 0);

        if (empty($product) || $qty <= 0 || $price <= 0) {
            throw new Exception("Invalid item data");
        }

        $stmt->bind_param("sid", $product, $qty, $price);
        $stmt->execute();
    }
    
    $conn->commit();
    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
} catch (Exception $e) {
    $conn->rollback();
    error_log("Order items insert failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order.']);
}

$stmt->close();
$conn->close();
?>
