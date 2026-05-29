<?php

// place-order.php
header('Content-Type: application/json');

// DB Connection
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id         = $_POST['user_id'] ?? null;
$email_or_mobile = $_POST['email_or_mobile'] ?? '';
$first_name      = $_POST['first_name'] ?? '';
$last_name       = $_POST['last_name'] ?? '';
$company_name    = $_POST['company_name'] ?? '';
$address         = $_POST['address'] ?? '';
$city            = $_POST['city'] ?? '';
$country         = $_POST['country'] ?? '';
$postal_code     = $_POST['postal_code'] ?? '';
$order_notes     = $_POST['order_notes'] ?? '';
$order_time      = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO orders (user_id, email_or_mobile, first_name, last_name, company_name, address, city, country, postal_code, order_notes, order_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", $user_id, $email_or_mobile, $first_name, $last_name, $company_name, $address, $city, $country, $postal_code, $order_notes, $order_time);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "order_id" => $stmt->insert_id
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();

?>
