<?php
// Database connection
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate parameters
$type = isset($_GET['type']) ? $_GET['type'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($type) || $id === 0) {
    die("Invalid request");
}

// Determine the table based on type
$table = '';
if ($type === 'order') {
    $table = 'order_items';
} elseif ($type === 'price') {
    $table = 'price_requests';
} elseif ($type === 'mileage') {
    $table = 'mileage_requests';
} elseif ($type === 'request_quote') {
    $table = 'quote_requests';
} else {
    die("Invalid type");
}

// Fetch record from the selected table
$sql = "SELECT * FROM $table WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Record not found");
}

$data = $result->fetch_assoc();
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
            <h5 class="mb-0">Details for <?= ucfirst($type) ?> ID: <?= $id ?></h5>
        </div>

        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive"> <!-- ✅ Makes table scrollable on mobile -->
                <table class="table table-bordered table-striped align-middle">
                    <tbody>
                        <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <th class="text-nowrap"><?= ucfirst(str_replace('_', ' ', $key)) ?></th>
                                <td><?= htmlspecialchars($value) ?></td>
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
