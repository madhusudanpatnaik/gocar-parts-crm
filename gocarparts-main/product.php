<?php
/**
 * Product Listing API
 * Returns paginated products with optional category filter.
 * Uses prepared statements for search parameters.
 */
require_once __DIR__ . '/includes/db_connect.php';

ini_set('display_errors', 0);
error_reporting(0);

$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$page     = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit    = 12;
$offset   = ($page - 1) * $limit;

// Get total count
if ($category !== '') {
    $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM products WHERE category = ?");
    $countStmt->bind_param("s", $category);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $totalRows = $countResult->fetch_assoc()['total'];
    $countStmt->close();
} else {
    $countResult = $conn->query("SELECT COUNT(*) as total FROM products");
    $totalRows = $countResult ? $countResult->fetch_assoc()['total'] : 0;
}

// Get paginated products
if ($category !== '') {
    $stmt = $conn->prepare("SELECT id, name AS post_title, price, image_url AS image FROM products WHERE category = ? ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param("sii", $category, $limit, $offset);
} else {
    $stmt = $conn->prepare("SELECT id, name AS post_title, price, image_url AS image FROM products ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Query failed']);
    exit;
}

$out = [];
while ($row = $result->fetch_assoc()) {
    $out[] = [
        'id'    => intval($row['post_title'] ? $row['id'] : 0),
        'title' => htmlspecialchars($row['post_title']),
        'price' => is_numeric($row['price']) ? number_format((float)$row['price'], 2) : '0.00',
        'image' => !empty($row['image']) ? $row['image'] : 'https://dummyimage.com/300x200/cccccc/000000&text=No+Image'
    ];
}

$stmt->close();

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'products' => $out,
    'total'    => (int)$totalRows,
    'page'     => $page,
    'limit'    => $limit
]);
$conn->close();
