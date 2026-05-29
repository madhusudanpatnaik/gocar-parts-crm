<?php
/**
 * Edit Product (Admin API)
 * Fetch or update a product.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdminApi();

header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

// GET - Fetch product data
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT id, name, price, category, image_url FROM products WHERE id = ?");
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Query failed']);
        exit;
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Product not found']);
        exit;
    }
    
    $product = $result->fetch_assoc();
    $stmt->close();
    
    echo json_encode(['status' => 'success', 'data' => $product]);
    $conn->close();
    exit;
}

// POST - Update product data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    
    if ($id <= 0 || $name === '' || $price <= 0) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Missing or invalid required fields']);
        exit;
    }
    
    // Handle image upload if provided
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
    
    // Update product
    if ($image_url !== '') {
        $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, category = ?, image_url = ? WHERE id = ?");
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Query failed']);
            exit;
        }
        $stmt->bind_param("sdssi", $name, $price, $category, $image_url, $id);
    } else {
        $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, category = ? WHERE id = ?");
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Query failed']);
            exit;
        }
        $stmt->bind_param("sdsi", $name, $price, $category, $id);
    }
    
    if (!$stmt->execute()) {
        http_response_code(500);
        error_log("Product update failed: " . $stmt->error);
        echo json_encode(['status' => 'error', 'message' => 'Update failed']);
        exit;
    }
    
    $stmt->close();
    echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
    $conn->close();
    exit;
}

http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
$conn->close();
