 <?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders from order_items table
$orders = [];
$order_sql = "SELECT subtotal, created_at FROM order_items ORDER BY id DESC";
$order_result = $conn->query($order_sql);
if ($order_result->num_rows > 0) {
    while ($row = $order_result->fetch_assoc()) {
        $orders[] = [
            'amount' => $row['subtotal'],
            'status' => "Completed",
            'source' => "User",
            'created_at' => $row['created_at']
        ];
    }
}

// Fetch employee leads from emp_tasks joined with request tables
$tables = [
    'mileage' => 'mileage_requests',
    'price' => 'price_requests',
    'request_quote' => 'quote_requests'
];

foreach ($tables as $type => $table) {
    $query = "
    SELECT r.submitted_at, u.username AS employee_name, e.status AS task_status
    FROM emp_tasks e
    JOIN $table r ON r.id = e.lead_id
    JOIN users u ON u.id = e.employee_id
    WHERE e.lead_type = '$type' AND e.status = 'completed'
    ";

    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = [
                'amount' => "N/A",
                'status' => ucfirst($row['task_status']),
                'source' => "Employee ({$row['employee_name']})",
                'created_at' => $row['submitted_at']
            ];
        }
    }
}


// Sort all orders by 'created_at' in descending order
usort($orders, function ($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

// Reassign serial numbers after sorting
foreach ($orders as $index => &$order) {
    $order['serial'] = $index + 1;
}
unset($order); // Break reference

?>

<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

	  <link href="assets/css/pace.min.css" rel="stylesheet" />
	  <script src="assets/js/pace.min.js"></script>

 
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>Fobia - Bootstrap5 Admin Template</title>
  </head>
  <body>
    

    <div class="wrapper">

        <?php include 'sidebar.php'; ?>

       <div class="page-content-wrapper"> 
  
        <div class="page-content">

          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ol>
              </nav>
            </div>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div>
          </div>

        <div class="card">
  <div class="card-body">
    <h5 class="card-title">Merged Payment & Lead Summary</h5>
    <div class="table-responsive">
  <table class="table table-bordered table-striped">
    <div class="table-responsive">


  <table class="table table-bordered table-striped" id="paymentsTable">
    <thead class="table-dark">
        <tr>
            <th>Serial No</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Source</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr style="cursor:pointer;" data-id="<?php echo htmlspecialchars($order['id']); ?>">
                <td><?php echo htmlspecialchars($order['serial']); ?></td>
                <td>
                    <?php if ($order['amount'] !== "N/A"): ?>
                        $<?php echo number_format($order['amount'], 2); ?>
                    <?php else: ?>
                        <span class="text-muted">N/A</span>
                    <?php endif; ?>
                </td>
                <td>
                    <span class="badge <?php echo strtolower($order['status']) === 'completed' ? 'bg-success' : 'bg-secondary'; ?>">
                        <?php echo htmlspecialchars($order['status']); ?>
                    </span>
                </td>
                <td><?php echo htmlspecialchars($order['source']); ?></td>
                <td><?php echo htmlspecialchars($order['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if (empty($orders)): ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<script>
document.querySelectorAll("#paymentsTable tbody tr").forEach(row => {
    row.addEventListener("click", () => {
        const id = row.getAttribute("data-id");
        if (id) {
            window.location.href = "payment-details.php?order_id=" + encodeURIComponent(id);
        }
    });
});
</script>



</div>

  </div>
</div>

     
       
			
             

          </div> 
      
         </div> 
         


       

     </div>





  
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="assets/js/main.js"></script>
    


  </body>
</html> 









