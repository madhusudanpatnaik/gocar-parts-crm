<?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lead_id = (int)$_POST['lead_id'];
    $lead_type = $_POST['lead_type'];
    $employee_id = (int)$_POST['employee_id'];

    if (!$lead_id || !$lead_type || !$employee_id) {
        die("Invalid input.");
    }

    // Update assignment
    $update_stmt = $conn->prepare("UPDATE emp_tasks SET employee_id = ?, status = 'assigned' WHERE lead_id = ? AND lead_type = ?");
    $update_stmt->bind_param("iis", $employee_id, $lead_id, $lead_type);
    $update_stmt->execute();
    $update_stmt->close();

    header("Location: leads_admin.php?success=1");
    exit;
} else {
    echo "Invalid request.";
}
?>
