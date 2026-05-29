<?php
ini_set('display_errors', 0);
error_reporting(0);

$host = "mysql";
$user = "root";
$pass = "REDACTED";
$db   = "REDACTED_DB";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Connection failed']);
    exit;
}

$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$page     = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit    = 12;
$offset   = ($page - 1) * $limit;

// Build WHERE clause
$where = "WHERE 1=1";
if ($category !== '') {
    $category = $conn->real_escape_string($category);
    $where .= " AND category = '$category'";
}

// Get total count
$countSql = "SELECT COUNT(*) as total FROM products $where";
$countResult = $conn->query($countSql);
$totalRows = $countResult ? $countResult->fetch_assoc()['total'] : 0;

// Get paginated products
$sql = "
    SELECT id, name AS post_title, price, image_url AS image
    FROM products
    $where
    ORDER BY id DESC    
    LIMIT $limit OFFSET $offset
";

$result = $conn->query($sql);
if (!$result) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit;
}

$out = [];
while ($row = $result->fetch_assoc()) {
    $out[] = [
        'id'    => intval($row['id']),
        'title' => htmlspecialchars($row['post_title']),
        'price' => is_numeric($row['price']) ? number_format((float)$row['price'], 2) : '0.00',
        'image' => !empty($row['image']) ? $row['image'] : 'https://dummyimage.com/300x200/cccccc/000000&text=No+Image'
    ];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'products' => $out,
    'total'    => $totalRows,
    'page'     => $page,
    'limit'    => $limit
]);
$conn->close();
