<?php
require_once __DIR__ . '/includes/config.php';

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASS;
$dbname  = DB_NAME;

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders from order_items table
$orders = [];
$order_sql = "SELECT id, subtotal, created_at FROM order_items ORDER BY id DESC";
$order_result = $conn->query($order_sql);
if ($order_result->num_rows > 0) {
    while ($row = $order_result->fetch_assoc()) {
        $orders[] = [
            'id' => $row['id'],
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
SELECT e.lead_id, e.lead_type, r.submitted_at, u.username AS employee_name, e.status AS task_status
FROM emp_tasks e
JOIN $table r ON r.id = e.lead_id
JOIN users u ON u.id = e.employee_id
WHERE e.lead_type = '$type' AND e.status = 'completed'
";


    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = [
    'id' => $row['lead_id'],
    'lead_type' => $type,
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- loader-->
	  <link href="assets/css/pace.min.css" rel="stylesheet" />
	  <script src="assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>Fobia - Bootstrap5 Admin Template</title>
  </head>
  <body>
    

    <div class="wrapper">
       <!--start sidebar -->
      <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">Fobia</h4>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a href="index.php">
            <div class="parent-icon">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="ecommerce-checkout-payment.php">
            <div class="parent-icon">
              <ion-icon name="bag-handle-outline"></ion-icon>
            </div>
            <div class="menu-title">Payments</div>
          </a>
          
        </li>
        <a href="leads_admin.php">
            <div class="parent-icon">
              <ion-icon name="briefcase-outline"></ion-icon>
              <!-- <ion-icon name="bag-handle-outline"></ion-icon> -->
            </div>
            <div class="menu-title">Leads</div>
          </a>
        
        </li>

        
        <li class="menu-label">Pages</li>
        <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <div class="menu-title">Authentication</div>
          </a>
          <ul>
            <li> <a href="authentication-sign-up-simple.php">
                <ion-icon name="ellipse-outline"></ion-icon>Add Users
              </a>
            </li>
            <li> <a href="authentication-total.php">
                <ion-icon name="ellipse-outline"></ion-icon>Total Users
              </a>
            </li>
           
          </ul>
        </li>
        <li>
          <a href="pages-user-profile.html">
            <div class="parent-icon">
              <ion-icon name="person-circle-outline"></ion-icon>
            </div>
            <div class="menu-title">User Profile</div>
          </a>
        </li>
        <li>
          <a href="pages-edit-profile.html">
            <div class="parent-icon">
              <ion-icon name="create-outline"></ion-icon>
            </div>
            <div class="menu-title">Edit Profile</div>
          </a>
        </li>
        <li>
          <a href="pages-invoices.html">
            <div class="parent-icon">
              <ion-icon name="receipt-outline"></ion-icon>
            </div>
            <div class="menu-title">Invoice</div>
          </a>
        </li>
        <li>
          <a href="pages-to-do.html">
            <div class="parent-icon">
              <ion-icon name="shield-checkmark-outline"></ion-icon>
            </div>
            <div class="menu-title">Invoice</div>
          </a>
        </li>
        <li>
          
        <li class="menu-label">Charts & Maps</li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
              <ion-icon name="bar-chart-outline"></ion-icon>
            </div>
            <div class="menu-title">Charts</div>
          </a>
          <ul>
            <li> <a href="charts-apex-chart.html">
                <ion-icon name="ellipse-outline"></ion-icon>Apex
              </a>
            </li>
            <li> <a href="charts-chartjs.html">
                <ion-icon name="ellipse-outline"></ion-icon>Chartjs
              </a>
            </li>
            <li> <a href="charts-peity.html">
              <ion-icon name="ellipse-outline"></ion-icon>Peity
            </a>
           </li>
           <li> <a href="charts-other.html">
            <ion-icon name="ellipse-outline"></ion-icon>Other Charts
            </a>
           </li>
          </ul>
        </li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
              <ion-icon name="map-outline"></ion-icon>
            </div>
            <div class="menu-title">Maps</div>
          </a>
          <ul>
            <li> <a href="map-google-maps.html">
                <ion-icon name="ellipse-outline"></ion-icon>Google Maps
              </a>
            </li>
            <li> <a href="map-vector-maps.html">
                <ion-icon name="ellipse-outline"></ion-icon>Vector Maps
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
              <ion-icon name="list-outline"></ion-icon>
            </div>
            <div class="menu-title">Menu Levels</div>
          </a>
          <ul>
            <li> <a class="has-arrow" href="javascript:;">
                <ion-icon name="ellipse-outline"></ion-icon>Level One
              </a>
              <!-- <ul>
                <li> <a class="has-arrow" href="javascript:;">
                    <ion-icon name="ellipse-outline"></ion-icon>Level Two
                  </a>
                  <ul>
                    <li> <a href="javascript:;">
                        <ion-icon name="ellipse-outline"></ion-icon>Level Three
                      </a>
                    </li>
                  </ul>
                </li>
              </ul> -->
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;">
            <div class="parent-icon">
              <ion-icon name="document-text-outline"></ion-icon>
            </div>
            <div class="menu-title">Documentation</div>
          </a>
        </li>
        <li>
          <a href="javascript:;">
            <div class="parent-icon">
              <ion-icon name="link-outline"></ion-icon>
            </div>
            <div class="menu-title">Support</div>
          </a>
        </li>
      </ul>
      <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start top header-->


        <!-- start page content wrapper-->
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
      <tr style="cursor:pointer;" onclick="window.location.href='payment_details.php?type=<?= isset($order['lead_type']) ? $order['lead_type'] : 'order' ?>&id=<?= $order['id'] ?>'">
      
    <td><?= $order['serial'] ?></td>
      <td>
        <?php if ($order['amount'] !== "N/A"): ?>
          $<?= number_format($order['amount'], 2) ?>
        <?php else: ?>
          <span class="text-muted">N/A</span>
        <?php endif; ?>
      </td>
      <td>
        <span class="badge <?= strtolower($order['status']) === 'completed' ? 'bg-success' : 'bg-secondary' ?>">
          <?= $order['status'] ?>
        </span>
      </td>
      <td><?= $order['source'] ?></td>
      <td><?= $order['created_at'] ?></td>
    </tr>
  <?php endforeach; ?>
  <?php if (empty($orders)): ?>
    <tr><td colspan="5">No records found.</td></tr>
  <?php endif; ?>
</tbody>

      </table>
    </div>
  </div>
</div>

     
       
			
             

          </div> 
      
         </div> 
         


       

     </div>
  <!--end wrapper-->




    <!-- JS Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


  </body>
</html>