<?php
session_set_cookie_params([
    'path' => '/',
    'secure' => false, // Change to true if using HTTPS
    'httponly' => true
]);

session_start();

// DB connection - Docker MySQL
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    header("Location: loginpage.php?error=" . urlencode("Database connection failed."));
    exit;
}

// Get input values safely
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Validation
if (!$email || !$password) {
    header("Location: loginpage.php?error=" . urlencode("Please enter both email and password.") . "&source=login");
    exit;
}

// Check user in database
$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // ✅ Login success
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // 🔹 Generate a secure token
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;

        // Store in cookie (optional)
        setcookie("token", $token, time() + 3600, "/", "", false, true);

        // Store login flag
        setcookie("loggedIn", "true", time() + (86400 * 30), "/");

        // 🔹 Role-based redirect
        switch ($user['role']) {
            case 'admin':
                $redirectPage = 'http://localhost/crm1/index.php';
                break;
            case 'employee':
                $redirectPage = 'employee_dashboard.php';
                break;
            case 'user':
                $redirectPage = 'index.php';
                break;
            default:
                $redirectPage = 'index.php';
                break;
        }

        // Send token to localStorage & redirect
        echo "<script>
            localStorage.setItem('token', '$token');
            sessionStorage.removeItem('redirect_after_login');
            window.location.href = '$redirectPage';
        </script>";
        exit;
    } else {
        // ❌ Invalid password
        header("Location: loginpage.php?error=" . urlencode("Invalid email or password.") . "&source=login");
        exit;
    }
} else {
    // ❌ Email not found
    header("Location: loginpage.php?error=" . urlencode("User not found.") . "&source=login");
    exit;
}

$stmt->close();
$conn->close();


?>
