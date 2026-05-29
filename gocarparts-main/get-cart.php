<?php
/**
 * Get Cart Items
 * Returns cart items joined with product data.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$userId = getUserId();

// Join cart and products tables — using image_url to match actual schema
$sql = "SELECT 
            c.quantity,
            p.name,
            p.price,
            p.image_url AS image
        FROM cart c
        INNER JOIN products p ON c.product_id = p.id
        WHERE c.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$cartItems = [];

while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

echo json_encode($cartItems);

$stmt->close();
$conn->close();
?>
