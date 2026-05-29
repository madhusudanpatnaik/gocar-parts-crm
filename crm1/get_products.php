<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

$host = "mysql";
$user = "root";
$pass = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'DB connection failed: ' . $conn->connect_error]);
    exit;
}

// DataTables parameters
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
$limit = isset($_GET['length']) ? intval($_GET['length']) : 10;
$offset = isset($_GET['start']) ? intval($_GET['start']) : 0;
$search = isset($_GET['search']['value']) ? trim($_GET['search']['value']) : "";

// Build WHERE clause for search
$where = "1=1";
if ($search !== "") {
    $search = $conn->real_escape_string($search);
    $where .= " AND (name LIKE '%$search%' OR category LIKE '%$search%' OR sku LIKE '%$search%')";
}

// Get total count
$countSql = "SELECT COUNT(*) as total FROM products WHERE $where";
$countResult = $conn->query($countSql);
$totalFiltered = $countResult ? $countResult->fetch_assoc()['total'] : 0;

// Get total count without filter
$totalSql = "SELECT COUNT(*) as total FROM products";
$totalResult = $conn->query($totalSql);
$totalRecords = $totalResult ? $totalResult->fetch_assoc()['total'] : 0;

// Get paginated data
$sql = "
SELECT id, name, price, category, image_url, sku 
FROM products 
WHERE $where
ORDER BY id DESC
LIMIT $offset, $limit
";

$result = $conn->query($sql);
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $image_html = '';
    if (!empty($row['image_url'])) {
        $image_html = "<img src='" . htmlspecialchars($row['image_url']) . "' style='max-width:60px; max-height:60px; border-radius: 4px;' />";
    }
    
    $editBtn = "<button class='btn btn-primary btn-sm edit-product' data-id='" . intval($row['id']) . "'>Edit</button>";
    $deleteBtn = "<button class='btn btn-danger btn-sm delete-product' data-id='" . intval($row['id']) . "'>Delete</button>";

    $data[] = [
        intval($row['id']),
        htmlspecialchars($row['name']),
        '$' . number_format((float)$row['price'], 2),
        htmlspecialchars($row['category'] ?: '-'),
        $image_html,
        $editBtn . ' ' . $deleteBtn
    ];
}

echo json_encode([
    "draw" => $draw,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalFiltered,
    "data" => $data
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$conn->close();
