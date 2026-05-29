<?php
// Path to your JSON file
$filePath = __DIR__ . '/carData.js';

// Read the current file
$content = file_get_contents($filePath);

if (!$content) {
    die("Error: Unable to read file\n");
}

// Extract JSON (remove window.carData = )
if (preg_match('/window\.carData\s*=\s*(\{.*\});?/s', $content, $matches)) {
    $jsonString = rtrim($matches[1], ';');
} else {
    die("Error: Could not find JSON structure inside file\n");
}

// Decode JSON
$carData = json_decode($jsonString, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error: Unable to parse JSON. " . json_last_error_msg() . "\n");
}

// --- New Engine Data ---
$newMake = "GMC";
$newModel = "1500";
$newEngineData = "(1999 UP) 6.2L (2008-2010)";

// Check if ENGINE section exists
if (!isset($carData["ENGINE"])) {
    $carData["ENGINE"] = [
        "Select Model" => [
            "Select Year" => []
        ]
    ];
}

// Check if Make exists under ENGINE
if (!isset($carData["ENGINE"][$newMake])) {
    $carData["ENGINE"][$newMake] = [
        "Select Year" => []
    ];
}

// Check if Model exists under GMC
if (!isset($carData["ENGINE"][$newMake][$newModel])) {
    $carData["ENGINE"][$newMake][$newModel] = [];
}

// Add engine only if it doesn't exist
if (!in_array($newEngineData, $carData["ENGINE"][$newMake][$newModel])) {
    $carData["ENGINE"][$newMake][$newModel][] = $newEngineData;
    echo "New engine added: $newEngineData\n";
} else {
    echo "Engine already exists: $newEngineData\n";
}

// Convert back to JSON
$updatedJson = json_encode($carData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Wrap back into JS variable
$finalContent = "window.carData = " . $updatedJson . ";";

// Save back to file
if (file_put_contents($filePath, $finalContent)) {
    echo "carData.js updated successfully!\n";
} else {
    echo "Error: Unable to save file\n";
}
?>
