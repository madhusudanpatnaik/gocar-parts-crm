<?php
ini_set('display_errors', 0);
error_reporting(0);

$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$cacheFile = __DIR__ . '/product_cache_engines.json';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Connection failed']);
    exit;
}

// Load cached IDs if valid
$cachedIds = [];
if (file_exists($cacheFile)) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    if (is_array($cached) && count($cached) > 0) {
        $cachedIds = $cached;
    }
}

// If no valid cache or cache expired, fetch random product IDs
if (empty($cachedIds)) {
    // Fetch 8 random products from "Engine" category or any category with price > 0
    $idQuery = "
        SELECT id FROM products 
        WHERE price > 0
        ORDER BY RAND()
        LIMIT 8
    ";

    $idResult = $conn->query($idQuery);
    if ($idResult && $idResult->num_rows > 0) {
        while ($row = $idResult->fetch_assoc()) {
            $cachedIds[] = $row['id'];
        }
        if (count($cachedIds) > 0) {
            @file_put_contents($cacheFile, json_encode($cachedIds));
        }
    }
}

$data = [];

if (!empty($cachedIds)) {
    $ids = implode(',', array_map('intval', $cachedIds));
    
    $query = "
        SELECT 
            id,
            name,
            price,
            category,
            image_url
        FROM products 
        WHERE id IN ($ids)
        ORDER BY FIELD(id, $ids)
    ";

    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id' => intval($row['id']),
                'title' => htmlspecialchars($row['name']),
                'category' => htmlspecialchars($row['category'] ?: 'General'),
                'price' => number_format((float)$row['price'], 2),
                'image' => !empty($row['image_url']) ? $row['image_url'] : 'https://via.placeholder.com/300x200?text=No+Image'
            ];
        }
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
$conn->close();
