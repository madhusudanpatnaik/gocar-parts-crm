<?php
/**
 * Centralized Database Connection
 * Returns a mysqli connection using config constants.
 * Include this file wherever you need a DB connection.
 */

require_once __DIR__ . '/config.php';

/**
 * Get a mysqli database connection.
 * @return mysqli
 */
function getDbConnection(): mysqli {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        // Log the error internally, don't expose details to user
        error_log("Database connection failed: " . $conn->connect_error);
        
        if (APP_ENV === 'development') {
            die("Database connection failed: " . $conn->connect_error);
        } else {
            http_response_code(500);
            die("Service temporarily unavailable. Please try again later.");
        }
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Create a default connection for backward compatibility
$conn = getDbConnection();
