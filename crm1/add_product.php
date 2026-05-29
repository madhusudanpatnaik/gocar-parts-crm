<?php
/**
 * Add Product (Admin API)
 * Adds a new product to the catalog.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdminApi();

header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$category = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';

// Validate required fields
if ($name === '' || $price <= 0 || $category === '') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Name, price and category are required']);
    exit;
}

// Handle image upload
$image_url = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        @mkdir($uploadDir, 0755, true);
    }

    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($file_ext, $allowed)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid image format']);
        exit;
    }

    // Check file size (5MB max)
    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Image file too large (max 5MB)']);
        exit;
    }

    $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $file_ext;
    $targetPath = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $image_url = '/crm1/uploads/' . $filename;
    }
}

// Insert product
$stmt = $conn->prepare("INSERT INTO products (name, price, category, image_url) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Query preparation failed']);
    exit;
}

$stmt->bind_param("sdss", $name, $price, $category, $image_url);
if (!$stmt->execute()) {
    http_response_code(500);
    error_log("Product insert failed: " . $stmt->error);
    echo json_encode(['status' => 'error', 'message' => 'Insert failed']);
    exit;
}

$product_id = $stmt->insert_id;
$stmt->close();

echo json_encode([
    'status' => 'success',
    'message' => 'Product added successfully',
    'product_id' => $product_id
]);

$conn->close();
