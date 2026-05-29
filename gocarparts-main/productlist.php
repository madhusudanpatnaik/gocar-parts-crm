<?php
/**
 * Product List API (Cached)
 * Returns a set of random products, cached for performance.
 */
require_once __DIR__ . '/includes/db_connect.php';

ini_set('display_errors', 0);
error_reporting(0);

$cacheFile = __DIR__ . '/product_cache_engines.json';

// Load cached IDs if valid
$cachedIds = [];
if (file_exists($cacheFile)) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    if (is_array($cached) && count($cached) > 0) {
        $cachedIds = $cached;
    }
}

// If no valid cache, fetch random product IDs
if (empty($cachedIds)) {
    $idQuery = "SELECT id FROM products WHERE price > 0 ORDER BY RAND() LIMIT 8";
    $idResult = $conn->query($idQuery);
    if ($idResult && $idResult->num_rows > 0) {
        while ($row = $idResult->fetch_assoc()) {
            $cachedIds[] = (int)$row['id'];
        }
        if (count($cachedIds) > 0) {
            @file_put_contents($cacheFile, json_encode($cachedIds));
        }
    }
}

$data = [];

if (!empty($cachedIds)) {
    // Safely build IN clause with intval
    $ids = implode(',', array_map('intval', $cachedIds));
    
    $query = "SELECT id, name, price, category, image_url FROM products WHERE id IN ($ids) ORDER BY FIELD(id, $ids)";
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
