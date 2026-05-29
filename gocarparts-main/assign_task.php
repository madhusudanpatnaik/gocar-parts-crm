<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireEmployee();

$employee_id = $_SESSION['user_id'];
$page = isset($_SESSION['current_page']) ? (int)$_SESSION['current_page'] : 1;

// Validate input
if (!isset($_POST['lead_id']) || !isset($_POST['lead_type']) || !is_numeric($_POST['lead_id'])) {
    header("Location: emp_leads.php?page=$page&error=invalid_input");
    exit;
}

$lead_id = (int)$_POST['lead_id'];
$lead_type = $_POST['lead_type'];

// Validate lead type
$valid_types = ['mileage', 'price', 'request_quote'];
if (!in_array($lead_type, $valid_types)) {
    header("Location: emp_leads.php?page=$page&error=invalid_lead_type");
    exit;
}

// Check if lead exists in the appropriate table
$table_map = [
    'mileage' => 'mileage_requests',
    'price' => 'price_requests',
    'request_quote' => 'quote_requests'
];

if (!isset($table_map[$lead_type])) {
    header("Location: emp_leads.php?page=$page&error=invalid_lead_type");
    exit;
}

$table_name = $table_map[$lead_type];
$check_lead = $conn->prepare("SELECT id FROM $table_name WHERE id = ?");
$check_lead->bind_param("i", $lead_id);
$check_lead->execute();
$lead_result = $check_lead->get_result();

if ($lead_result->num_rows === 0) {
    header("Location: emp_leads.php?page=$page&error=lead_not_found");
    exit;
}

// Check if already assigned to anyone
$check_assigned = $conn->prepare("SELECT employee_id FROM emp_tasks WHERE lead_id = ? AND lead_type = ?");
$check_assigned->bind_param("is", $lead_id, $lead_type);
$check_assigned->execute();
$assigned_result = $check_assigned->get_result();

if ($assigned_result->num_rows > 0) {
    $existing = $assigned_result->fetch_assoc();
    if ($existing['employee_id'] == $employee_id) {
        header("Location: emp_leads.php?page=$page&error=already_assigned_to_you");
    } else {
        header("Location: emp_leads.php?page=$page&error=already_assigned_to_other");
    }
    exit;
}

// Assign the lead
$stmt = $conn->prepare("INSERT INTO emp_tasks (lead_id, lead_type, employee_id, assigned_at, status) VALUES (?, ?, ?, NOW(), 'pending')");
$stmt->bind_param("isi", $lead_id, $lead_type, $employee_id);

if ($stmt->execute()) {
    header("Location: emp_leads.php?page=$page&success=lead_assigned");
} else {
    header("Location: emp_leads.php?page=$page&error=assignment_failed");
}

$conn->close();
exit;
?>