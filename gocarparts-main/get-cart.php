<?php
session_start();

// ✅ Make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$userId = $_SESSION['user_id'];

$host = "mysql"; // or your actual host
$username = "root";
$password = "REDACTED";
$database = "REDACTED_DB";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Join cart and products tables
$sql = "SELECT 
            c.quantity,
            p.name,
            p.price,
            p.image
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
?>
