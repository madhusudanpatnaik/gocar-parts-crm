<?php
session_start();

// Database connection
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lead_id = $_POST['lead_id'];
$employee_id = $_POST['employee_id'];

// Check if task already assigned
$check_sql = "SELECT * FROM emp_tasks WHERE lead_id = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("i", $lead_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Reassign - update employee_id and status
    $update_sql = "UPDATE emp_tasks SET employee_id = ?, status = 'Reassigned' WHERE lead_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ii", $employee_id, $lead_id);
    $update_stmt->execute();
} else {
    // First-time assign
    $insert_sql = "INSERT INTO emp_tasks (lead_id, employee_id, status) VALUES (?, ?, 'Assigned')";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ii", $lead_id, $employee_id);
    $insert_stmt->execute();
}

echo "success";
?>




