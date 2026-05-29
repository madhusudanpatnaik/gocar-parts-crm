<?php
/**
 * Authentication Middleware
 * Provides functions to check if a user is logged in and has the required role.
 * Include this at the top of any page that requires authentication.
 */

require_once __DIR__ . '/config.php';

/**
 * Ensure a secure session is started.
 */
function ensureSession(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'lifetime' => SESSION_LIFETIME,
            'path' => '/',
            'secure' => COOKIE_SECURE,
            'httponly' => COOKIE_HTTPONLY,
            'samesite' => COOKIE_SAMESITE
        ]);
        session_start();
    }
}

/**
 * Check if the user is logged in.
 * @return bool
 */
function isLoggedIn(): bool {
    ensureSession();
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get the current user's role.
 * @return string|null
 */
function getUserRole(): ?string {
    ensureSession();
    return $_SESSION['role'] ?? null;
}

/**
 * Get the current user's ID.
 * @return int|null
 */
function getUserId(): ?int {
    ensureSession();
    return isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
}

/**
 * Require login — redirects to login page if not authenticated.
 * @param string $redirectUrl The URL to redirect to after login
 */
function requireLogin(string $redirectUrl = ''): void {
    if (!isLoggedIn()) {
        $loginPage = '/gocarparts-main/loginpage.php';
        $error = urlencode("Please log in to continue.");
        header("Location: {$loginPage}?error={$error}");
        exit;
    }
}

/**
 * Require a specific role — redirects if user doesn't have the required role.
 * @param string|array $roles Single role string or array of allowed roles
 */
function requireRole($roles): void {
    requireLogin();
    
    if (is_string($roles)) {
        $roles = [$roles];
    }
    
    $userRole = getUserRole();
    if (!in_array($userRole, $roles, true)) {
        http_response_code(403);
        $loginPage = '/gocarparts-main/loginpage.php';
        $error = urlencode("Unauthorized access.");
        header("Location: {$loginPage}?error={$error}");
        exit;
    }
}

/**
 * Require admin role.
 */
function requireAdmin(): void {
    requireRole('admin');
}

/**
 * Require employee role.
 */
function requireEmployee(): void {
    requireRole('employee');
}

/**
 * Require admin or employee role.
 */
function requireStaff(): void {
    requireRole(['admin', 'employee']);
}

/**
 * Require login for API endpoints — returns JSON error instead of redirect.
 */
function requireLoginApi(): void {
    if (!isLoggedIn()) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
        exit;
    }
}

/**
 * Require role for API endpoints — returns JSON error instead of redirect.
 * @param string|array $roles
 */
function requireRoleApi($roles): void {
    requireLoginApi();
    
    if (is_string($roles)) {
        $roles = [$roles];
    }
    
    $userRole = getUserRole();
    if (!in_array($userRole, $roles, true)) {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Insufficient permissions']);
        exit;
    }
}
