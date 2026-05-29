<?php
// Docker MySQL Configuration
$servername = "mysql";              // Docker service name
$username = "root";                 // MySQL root user
$password = "REDACTED";              // MySQL root password
$database = "REDACTED_DB";    // Database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
