<?php
/**
 * Centralized Configuration
 *
 * Secrets are read from the environment and have NO fallback values. A missing
 * secret throws at boot rather than silently falling back, so a misconfigured
 * deploy fails loudly instead of connecting somewhere unintended.
 *
 * Set these via Docker env, a .env file, or server config. See .env.example.
 */

/**
 * Read a required environment variable, or fail immediately.
 *
 * @throws RuntimeException when the variable is unset or empty.
 */
function env_required(string $key): string
{
    $value = getenv($key);

    if ($value === false || $value === '') {
        throw new RuntimeException(
            "Missing required environment variable: {$key}. "
            . "Copy .env.example to .env and populate it before starting the app."
        );
    }

    return $value;
}

/**
 * Read an optional environment variable, falling back to a non-sensitive default.
 */
function env_optional(string $key, string $default): string
{
    $value = getenv($key);

    return ($value === false || $value === '') ? $default : $value;
}

// Database Configuration — credentials are required, host is not.
define('DB_HOST', env_optional('MYSQL_HOST', 'mysql'));
define('DB_USER', env_required('MYSQL_USER'));
define('DB_PASS', env_required('MYSQL_PASSWORD'));
define('DB_NAME', env_required('MYSQL_DATABASE'));

// Razorpay Configuration
define('RAZORPAY_KEY_ID', env_required('RAZORPAY_KEY_ID'));
define('RAZORPAY_KEY_SECRET', env_required('RAZORPAY_KEY_SECRET'));

// Application Configuration
define('APP_ENV', env_optional('APP_ENV', 'development'));
define('APP_BASE_URL', env_optional('APP_BASE_URL', 'http://localhost'));
define('CRM_BASE_URL', APP_BASE_URL . '/crm1');
define('FRONTEND_BASE_URL', APP_BASE_URL . '/gocarparts-main');

// Security Configuration
define('SESSION_LIFETIME', 3600); // 1 hour
define('COOKIE_SECURE', APP_ENV === 'production');
define('COOKIE_HTTPONLY', true);
define('COOKIE_SAMESITE', 'Strict');

// File Upload Configuration
define('UPLOAD_MAX_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_IMAGE_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
