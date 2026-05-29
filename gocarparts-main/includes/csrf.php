<?php
/**
 * CSRF Protection Helper
 * Generates and validates CSRF tokens to prevent cross-site request forgery.
 */

require_once __DIR__ . '/auth.php';

/**
 * Generate a CSRF token and store it in the session.
 * @return string The generated token
 */
function generateCsrfToken(): string {
    ensureSession();
    
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

/**
 * Output a hidden CSRF input field for use in HTML forms.
 * @return string HTML hidden input
 */
function csrfField(): string {
    $token = generateCsrfToken();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}

/**
 * Validate CSRF token from POST request.
 * Terminates with 403 if token is invalid.
 */
function validateCsrfToken(): void {
    ensureSession();
    
    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    
    if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(403);
        
        // Check if it's an API request
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (stripos($contentType, 'application/json') !== false) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
        } else {
            echo "Error: Invalid or missing CSRF token. Please refresh the page and try again.";
        }
        exit;
    }
}

/**
 * Validate CSRF for API endpoints — returns JSON on failure.
 */
function validateCsrfApi(): void {
    ensureSession();
    
    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    
    if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
        exit;
    }
}
