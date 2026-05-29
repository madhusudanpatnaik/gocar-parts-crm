<?php
/**
 * Submit Price Request
 * Saves a price request using prepared statements.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

ensureSession();

// Get user_id from session (if logged in)
$user_id = getUserId();

// Collect and validate input
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact_number = trim($_POST['contact_number'] ?? '');
$zipcode = trim($_POST['zipcode'] ?? '');
$notes = trim($_POST['notes'] ?? '');
$make = trim($_POST['make'] ?? '');
$model = trim($_POST['model'] ?? '');
$category = trim($_POST['category'] ?? '');
$year = trim($_POST['year'] ?? '');
$submodel = trim($_POST['submodel'] ?? '');

// Basic validation
if (empty($name) || empty($email) || empty($contact_number)) {
    echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Please enter a valid email address.'); window.history.back();</script>";
    exit;
}

// Insert using prepared statement
$stmt = $conn->prepare("INSERT INTO price_requests (user_id, name, email, contact_number, zipcode, notes, make, model, category, year, submodel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", $user_id, $name, $email, $contact_number, $zipcode, $notes, $make, $model, $category, $year, $submodel);

if ($stmt->execute()) {
    echo "<script>alert('Price requested successfully! Our team will contact you.'); window.history.back();</script>";
} else {
    error_log("Price request insert failed: " . $stmt->error);
    echo "<script>alert('An error occurred. Please try again later.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
