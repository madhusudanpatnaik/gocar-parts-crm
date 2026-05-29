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

// Redirect if no ID provided
if (!isset($_GET['id'])) {
    header("Location: manage_employees.php");
    exit;
}

$id = intval($_GET['id']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ?, role = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $username, $email, $password, $role, $id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
        $stmt->bind_param("sssi", $username, $email, $role, $id);
    }

    $stmt->execute();
    header("Location: manage_employees.php");
    exit;
}

// Fetch user data (also fetch email)
$stmt = $conn->prepare("SELECT username, email, role FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($username, $email, $role);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="emp_style.css">
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
    <h2 class="my-4">Edit Employee</h2>

    <form method="POST" class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>" required>
      </div>
      <div class="col-md-6">
  <label class="form-label">Email</label>
  <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
</div>

      <div class="col-md-6">
        <label class="form-label">Role</label>
        <select name="role" class="form-select" required>
          <option value="employee" <?= $role === 'employee' ? 'selected' : '' ?>>Employee</option>
          <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">New Password <small>(leave blank to keep current)</small></label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Update Employee</button>
        <a href="manage_employees.php" class="btn btn-secondary ms-2">Cancel</a>
      </div>
    </form>

  </div>
</div>
</body>
</html>
