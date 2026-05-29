<?php
/**
 * Get Custom Quote
 * Saves a custom quote request and sends email notification.
 * Uses prepared statements for security.
 */
require_once __DIR__ . '/includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method not allowed";
    exit;
}

// Collect POST data
$product_id = trim($_POST['product_id'] ?? '');
$name       = trim($_POST['name'] ?? '');
$email      = trim($_POST['email'] ?? '');
$phone      = trim($_POST['phone'] ?? '');
$zipcode    = trim($_POST['zipcode'] ?? '');
$price      = trim($_POST['price'] ?? '');
$miles      = trim($_POST['miles'] ?? '');
$notes      = trim($_POST['notes'] ?? '');
$mechanic   = trim($_POST['mechanic'] ?? '');

// Validate required fields
if (empty($name) || empty($email) || empty($phone)) {
    http_response_code(400);
    echo "Please fill in all required fields.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Please enter a valid email address.";
    exit;
}

// Insert using prepared statement
$stmt = $conn->prepare("INSERT INTO get_custom_quote (name, email, phone, zipcode, preferred_price, preferred_miles, notes, need_mechanic) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $email, $phone, $zipcode, $price, $miles, $notes, $mechanic);

if (!$stmt->execute()) {
    error_log("Custom quote insert failed: " . $stmt->error);
    http_response_code(500);
    echo "An error occurred. Please try again later.";
    $stmt->close();
    $conn->close();
    exit;
}

$stmt->close();
$conn->close();

// Send email notification (if mail is configured)
$to      = getenv('ADMIN_EMAIL') ?: "admin@example.com";
$subject = "Custom Quote Request";
$message = "Product ID: $product_id\n"
         . "Name: $name\n"
         . "Email: $email\n"
         . "Phone: $phone\n"
         . "Zipcode: $zipcode\n"
         . "Price: $price\n"
         . "Miles: $miles\n"
         . "Notes: $notes\n"
         . "Mechanic: $mechanic";
$headers = "From: noreply@gocarparts.com";

@mail($to, $subject, $message, $headers);

echo "success";
?>
