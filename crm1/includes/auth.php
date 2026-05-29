<?php
/**
 * CRM Auth Middleware — loads shared auth and adds CRM-specific helpers
 */
require_once dirname(__DIR__) . '/../gocarparts-main/includes/auth.php';

/**
 * Require admin role for CRM pages — redirects to CRM login.
 */
function requireCrmAdmin(): void {
    ensureSession();
    if (!isLoggedIn() || getUserRole() !== 'admin') {
        header("Location: /gocarparts-main/loginpage.php?error=" . urlencode("Admin access required."));
        exit;
    }
}

/**
 * Require admin role for CRM API endpoints — returns JSON error.
 */
function requireCrmAdminApi(): void {
    ensureSession();
    if (!isLoggedIn() || getUserRole() !== 'admin') {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Admin access required']);
        exit;
    }
}
