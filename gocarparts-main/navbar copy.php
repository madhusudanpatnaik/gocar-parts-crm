
  <?php
session_start(); // ✅ Make sure session is started!

// connect to database
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// if note is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['note_text'])) {
  $employee = $_SESSION['username'] ?? 'Unknown';
  $user_id  = $_SESSION['user_id'] ?? 0; // store user_id also
  $note     = $conn->real_escape_string($_POST['note_text']);

  // ✅ insert with user_id
  $stmt = $conn->prepare("INSERT INTO notes (user_id, employee_name, note_text, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->bind_param("iss", $user_id, $employee, $note);
  $stmt->execute();
  $stmt->close();
}

// fetch all notes

$user_id = $_SESSION['user_id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$notes = [];
while ($row = $result->fetch_assoc()) {
  $notes[] = $row;
}
$stmt->close();

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
        .layout {
  display: flex; /* sidebar + main side by side */
}

.sidebar {
  width: 220px; /* adjust your sidebar width */
  background: #222;
  min-height: 100vh; /* full height */
}

.main-content {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.navbar {
  display: flex;
  background: #2c3e50;
  padding: 10px;
}

.content {
  flex: 1;
  padding: 20px;
}

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f6fa;
    }
    .navbar {
      display: flex;
      background: #2c3e50;
      padding: 10px;
    }
    .navbar a {
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      transition: background 0.3s;
    }
    .navbar a:hover,
    .navbar a.active {
      background: #34495e;
      border-radius: 4px;
    }
    /* .content { padding: 20px; } */
    .card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      max-width: 500px;
      margin: 20px auto;
    }
    .card textarea {
      width: 100%;
      min-height: 100px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      resize: vertical;
      margin: 10px 0;
      box-sizing: border-box;
    }
    .card button {
      background: #2980b9;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
    }
    .card button:hover { background: #1c5982; }
    .notes-list {
      max-width: 500px;
      margin: 20px auto;
    }
    .note-item {
      background: #d1f0d1;
      padding: 12px;
      margin-bottom: 10px;
      border-radius: 8px;
      border-left: 4px solid #27ae60;
    }
    .note-item strong { color: #2c3e50; display: block; margin-bottom: 4px; }
    .note-time { font-size: 12px; color: #777; margin-top: 6px; }
  </style>
</head>
<body>
    <div class="layout">
<?php include('sidebar.php'); ?>
  <!-- Navbar -->
     <div class="main-content">
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
      <?php foreach ($notes as $note): ?>
        <div class="note-item">
          <strong><?= htmlspecialchars($note['employee_name']) ?></strong>
          <?= nl2br(htmlspecialchars($note['note_text'])) ?>
          <div class="note-time"><?= date("d-m-Y h:i A", strtotime($note['created_at'])) ?></div>

          <!-- ✅ Note Action -->
          <button 
            type="button" 
            class="btn btn-primary mt-2"
            onclick="noteAction('<?= $note['id'] ?>', '<?= htmlspecialchars($note['employee_name']) ?>')">
            Action
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ✅ SMS Tab -->
  <div id="sms" class="tab" style="display:none">
    <h2>SMS Section</h2>
    <div class="notes-list">
      <?php foreach ($tasks as $row): ?>
        <div class="note-item">
          <strong><?= htmlspecialchars($row['employee_name']) ?></strong>
          <div>📱 <?= htmlspecialchars($row['contact_number']) ?></div>
          <div class="note-time"><?= date("d-m-Y h:i A", strtotime($row['created_at'])) ?></div>

          <button type="button" class="btn btn-success mt-2"
            onclick="sendSMS('<?= htmlspecialchars($row['contact_number']) ?>')">
            Send SMS
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ✅ Email Tab -->
  <div id="email" class="tab" style="display:none">
    <h2>Email Section</h2>
    <div class="notes-list">
      <?php foreach ($tasks as $row): ?>
        <div class="note-item">
          <strong><?= htmlspecialchars($row['employee_name']) ?></strong>
          <div>📧 <?= htmlspecialchars($row['email']) ?></div>
          <div class="note-time"><?= date("d-m-Y h:i A", strtotime($row['created_at'])) ?></div>

          <button type="button" class="btn btn-info mt-2"
            onclick="sendEmail('<?= htmlspecialchars($row['email']) ?>')">
            Send Email
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Payment -->
  <div id="payment" class="tab" style="display:none"><h2>Payment Section</h2></div>

  <!-- Tasks -->
  <div id="tasks" class="tab" style="display:none"><h2>Tasks Section</h2></div>

</div>

  <script>
  function showTab(tabId) {
    document.querySelectorAll('.tab').forEach(tab => tab.style.display = "none");
    document.getElementById(tabId).style.display = "block";

    document.querySelectorAll('.navbar a').forEach(link => link.classList.remove('active'));
    event.target.classList.add('active');
  }

  function noteAction(noteId, employeeName) {
    alert("Action clicked for Note ID: " + noteId + " by " + employeeName);
  }

  function sendSMS(contactNumber) {
    alert("📱 Sending SMS to: " + contactNumber);
    // later: integrate Twilio API or SMS gateway
  }

  function sendEmail(email) {
    alert("📧 Sending Email to: " + email);
    // later: integrate PHP mail() or SMTP
  }
</script>


</body>
</html>

