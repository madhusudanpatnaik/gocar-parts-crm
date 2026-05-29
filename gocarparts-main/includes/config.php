<?php
/**
 * Centralized Configuration
 * Reads from environment variables with fallbacks for local development.
 * In production, set these via Docker env, .env file, or server config.
 */

// Database Configuration
define('DB_HOST', getenv('MYSQL_HOST') ?: 'mysql');
define('DB_USER', getenv('MYSQL_USER') ?: 'root');
define('DB_PASS', getenv('MYSQL_PASSWORD') ?: 'REDACTED');
define('DB_NAME', getenv('MYSQL_DATABASE') ?: 'REDACTED_DB');

// Razorpay Configuration
define('RAZORPAY_KEY_ID', getenv('RAZORPAY_KEY_ID') ?: 'REDACTED_KEY_ID');
define('RAZORPAY_KEY_SECRET', getenv('RAZORPAY_KEY_SECRET') ?: 'REDACTED');

// Application Configuration
define('APP_ENV', getenv('APP_ENV') ?: 'development');
define('APP_BASE_URL', getenv('APP_BASE_URL') ?: 'http://localhost');
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
