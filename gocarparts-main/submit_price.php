<?php
// $host = "mysql";
// $user = "root";
// $password = "REDACTED";
// $dbname = "REDACTED_DB";

// $conn = new mysqli($host, $user, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Escape input data
// $name = $conn->real_escape_string($_POST['name']);
// $email = $conn->real_escape_string($_POST['email']);
// $contact_number = $conn->real_escape_string($_POST['contact_number']);
// $zipcode = $conn->real_escape_string($_POST['zipcode']);
// $notes = $conn->real_escape_string($_POST['notes']);

// // Hidden input values
// $make = isset($_POST['make']) ? $conn->real_escape_string($_POST['make']) : '';
// $model = isset($_POST['model']) ? $conn->real_escape_string($_POST['model']) : '';
// $category = isset($_POST['category']) ? $conn->real_escape_string($_POST['category']) : '';
// $year = isset($_POST['year']) ? $conn->real_escape_string($_POST['year']) : '';
// $submodel = isset($_POST['submodel']) ? $conn->real_escape_string($_POST['submodel']) : '';

// // Insert into 'price_requests' table
// $sql = "INSERT INTO price_requests (name, email, contact_number, zipcode, notes, make, model, category, year, submodel)
//         VALUES ('$name', '$email', '$contact_number', '$zipcode', '$notes', '$make', '$model', '$category', '$year', '$submodel')";

// if ($conn->query($sql) === TRUE) {
//     echo "<script>alert('Price request submitted successfully! Our team will contact you.'); window.history.back();</script>";
// } else {
//     echo "Error: " . $conn->error;
// }

// $conn->close();



session_start(); // ✅ Start session to access user_id

$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_id from session (if logged in)
$user_id = isset($_SESSION['user_id']) ? $conn->real_escape_string($_SESSION['user_id']) : 'NULL';

// Escape input data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$contact_number = $conn->real_escape_string($_POST['contact_number']);
$zipcode = $conn->real_escape_string($_POST['zipcode']);
$notes = $conn->real_escape_string($_POST['notes']);

// Hidden input values
$make = isset($_POST['make']) ? $conn->real_escape_string($_POST['make']) : '';
$model = isset($_POST['model']) ? $conn->real_escape_string($_POST['model']) : '';
$category = isset($_POST['category']) ? $conn->real_escape_string($_POST['category']) : '';
$year = isset($_POST['year']) ? $conn->real_escape_string($_POST['year']) : '';
$submodel = isset($_POST['submodel']) ? $conn->real_escape_string($_POST['submodel']) : '';

// Insert into 'quote_requests' table
$sql = "INSERT INTO price_requests (user_id, name, email, contact_number, zipcode, notes, make, model, category, year, submodel)
        VALUES ($user_id, '$name', '$email', '$contact_number', '$zipcode', '$notes', '$make', '$model', '$category', '$year', '$submodel')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Price requested successfully! Our team will contact you.'); window.history.back();</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
