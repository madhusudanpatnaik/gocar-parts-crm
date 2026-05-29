<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginpage.php?error=" . urlencode("Unauthorized access."));
    exit;
}

$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    header("Location: manage_employees.php");
    exit;
}

// Handle add employee
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);
    $stmt->execute();
    header("Location: manage_employees.php");
    exit;
}


// Fetch employees
$result = $conn->query("SELECT id, username, email, role FROM users WHERE role = 'employee'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="admin_style.css">
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
      <div class="col-md-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
       <div class="col-md-3">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
      <div class="col-md-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="col-md-3">
        <select name="role" class="form-select" required>
          <option value="employee">Employee</option>
        </select>
      </div>
      <div class="col-md-1"  >
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
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= $row['role'] ?></td>
            <td>
              <a href="edit_employee.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="manage_employees.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                 onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

  </div>
</div>
</body>
</html>
