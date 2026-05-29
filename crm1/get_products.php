<?php
/**
 * Get Products (Admin API)
 * Returns paginated product data for DataTables.
 * Requires admin authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdminApi();

header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);

// DataTables parameters
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
$limit = isset($_GET['length']) ? intval($_GET['length']) : 10;
$offset = isset($_GET['start']) ? intval($_GET['start']) : 0;
$search = isset($_GET['search']['value']) ? trim($_GET['search']['value']) : "";

// Build search query with prepared statements
$totalSql = "SELECT COUNT(*) as total FROM products";
$totalResult = $conn->query($totalSql);
$totalRecords = $totalResult ? $totalResult->fetch_assoc()['total'] : 0;

if ($search !== "") {
    $searchParam = "%{$search}%";
    $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM products WHERE name LIKE ? OR category LIKE ? OR sku LIKE ?");
    $countStmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $totalFiltered = $countResult->fetch_assoc()['total'];
    $countStmt->close();

    $stmt = $conn->prepare("SELECT id, name, price, category, image_url, sku FROM products WHERE name LIKE ? OR category LIKE ? OR sku LIKE ? ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param("sssii", $searchParam, $searchParam, $searchParam, $limit, $offset);
} else {
    $totalFiltered = $totalRecords;
    $stmt = $conn->prepare("SELECT id, name, price, category, image_url, sku FROM products ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed']);
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

$stmt->close();

echo json_encode([
    "draw" => $draw,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalFiltered,
    "data" => $data
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$conn->close();
