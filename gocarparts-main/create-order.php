<?php
require('razorpay-php-master/Razorpay.php'); // Path to SDK file

use Razorpay\Api\Api;

// Razorpay credentials
$keyId = 'REDACTED_KEY_ID';
$keySecret = 'REDACTED';

header('Content-Type: application/json');

// Get JSON input
$input = json_decode(file_get_contents("php://input"), true);

// Validate
if (!isset($input['amount']) || !is_numeric($input['amount'])) {
    echo json_encode(['error' => 'Invalid amount']);
    exit;
}

try {
    $api = new Api($keyId, $keySecret);

    $order = $api->order->create([
        'receipt' => 'rcptid_' . rand(1000, 9999),
        'amount' => $input['amount'],
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    echo json_encode($order->toArray());
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
