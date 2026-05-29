<?php
/**
 * Product Search (CRM Admin)
 * Searches for products by ID or SKU.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdminApi();

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

// Get inputs
$productId = isset($_POST['productId']) ? trim($_POST['productId']) : '';
$sku = isset($_POST['sku']) ? trim($_POST['sku']) : '';

if (empty($productId) && empty($sku)) {
    echo "<p style='color:red;text-align:center;'>❌ Please enter Product ID or SKU</p>";
    exit;
}

$sql = "SELECT id, name, price, sku, category, image_url FROM products WHERE 1=1";
$types = "";
$params = [];

if (!empty($productId)) {
    $productId = intval($productId);
    $sql .= " AND id = ?";
    $types = "i";
    $params[] = $productId;
} elseif (!empty($sku)) {
    $sql .= " AND sku = ?";
    $types = "s";
    $params[] = $sku;
}

$sql .= " LIMIT 1";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "<p style='color:red;text-align:center;'>❌ Query error</p>";
    exit;
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $img = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : 'https://via.placeholder.com/300x200?text=No+Image';
    $price = is_numeric($row['price']) ? '$' . number_format((float)$row['price'], 2) : 'N/A';
    $category = htmlspecialchars($row['category'] ?: 'N/A');
    $productName = htmlspecialchars($row['name']);
    $skuValue = htmlspecialchars($row['sku'] ?: 'N/A');

    echo '<div class="product-card" style="margin:10px;padding:10px;border:1px solid #ccc;border-radius:8px;background:#fff;">';
    echo '<img src="' . $img . '" style="width:100%;height:150px;object-fit:cover;border-radius:4px;" alt="' . $productName . '">';
    echo "<h3 style='font-size:16px;margin-top:10px;'>$productName</h3>";
    echo "<p><strong>SKU:</strong> $skuValue</p>";
    echo "<p><strong>Category:</strong> $category</p>";
    echo "<p><strong>Price:</strong> $price</p>";
    echo '</div>';
} else {
    echo "<p style='color:red;text-align:center;'>❌ No product found</p>";
}

$stmt->close();
$conn->close();
