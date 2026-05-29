<?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_GET['id']) || !isset($_GET['type'])) {
    die('Missing parameters');
}

$lead_id = intval($_GET['id']);
$lead_type = $_GET['type'];

// Determine table based on lead type
switch ($lead_type) {
    case 'mileage':
        $table = 'mileage_requests';
        break;
    case 'price':
        $table = 'price_requests';
        break;
    case 'request_quote': // ✅ keep this to match your original SQL
        $table = 'quote_requests';
        break;
    default:
        die('Invalid lead type');
}

// Delete from main lead table
$delete_query = "DELETE FROM $table WHERE id = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("i", $lead_id);
$stmt->execute();

// Also delete from emp_tasks table
$task_delete_query = "DELETE FROM emp_tasks WHERE lead_id = ? AND lead_type = ?";
$stmt2 = $conn->prepare($task_delete_query);
$stmt2->bind_param("is", $lead_id, $lead_type);
$stmt2->execute();

$stmt->close();
$stmt2->close();
$conn->close();

// Redirect back
header("Location: leads_adminffff.php");
exit;
