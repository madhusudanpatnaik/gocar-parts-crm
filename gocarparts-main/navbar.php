<?php
require_once __DIR__ . '/includes/config.php';

session_start(); // ✅ make sure session exists

// connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/* =======================
   CREATE NOTE (per user)
   ======================= */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['note_text'])) {
  $employee = $_SESSION['username'] ?? 'Unknown';
  $user_id  = $_SESSION['user_id'] ?? 0;
  $note     = $conn->real_escape_string($_POST['note_text']);

  $stmt = $conn->prepare("INSERT INTO notes (user_id, employee_name, note_text, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->bind_param("iss", $user_id, $employee, $note);
  $stmt->execute();
  $stmt->close();
}

/* =======================
   FETCH NOTES (this user)
   ======================= */
$notes = [];
$user_id = $_SESSION['user_id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) { $notes[] = $row; }
$stmt->close();

/* =======================
   FETCH TASKS (for SMS/Email tabs) — from my_tasks.php logic
   ======================= */
$tasks = [];
$employee_id = $_SESSION['user_id'] ?? 0;

$filter_lead_id   = $_GET['lead_id'] ?? null;
$filter_lead_type = $_GET['type'] ?? null;


if ($employee_id) {
  $task_query = "
    SELECT 
      et.id AS task_id,
      et.lead_id,
      et.lead_type,
      et.assigned_at,
      et.status,
      l.user_id,
      l.name,
      l.email,
      l.contact_number,
      l.zipcode,
      l.notes,
      l.make,
      l.model,
      l.submitted_at
    FROM emp_tasks et
    JOIN (
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'mileage' AS lead_type 
        FROM mileage_requests
        UNION ALL
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'price' AS lead_type 
        FROM price_requests
        UNION ALL
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'request_quote' AS lead_type 
        FROM quote_requests
    ) AS l 
      ON et.lead_id = l.id AND et.lead_type = l.lead_type
    WHERE et.employee_id = ?
  ";

  // ✅ If lead_id passed, filter only that record
  if ($filter_lead_id && $filter_lead_type) {
    $task_query .= " AND et.lead_id = ? AND et.lead_type = ? ";
  }

  $task_query .= " ORDER BY et.assigned_at DESC LIMIT 100";

  $task_stmt = $conn->prepare($task_query);

  if ($filter_lead_id && $filter_lead_type) {
    $task_stmt->bind_param("iis", $employee_id, $filter_lead_id, $filter_lead_type);
  } else {
    $task_stmt->bind_param("i", $employee_id);
  }

  $task_stmt->execute();
  $task_res = $task_stmt->get_result();
  while ($r = $task_res->fetch_assoc()) { $tasks[] = $r; }
  $task_stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NavBAr - Employee Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="emp_style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f6fa; }
    .navbar { display: flex; background: #2c3e50; padding: 10px; gap: 8px; }
    .navbar a { color: white; padding: 10px 20px; text-decoration: none; transition: background 0.3s; }
    .navbar a:hover, .navbar a.active { background: #34495e; border-radius: 4px; }
    .content { padding: 20px; }
    .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); max-width: 700px; margin: 20px auto; }
    .card textarea { width: 100%; min-height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; resize: vertical; margin: 10px 0; box-sizing: border-box; }
    .card button { background: #2980b9; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; }
    .card button:hover { background: #1c5982; }
    .notes-list { max-width: 700px; margin: 20px auto; }
    .note-item { background: #fff; padding: 12px; margin-bottom: 12px; border-radius: 8px; border: 1px solid #e5e7eb; }
    .note-item strong { color: #2c3e50; display: block; margin-bottom: 4px; }
    .note-time { font-size: 12px; color: #777; margin-top: 6px; }
    .lead-kv { font-size: 14px; color: #333; }
  </style>
</head>
<body>
    <div class="layout">
<?php include('sidebar.php'); ?>
  <!-- Navbar -->
     <div class="main-content">
  <!-- Navbar -->
  <div class="navbar">
    <a href="#" onclick="showTab('payment')">Payment</a>
    <a href="#" onclick="showTab('email')">Email</a>
    <a href="#" onclick="showTab('sms')">SMS</a>
    <a href="#" class="active" onclick="showTab('notes')">Notes</a>
    <a href="#" onclick="showTab('tasks')">Tasks</a>
  </div>

  <div class="content">

    <!-- Notes Tab -->
    <div id="notes" class="tab" style="display:block">
      <div class="card">
        <h3>Create New Note</h3>
        <form method="POST">
          <textarea name="note_text" placeholder="Write a note..."></textarea>
          <button type="submit">Submit</button>
        </form>
      </div>

      <div class="notes-list">
        <?php if (empty($notes)): ?>
          <div class="alert alert-info">No notes yet.</div>
        <?php else: ?>
          <?php foreach ($notes as $note): ?>
            <div class="note-item">
              <strong><?= htmlspecialchars($note['employee_name']) ?></strong>
              <?= nl2br(htmlspecialchars($note['note_text'])) ?>
              <div class="note-time"><?= date("d-m-Y h:i A", strtotime($note['created_at'])) ?></div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- Email Tab (from your assigned leads) -->
    <div id="email" class="tab" style="display:none">
      <h2>Email Section</h2>
      <div class="notes-list">
        <?php if (empty($tasks)): ?>
          <div class="alert alert-info">No assigned leads to email.</div>
        <?php else: ?>
          <?php foreach ($tasks as $row): ?>
            <div class="note-item">
              <strong><?= htmlspecialchars($row['name'] ?? 'Customer') ?></strong>
              <div class="lead-kv">📧 <?= htmlspecialchars($row['email'] ?? 'N/A') ?></div>
              <div class="lead-kv">🚗 <?= htmlspecialchars(($row['make'] ?? '') . ' ' . ($row['model'] ?? '')) ?></div>
              <div class="note-time">Assigned: <?= date("d-m-Y h:i A", strtotime($row['assigned_at'])) ?></div>

              <button type="button" class="btn btn-info mt-2"
                onclick="sendEmail('<?= htmlspecialchars($row['email'] ?? '', ENT_QUOTES) ?>')">
                Send Email
              </button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- SMS Tab (from your assigned leads) -->
    <div id="sms" class="tab" style="display:none">
      <h2>SMS Section</h2>
      <div class="notes-list">
        <?php if (empty($tasks)): ?>
          <div class="alert alert-info">No assigned leads to text.</div>
        <?php else: ?>
          <?php foreach ($tasks as $row): ?>
            <div class="note-item">
              <strong><?= htmlspecialchars($row['name'] ?? 'Customer') ?></strong>
              <div class="lead-kv">📱 <?= htmlspecialchars($row['contact_number'] ?? 'N/A') ?></div>
              <div class="lead-kv">🚗 <?= htmlspecialchars(($row['make'] ?? '') . ' ' . ($row['model'] ?? '')) ?></div>
              <div class="note-time">Assigned: <?= date("d-m-Y h:i A", strtotime($row['assigned_at'])) ?></div>

              <button type="button" class="btn btn-success mt-2"
                onclick="sendSMS('<?= htmlspecialchars($row['contact_number'] ?? '', ENT_QUOTES) ?>')">
                Send SMS
              </button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- Other Tabs -->
    <div id="payment" class="tab" style="display:none"><h2>Payment Section</h2></div>
    <div id="tasks" class="tab" style="display:none"><h2>Tasks Section</h2></div>

  </div>
</div>

<script>
  function showTab(tabId) {
    document.querySelectorAll('.tab').forEach(tab => tab.style.display = "none");
    document.getElementById(tabId).style.display = "block";

    document.querySelectorAll('.navbar a').forEach(link => link.classList.remove('active'));
    if (event && event.target) { event.target.classList.add('active'); }
  }

  function sendEmail(email) {
    if (!email) return alert("No email available for this lead.");
    window.location.href = "mailto:" + email;
  }

  function sendSMS(phone) {
    if (!phone) return alert("No phone number available for this lead.");
    // Works on mobile; on desktop it may open a compatible app
    window.location.href = "sms:" + phone;
  }
</script>


</body>
</html>

