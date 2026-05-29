<?php
session_start();
header("Content-Type: text/plain");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit;
}

// Get product ID and quantity from POST
$product_id = $_POST['product_id'] ?? null;
$quantity = $_POST['quantity'] ?? 1;

// Validate product ID
if (!$product_id) {
    echo "invalid";
    exit;
}

// Connect to database
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    echo "db_error";
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if product already exists in cart
$check = $conn->prepare("SELECT id FROM cart WHERE user_id = ? AND product_id = ?");
$check->bind_param("ii", $user_id, $product_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "already_exists";
    exit;
}

// Insert into cart
$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $user_id, $product_id, $quantity);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

// Cleanup
$stmt->close();
$conn->close();
?>
