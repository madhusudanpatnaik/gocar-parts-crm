<?php
/**
 * User Registration Handler
 * Registers new users with proper validation and prepared statements.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

ensureSession();

// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: loginpage.php?error=" . urlencode("Invalid request."));
    exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Validate required fields
if (!$username || !$email || !$password || !$confirm) {
    header("Location: loginpage.php?error=" . urlencode("Please fill in all fields.") . "&source=register");
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: loginpage.php?error=" . urlencode("Please enter a valid email address.") . "&source=register");
    exit;
}

// Validate password strength
if (strlen($password) < 8) {
    header("Location: loginpage.php?error=" . urlencode("Password must be at least 8 characters long.") . "&source=register");
    exit;
}

// Check if passwords match
if ($password !== $confirm) {
    header("Location: loginpage.php?error=" . urlencode("Passwords do not match.") . "&source=register");
    exit;
}

// Validate username length
if (strlen($username) < 3 || strlen($username) > 50) {
    header("Location: loginpage.php?error=" . urlencode("Username must be between 3 and 50 characters.") . "&source=register");
    exit;
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: loginpage.php?error=" . urlencode("Email already registered.") . "&source=register");
    exit;
}
$stmt->close();

// Insert new user with hashed password
$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
$stmt->bind_param("sss", $username, $email, $hashed);

if ($stmt->execute()) {
    header("Location: loginpage.php?success=" . urlencode("Registration successful. Please log in.") . "&source=register");
    exit;
} else {
    error_log("Registration failed: " . $stmt->error);
    header("Location: loginpage.php?error=" . urlencode("Error during registration. Please try again.") . "&source=register");
    exit;
}

$stmt->close();
$conn->close();
?>
