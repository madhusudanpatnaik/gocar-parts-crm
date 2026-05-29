<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy session
session_destroy();

// Clear cookies
setcookie("loggedIn", "", time() - 3600, "/");
setcookie("token", "", time() - 3600, "/");

// Output JS to remove token from localStorage and redirect
?>
<script>
localStorage.removeItem('token');
window.location.href = 'loginpage.php';
</script>
