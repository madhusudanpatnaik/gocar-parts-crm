<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireEmployee();
$username = htmlspecialchars($_SESSION['username'] ?? 'Employee');

// Get range
$range = $_GET['range'] ?? 'all';
function dateCondition($column, $range) {
    switch ($range) {
        case 'today': return "DATE($column) = CURDATE()";
        case 'last7': return "$column >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
        case 'last30': return "$column >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        case 'last90': return "$column >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
        default: return "1";
    }
}

// Customers
$totalCustomers = 0;
$cond = dateCondition('created_at', $range);
$sql = "SELECT COUNT(*) FROM users WHERE role NOT IN ('admin', 'employee') AND $cond";
$res = $conn->query($sql);
if ($res) $totalCustomers = $res->fetch_row()[0];

// Orders
$totalOrders = 0;
$orderTables = ['mileage_requests', 'price_requests', 'quote_requests'];
foreach ($orderTables as $tbl) {
    $sql = "SELECT COUNT(*) FROM $tbl WHERE " . dateCondition('submitted_at', $range);
    $res = $conn->query($sql);
    if ($res) $totalOrders += $res->fetch_row()[0];
}

// Add to Cart
$totalAddCart = 0;
if ($conn->query("SHOW TABLES LIKE 'add_to_cart'")->num_rows) {
    $sql = "SELECT COUNT(*) FROM add_to_cart WHERE " . dateCondition('added_at', $range);
    $res = $conn->query($sql);
    if ($res) $totalAddCart = $res->fetch_row()[0];
}

// Revenue
$totalRevenue = 0.0;
foreach ($orderTables as $tbl) {
    if ($conn->query("SHOW COLUMNS FROM $tbl LIKE 'amount'")->num_rows) {
        $sql = "SELECT SUM(amount) FROM $tbl WHERE " . dateCondition('submitted_at', $range);
        $res = $conn->query($sql);
        if ($res) $totalRevenue += floatval($res->fetch_row()[0]);
    }
}
// chart
// Generate revenue per month (current year)
$monthlyRevenue = array_fill(1, 12, 0); // Jan to Dec

foreach ($orderTables as $table) {
    if ($conn->query("SHOW COLUMNS FROM $table LIKE 'amount'")->num_rows) {
        $sql = "SELECT MONTH(submitted_at) AS month, SUM(amount) as total
                FROM $table
                WHERE YEAR(submitted_at) = YEAR(CURDATE())
                GROUP BY MONTH(submitted_at)";
        $res = $conn->query($sql);
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $monthlyRevenue[(int)$row['month']] += (float)$row['total'];
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="emp_style.css">
</head>
<body>
<?php include('sidebar.php'); ?>

<div class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">Dashboard</h4>
      <div>
        <label class="form-label me-2 mb-0">Timeframe:</label>
        <select id="timeframe" class="form-select form-select-sm d-inline-block w-auto">
          <option value="all">All Time</option>
          <option value="today">Today</option>
          <option value="last7">Last 7 Days</option>
          <option value="last30">Last 30 Days</option>
          <option value="last90">Last 90 Days</option>
        </select>
      </div>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6>Total Revenue</h6>
            <h4>$<?= number_format($totalRevenue, 2) ?> <span class="badge bg-success ms-2">+6.32%</span></h4>
            <div class="text-muted">Compared to last month</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6>Total Customers</h6>
            <h4><?= $totalCustomers ?></h4>
            <div class="text-muted">New signups</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6>Total Orders</h6>
            <h4><?= $totalOrders ?></h4>
            <div class="text-muted">All time</div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6>Total Add Carts</h6>
            <h4><?= $totalAddCart ?> <span class="badge bg-success ms-2">Last 7 days</span></h4>
            <div class="text-muted">Based on selected range</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h5 class="mb-3">Earning Reports</h5>
        <div class="row">
          <div class="col-md-4">
            <h3>$<?= number_format($totalRevenue, 2) ?> <span class="badge bg-success">+10.6%</span></h3>
            <p class="text-muted">Based on total orders placed</p>
          </div>
          <div class="col-md-8">
              <canvas id="revenueChart" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="card shadow-sm text-center">
          <div class="card-body">
            <h5>$<?= number_format($totalRevenue, 2) ?></h5>
            <div class="text-muted">Total Revenue</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm text-center">
          <div class="card-body">
            <h5>$3,300.00</h5>
            <div class="text-muted">Total Profit</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm text-center">
          <div class="card-body">
            <h4><?= $totalCustomers ?></h4>
            <div class="text-muted">Total Customers</div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script>
  document.getElementById("timeframe").addEventListener("change", function () {
    const value = this.value;
    const url = new URL(window.location.href);
    url.searchParams.set('range', value);
    window.location.href = url;
  });

  document.addEventListener("DOMContentLoaded", function () {
    const range = new URLSearchParams(window.location.search).get('range') || 'all';
    document.getElementById("timeframe").value = range;
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('revenueChart').getContext('2d');

  const monthlyRevenue = <?= json_encode(array_values($monthlyRevenue)) ?>;
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: months,
      datasets: [{
        label: 'Monthly Revenue ($)',
        data: monthlyRevenue,
        backgroundColor: 'rgba(54, 162, 235, 0.7)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        borderRadius: 6,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: { callback: value => '$' + value }
        }
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return '$' + context.parsed.y.toLocaleString();
            }
          }
        }
      }
    }
  });
</script>

</body>
</html>
