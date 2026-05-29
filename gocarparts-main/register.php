<?php
session_start();

// Only run this if form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    // Check if fields are filled
   if (!$username || !$email || !$password || !$confirm) {
    header("Location: loginpage.php?error=" . urlencode("Please fill in all fields.") . "&source=register");
    exit;
}


    // Check if passwords match
    if ($password !== $confirm) {
        header("Location: loginpage.php?error=" . urlencode("Passwords do not match."). "&source=register");
        exit;
    }

    // DB connection - Docker MySQL
    $conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
    if ($conn->connect_error) {
        header("Location: loginpage.php?error=" . urlencode("Database connection failed."));
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
        header("Location: loginpage.php?error=" . urlencode("Email already registered."). "&source=register");
        exit;
    }

    // Insert new user
    $stmt->close();
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed);

    if ($stmt->execute()) {
        header("Location: loginpage.php?success=" . urlencode("Registration successful. Please log in."). "&source=register");
        exit;
    } else {
        header("Location: loginpage.php?error=" . urlencode("Error during registration. Please try again."). "&source=register");
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: loginpage.php?error=" . urlencode("Invalid request."));
    exit;
}
?>
