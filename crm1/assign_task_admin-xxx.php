<?php
require_once __DIR__ . '/includes/config.php';

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lead_id = $_POST['lead_id'];
    $lead_type = $_POST['lead_type'];
    $employee_id = $_POST['employee_id'];

    // Check if already assigned
    $check = $conn->prepare("SELECT id FROM emp_tasks WHERE lead_id=? AND lead_type=?");
    $check->bind_param("is", $lead_id, $lead_type);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // Update assignment
        $update = $conn->prepare("UPDATE emp_tasks SET employee_id=?, status='assigned' WHERE lead_id=? AND lead_type=?");
        $update->bind_param("iis", $employee_id, $lead_id, $lead_type);
        $update->execute();
    } else {
        // Insert new assignment
        $stmt = $conn->prepare("INSERT INTO emp_tasks (lead_id, lead_type, employee_id, status) VALUES (?, ?, ?, 'assigned')");
        $stmt->bind_param("isi", $lead_id, $lead_type, $employee_id);
        $stmt->execute();
    }

    header("Location: leads_admin.php");
    exit();
}
?>
