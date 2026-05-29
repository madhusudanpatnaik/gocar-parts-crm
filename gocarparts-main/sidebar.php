<?php
// Make sure session is started to access $username
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = $_SESSION['username'] ?? 'Employee';
?>

<div class="sidebar bg-dark text-white p-3" style="min-height: 100vh; width: 250px; position: fixed;">
  <h5 class="mb-4">Employee Dashboard</h5>
  <h3 class="text-info mb-4">Welcome, <?php echo htmlspecialchars($username); ?></h3>

  <a href="employee_dashboard.php" class="d-block mb-2 text-white text-decoration-none">🏠 Dashboard</a>
  <a href="emp_leads.php" class="d-block mb-2 text-white text-decoration-none">📋 Leads</a>
  <a href="my_tasks.php" class="d-block mb-2 text-white text-decoration-none">✅ My Tasks</a>
  <a href="logout.php" class="d-block mt-4 text-danger text-decoration-none">🚪 Logout</a>
</div>