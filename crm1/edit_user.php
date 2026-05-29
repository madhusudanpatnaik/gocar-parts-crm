<?php
/**
 * Edit User (CRM Admin)
 * Allows admin to update user details.
 * Requires admin authentication and CSRF protection.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/csrf.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdmin();

$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$user_id) {
    die("User ID not provided.");
}

// Update logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateCsrfToken();
    
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = trim($_POST['role'] ?? '');
    
    // Validate role against whitelist
    $valid_roles = ['admin', 'employee', 'user'];
    if (!in_array($role, $valid_roles, true)) {
        die("Invalid role.");
    }
    
    if (empty($username) || empty($email)) {
        die("Username and email are required.");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $stmt->bind_param("sssi", $username, $email, $role, $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: authentication-total.php");
    exit();
}

// Fetch user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Edit Employee</h2>

    <form method="POST">
        <?= csrfField() ?>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="employee" <?= $user['role'] === 'employee' ? 'selected' : '' ?>>Employee</option>
                <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="authentication-total.php" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
