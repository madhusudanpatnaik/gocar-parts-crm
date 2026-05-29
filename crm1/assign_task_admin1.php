<?php
/**
 * Assign Task to Employee (Admin API)
 * Assigns or reassigns a lead to an employee.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdminApi();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method not allowed";
    exit;
}

$lead_id = isset($_POST['lead_id']) ? intval($_POST['lead_id']) : 0;
$employee_id = isset($_POST['employee_id']) ? intval($_POST['employee_id']) : 0;

if ($lead_id <= 0 || $employee_id <= 0) {
    http_response_code(400);
    echo "Invalid parameters";
    exit;
}

// Verify the employee exists and has the employee role
$empCheck = $conn->prepare("SELECT id FROM users WHERE id = ? AND role = 'employee'");
$empCheck->bind_param("i", $employee_id);
$empCheck->execute();
$empResult = $empCheck->get_result();

if ($empResult->num_rows === 0) {
    http_response_code(400);
    echo "Invalid employee";
    $empCheck->close();
    exit;
}
$empCheck->close();

// Check if task already assigned
$check = $conn->prepare("SELECT * FROM emp_tasks WHERE lead_id = ?");
$check->bind_param("i", $lead_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    // Reassign
    $update = $conn->prepare("UPDATE emp_tasks SET employee_id = ?, status = 'Reassigned' WHERE lead_id = ?");
    $update->bind_param("ii", $employee_id, $lead_id);
    $update->execute();
    $update->close();
} else {
    // First-time assign
    $insert = $conn->prepare("INSERT INTO emp_tasks (lead_id, employee_id, status) VALUES (?, ?, 'Assigned')");
    $insert->bind_param("ii", $lead_id, $employee_id);
    $insert->execute();
    $insert->close();
}

$check->close();
echo "success";
$conn->close();
?>
