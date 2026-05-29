<?php
/**
 * Create Razorpay Order
 * Creates a payment order via Razorpay API.
 * Requires user to be logged in.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/config.php';

// Require login
requireLoginApi();

require('razorpay-php-master/Razorpay.php');
use Razorpay\Api\Api;

header('Content-Type: application/json');

// Get JSON input
$input = json_decode(file_get_contents("php://input"), true);

// Validate amount
if (!isset($input['amount']) || !is_numeric($input['amount']) || $input['amount'] <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid amount']);
    exit;
}

try {
    $api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

    $order = $api->order->create([
        'receipt' => 'rcptid_' . time() . '_' . bin2hex(random_bytes(4)),
        'amount' => intval($input['amount']),
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    echo json_encode($order->toArray());
} catch (Exception $e) {
    error_log("Razorpay order creation failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Payment order creation failed. Please try again.']);
}
