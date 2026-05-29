<?php
/**
 * Manage Employees
 * Admin page for adding, viewing, and deleting employee accounts.
 * Requires admin authentication and CSRF protection.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/csrf.php';
require_once __DIR__ . '/includes/db_connect.php';

requireAdmin();

// Handle deletion via POST (not GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    validateCsrfToken();
    $deleteId = intval($_POST['delete_id']);
    if ($deleteId > 0) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'employee'");
        $stmt->bind_param("i", $deleteId);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: manage_employees.php");
    exit;
}

// Handle add employee via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    validateCsrfToken();
    
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $raw_password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($email) && !empty($raw_password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($raw_password) >= 8) {
            $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
            // Role is always 'employee' — hardcoded to prevent privilege escalation
            $role = 'employee';

            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
            $stmt->execute();
            $stmt->close();
        }
    }
    header("Location: manage_employees.php");
    exit;
}

// Fetch employees
$result = $conn->query("SELECT id, username, email, role FROM users WHERE role = 'employee'");

$csrfToken = generateCsrfToken();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="sidebar">
  <h5>Admin Panel</h5>
  <h3 class="text-info">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="manage_employees.php">Manage Employees</a>
  <a href="leads_admin.php">Manage Leads</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main-content">
  <div class="container">
    <h2 class="my-4">Manage Employees</h2>

    <!-- Add Employee Form -->
    <form method="POST" class="row g-3 mb-3">
      <?= csrfField() ?>
      <div class="col-md-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required minlength="3">
      </div>
       <div class="col-md-3">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="col-md-3">
        <input type="password" name="password" class="form-control" placeholder="Password (min 8 chars)" required minlength="8">
      </div>
      <div class="col-md-2">
        <span class="form-control-plaintext">Role: Employee</span>
      </div>
      <div class="col-md-1">
        <button type="submit" name="add" class="btn btn-primary w-100">Add</button>
      </div>
    </form>

    <!-- Employee Table -->
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= intval($row['id']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td>
              <a href="edit_employee.php?id=<?= intval($row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
              <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                <?= csrfField() ?>
                <input type="hidden" name="delete_id" value="<?= intval($row['id']) ?>">
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

  </div>
</div>
</body>
</html>
