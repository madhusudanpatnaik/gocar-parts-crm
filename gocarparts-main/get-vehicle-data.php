<?php
/**
 * Get Vehicle Data API
 * Returns product data parsed for vehicle make/model/year dropdowns.
 */
require_once __DIR__ . '/includes/db_connect.php';

$sql = "SELECT id, name, price, category, image_url AS img FROM products";
$result = $conn->query($sql);
$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['name'];

        $make = null;
        $model = null;
        $submodel = null;
        $years = [];

        // Try to extract year range from title
        if (preg_match('/^([A-Za-z]+)\s+([A-Za-z0-9]+)\s+(.*?)\s+\((\d{4})-(\d{4})\)/', $title, $matches)) {
            $make = strtoupper($matches[1]);
            $model = strtoupper($matches[2]);
            $submodel = trim($matches[3]);
            $startYear = (int)$matches[4];
            $endYear = (int)$matches[5];

            for ($year = $startYear; $year <= $endYear; $year++) {
                $years[] = $year;
            }
        }

        // Fallback: parse make/model from name
        if (!$make) {
            $parts = explode(' ', trim($title));
            if (count($parts) >= 2) {
                $make = strtoupper($parts[0]);
                $model = strtoupper($parts[1]);
            }
            if (preg_match_all('/\b(19|20)\d{2}\b/', $title, $yearMatches)) {
                $years = array_map('intval', $yearMatches[0]);
            }
        }

        $years = array_unique($years);
        sort($years);

        if (empty($years)) {
            $years = [(int)date('Y')];
        }

        foreach ($years as $year) {
            $entry = [
                'id' => (int)$row['id'],
                'title' => $title,
                'price' => $row['price'],
                'sku' => 'N/A',
                'category' => $row['category'],
                'img' => $row['img'],
                'car_name' => $make ?: 'Unknown',
                'model' => $model ?: 'Unknown',
                'submodel' => $submodel ?: '',
                'year' => (string)$year
            ];
            $data[] = $entry;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
$conn->close();
?>
