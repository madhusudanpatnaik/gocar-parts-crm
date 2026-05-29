<?php
/**
 * Shared Utility Functions
 * 
 * Note: The previous WordPress-specific code ($wpdb, dbDelta, add_action)
 * has been removed as this is a vanilla PHP application, not WordPress.
 */

/**
 * Sanitize a string for safe display.
 * @param string $input
 * @return string
 */
function sanitize(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Format a price value.
 * @param float $price
 * @return string
 */
function formatPrice(float $price): string {
    return '$' . number_format($price, 2);
}

/**
 * Validate an uploaded image file.
 * @param array $file The $_FILES entry
 * @return array ['valid' => bool, 'error' => string]
 */
function validateImageUpload(array $file): array {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['valid' => false, 'error' => 'Upload failed'];
    }
    
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ALLOWED_IMAGE_TYPES)) {
        return ['valid' => false, 'error' => 'Invalid image format. Allowed: ' . implode(', ', ALLOWED_IMAGE_TYPES)];
    }
    
    if ($file['size'] > UPLOAD_MAX_SIZE) {
        return ['valid' => false, 'error' => 'File too large. Maximum size: ' . (UPLOAD_MAX_SIZE / 1024 / 1024) . 'MB'];
    }
    
    return ['valid' => true, 'error' => ''];
}
