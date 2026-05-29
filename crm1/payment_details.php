<?php
/**
 * Payment / Lead Details (CRM Admin)
 * Displays details for a specific order, price, mileage, or quote request.
 * Requires admin authentication. Uses prepared statements.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireCrmAdmin();

// Validate parameters
$type = isset($_GET['type']) ? trim($_GET['type']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($type) || $id === 0) {
    die("Invalid request");
}

// Whitelist table mapping — never use user input directly as table name
$table_map = [
    'order' => 'order_items',
    'price' => 'price_requests',
    'mileage' => 'mileage_requests',
    'request_quote' => 'quote_requests'
];

if (!isset($table_map[$type])) {
    die("Invalid type");
}

$table = $table_map[$type];

// Use prepared statement
$stmt = $conn->prepare("SELECT * FROM $table WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows === 0) {
    die("Record not found");
}

$data = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment / Lead Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-4">
    <div class="card shadow">
        <!-- Header -->
        <div class="card-header bg-primary text-white text-center text-md-start">
            <h5 class="mb-0">Details for <?= htmlspecialchars(ucfirst($type)) ?> ID: <?= $id ?></h5>
        </div>

        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <tbody>
                        <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <th class="text-nowrap"><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $key))) ?></th>
                                <td><?= htmlspecialchars($value ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delivery Status -->
        <div class="card m-3">
            <div class="card-header bg-success text-white text-center text-md-start">
                <h6 class="mb-0">Delivery Status</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Order Placed</span> <span class="badge bg-success">✔</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Packed</span> <span class="badge bg-success">✔</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Shipped</span> <span class="badge bg-warning text-dark">In Progress</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Delivered</span> <span class="badge bg-secondary">Pending</span>
                    </li>
                </ul>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer text-center text-md-end">
            <a href="javascript:history.back()" class="btn btn-secondary w-100 w-md-auto">← Back</a>
        </div>
    </div>
</div>

</body>
</html>
