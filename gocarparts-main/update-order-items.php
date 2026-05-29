<?php
/**
 * Update Order Items with Payment Info
 * Verifies Razorpay payment signature before marking items as paid.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db_connect.php';

requireLoginApi();

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$order_id   = intval($data['order_id'] ?? 0);
$payment_id = trim($data['payment_id'] ?? '');
$razorpay_order_id = trim($data['razorpay_order_id'] ?? '');
$razorpay_signature = trim($data['razorpay_signature'] ?? '');
$cart_items = $data['cart_data'] ?? [];

if (!$order_id || !$payment_id || empty($cart_items)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing required data']);
    exit;
}

// Verify Razorpay payment signature
if (!empty($razorpay_order_id) && !empty($razorpay_signature)) {
    try {
        require_once 'razorpay-php-master/Razorpay.php';
        $api = new Razorpay\Api\Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);
        
        $api->utility->verifyPaymentSignature([
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_payment_id' => $payment_id,
            'razorpay_signature' => $razorpay_signature
        ]);
    } catch (Exception $e) {
        error_log("Payment verification failed for order $order_id: " . $e->getMessage());
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Payment verification failed']);
        exit;
    }
} else {
    // If signature data is missing, reject the request
    error_log("Missing payment signature data for order $order_id");
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Payment signature required']);
    exit;
}

// Payment verified — insert order items in a transaction
$conn->begin_transaction();

try {
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price, subtotal, product_image, payment_id, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    foreach ($cart_items as $item) {
        $name     = trim($item['product_name'] ?? '');
        $qty      = (int)($item['quantity'] ?? 0);
        $price    = (float)($item['price'] ?? 0);
        $subtotal = $qty * $price;
        $image    = trim($item['product_image'] ?? '');
        $status   = 'Paid';

        if (empty($name) || $qty <= 0 || $price <= 0) {
            throw new Exception("Invalid item data");
        }

        $stmt->bind_param("isiddsss", $order_id, $name, $qty, $price, $subtotal, $image, $payment_id, $status);
        $stmt->execute();
    }

    $conn->commit();
    echo json_encode(['status' => 'success', 'message' => 'Order items saved']);
} catch (Exception $e) {
    $conn->rollback();
    error_log("Order items update failed for order $order_id: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Failed to save order items']);
}

$stmt->close();
$conn->close();
?>
