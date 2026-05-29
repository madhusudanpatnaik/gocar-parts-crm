<?php
/**
 * Place Order
 * Creates an order record in the database.
 * Requires user authentication — uses session user_id, not POST data.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

// Require login
requireLoginApi();

header('Content-Type: application/json');

// Use session user_id — never trust client-supplied user_id
$user_id = getUserId();

$email_or_mobile = trim($_POST['email_or_mobile'] ?? '');
$first_name      = trim($_POST['first_name'] ?? '');
$last_name       = trim($_POST['last_name'] ?? '');
$company_name    = trim($_POST['company_name'] ?? '');
$address         = trim($_POST['address'] ?? '');
$city            = trim($_POST['city'] ?? '');
$country         = trim($_POST['country'] ?? '');
$postal_code     = trim($_POST['postal_code'] ?? '');
$order_notes     = trim($_POST['order_notes'] ?? '');
$order_time      = date("Y-m-d H:i:s");

// Validate required fields
if (empty($first_name) || empty($address) || empty($city)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO orders (user_id, email_or_mobile, first_name, last_name, company_name, address, city, country, postal_code, order_notes, order_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", $user_id, $email_or_mobile, $first_name, $last_name, $company_name, $address, $city, $country, $postal_code, $order_notes, $order_time);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "order_id" => $stmt->insert_id
    ]);
} else {
    error_log("Order placement failed: " . $stmt->error);
    echo json_encode([
        "status" => "error",
        "message" => "Failed to place order. Please try again."
    ]);
}

$stmt->close();
$conn->close();
?>
