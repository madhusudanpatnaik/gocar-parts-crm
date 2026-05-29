<?php
/**
 * Add to Cart
 * Adds a product to the user's cart or increments quantity if it exists.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

header("Content-Type: text/plain");

// Check if user is logged in
if (!isLoggedIn()) {
    echo "not_logged_in";
    exit;
}

// Get product ID and quantity from POST
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$quantity = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;

// Validate product ID
if ($product_id <= 0) {
    echo "invalid";
    exit;
}

$user_id = getUserId();

// Check if product already exists in cart
$check = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
$check->bind_param("ii", $user_id, $product_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    // Update quantity instead of returning "already_exists"
    $existing = $result->fetch_assoc();
    $newQty = $existing['quantity'] + $quantity;
    $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
    $update->bind_param("ii", $newQty, $existing['id']);
    if ($update->execute()) {
        echo "updated";
    } else {
        echo "error";
    }
    $update->close();
} else {
    // Insert into cart
    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    $stmt->close();
}

$check->close();
$conn->close();
?>
