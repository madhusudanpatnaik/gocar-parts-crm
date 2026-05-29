<?php
/**
 * Login Handler
 * Authenticates user and sets up secure session.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

ensureSession();

// Get input values safely
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Validation
if (!$email || !$password) {
    header("Location: loginpage.php?error=" . urlencode("Please enter both email and password.") . "&source=login");
    exit;
}

// Check user in database using prepared statement
$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Generate a secure CSRF token for this session
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Generate a secure auth token
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;

        // Store token in a secure, HttpOnly cookie
        setcookie("token", $token, [
            'expires' => time() + SESSION_LIFETIME,
            'path' => '/',
            'secure' => COOKIE_SECURE,
            'httponly' => true,
            'samesite' => COOKIE_SAMESITE
        ]);

        // Store login flag (HttpOnly)
        setcookie("loggedIn", "true", [
            'expires' => time() + (86400 * 30),
            'path' => '/',
            'secure' => COOKIE_SECURE,
            'httponly' => true,
            'samesite' => COOKIE_SAMESITE
        ]);

        // Role-based redirect
        switch ($user['role']) {
            case 'admin':
                $redirectPage = CRM_BASE_URL . '/index.php';
                break;
            case 'employee':
                $redirectPage = 'employee_dashboard.php';
                break;
            case 'user':
            default:
                $redirectPage = 'index.php';
                break;
        }

        header("Location: $redirectPage");
        exit;
    } else {
        // Invalid password — use generic error to prevent user enumeration
        header("Location: loginpage.php?error=" . urlencode("Invalid email or password.") . "&source=login");
        exit;
    }
} else {
    // Email not found — use same generic error
    header("Location: loginpage.php?error=" . urlencode("Invalid email or password.") . "&source=login");
    exit;
}

$stmt->close();
$conn->close();
?>
