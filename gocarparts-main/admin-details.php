<?php
// Database connection
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Users to insert
$users = [
    [
        "username" => "employee1",
        "email" => "employee1@example.com",
        "password" => "employee@123",
        "role" => "employee"
    ]
];

$sql = "INSERT INTO users (username, email, password, role, created_at) 
        VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

foreach ($users as $user) {
    $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $user['username'], $user['email'], $hashedPassword, $user['role']);
    
    if ($stmt->execute()) {
        echo "✅ User '{$user['username']}' added successfully!<br>";
    } else {
        echo "❌ Error adding '{$user['username']}': " . $stmt->error . "<br>";
    }
}

$stmt->close();
$conn->close();
?>
