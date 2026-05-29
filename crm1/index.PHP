<?php
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total customers
$sql = "SELECT COUNT(*) AS total_customers FROM users WHERE role = 'user'";
$result = $conn->query($sql);
$totalCustomers = 0;
if ($result && $row = $result->fetch_assoc()) {
    $totalCustomers = $row['total_customers'];
}
$sql = "SELECT COUNT(*) AS total_orders FROM cart";
$result = $conn->query($sql);
$totalOrders = 0;
if ($result && $row = $result->fetch_assoc()) {
    $totalOrders = $row['total_orders'];
}
$conn->close();
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
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
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
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  <title>Premium- Car Parts - Admin CRM</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <?php include 'sidebar.php'; ?>
      <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="toggle-icon">
          <ion-icon name="menu-outline"></ion-icon>
        </div>
     
    <!-- <div class="d-flex align-items-center ms-2">
    <span class="ms-auto widget-icon-small text-white bg-gradient-info"><b>P</b></span>
  </div> -->
      <!-- Icon -->
<div class="d-flex align-items-center ms-2">
  <span class="ms-auto widget-icon-small text-white bg-gradient-info" 
        style="cursor: pointer;" 
        data-bs-toggle="modal" data-bs-target="#searchModal">
    <b>P</b>
  </span>
</div>


       
        <form class="searchbar">
          <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
            <ion-icon name="search-outline"></ion-icon>
          </div>
          <input class="form-control" type="text" placeholder="Search for anything">
          <div class="position-absolute top-50 translate-middle-y search-close-icon">
            <ion-icon name="close-outline"></ion-icon>
          </div>
        </form>
        <div class="top-navbar-right ms-auto">

          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link mobile-search-button" href="javascript:;">
                <div class="">
                  <ion-icon name="search-outline"></ion-icon>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link dark-mode-icon" href="javascript:;">
                <div class="mode-icon">
                  <ion-icon name="moon-outline"></ion-icon>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown dropdown-large dropdown-apps">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="">
                  <ion-icon name="apps-outline"></ion-icon>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                <div class="row row-cols-3 g-3 p-3">
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-purple text-white">
                      <ion-icon name="cart-outline"></ion-icon>
                    </div>
                    <div class="app-title">Orders</div>
                  </div>
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-info text-white">
                      <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <div class="app-title">Teams</div>
                  </div>
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-success text-white">
                      <ion-icon name="shield-checkmark-outline"></ion-icon>
                    </div>
                    <div class="app-title">Tasks</div>
                  </div>
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-danger text-white">
                      <ion-icon name="videocam-outline"></ion-icon>
                    </div>
                    <div class="app-title">Media</div>
                  </div>
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-warning text-white">
                      <ion-icon name="file-tray-outline"></ion-icon>
                    </div>
                    <div class="app-title">Files</div>
                  </div>
                  <div class="col text-center">
                    <div class="app-box mx-auto bg-gradient-branding text-white">
                      <ion-icon name="notifications-outline"></ion-icon>
                    </div>
                    <div class="app-title">Alerts</div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <span class="notify-badge">8</span>
                  <ion-icon name="notifications-outline"></ion-icon>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;">
                  <div class="msg-header">
                    <p class="msg-header-title">Notifications</p>
                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                  </div>
                </a>
                <div class="header-notifications-list">
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-primary">
                        <ion-icon name="cart-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                            ago</span></h6>
                        <p class="msg-info">You have recived new orders</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-danger">
                        <ion-icon name="person-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                            ago</span></h6>
                        <p class="msg-info">5 new user registered</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-success">
                        <ion-icon name="document-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                            ago</span></h6>
                        <p class="msg-info">The pdf files generated</p>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-info">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                        <p class="msg-info">Your new product has approved</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-warning">
                        <ion-icon name="send-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                            ago</span></h6>
                        <p class="msg-info">5.1 min avarage time response</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-danger">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                            ago</span></h6>
                        <p class="msg-info">New customer comments recived</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-primary">
                        <ion-icon name="albums-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                            ago</span></h6>
                        <p class="msg-info">24 new authors joined last week</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-success">
                        <ion-icon name="shield-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                            ago</span></h6>
                        <p class="msg-info">Successfully shipped your item</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="notify text-warning">
                        <ion-icon name="cafe-outline"></ion-icon>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                            ago</span></h6>
                        <p class="msg-info">45% less alerts last 4 weeks</p>
                      </div>
                    </div>
                  </a>
                </div>
                <a href="javascript:;">
                  <div class="text-center msg-footer">View All Notifications</div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="user-setting">
                  <img src="assets/images/avatars/06.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex flex-row align-items-center gap-2">
                      <img src="assets/images/avatars/06.png" alt="" class="rounded-circle" width="54" height="54">
                      <div class="">
                        <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="person-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="settings-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Setting</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="speedometer-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Dashboard</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="wallet-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Earnings</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="cloud-download-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Downloads</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="log-out-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>

        </div>
      </nav>
    </header>
    <!--end top header-->


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                    <ion-icon name="home-outline"></ion-icon>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Payments</li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">Settings</button>
              <button type="button"
                class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                  href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->
<!-- Place this just above your dashboard stats row -->
<div class="mb-3 text-start"> <!-- text-start for left alignment -->
  <form method="GET">
    <label class="me-2 fw-bold">Timeframe:</label>
    <select name="range" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
      <option value="today" <?= ($_GET['range'] ?? '') === 'today' ? 'selected' : '' ?>>Today</option>
      <option value="yesterday" <?= ($_GET['range'] ?? '') === 'yesterday' ? 'selected' : '' ?>>Yesterday</option>
      <option value="7" <?= ($_GET['range'] ?? '') === '7' ? 'selected' : '' ?>>Last 7 Days</option>
      <option value="28" <?= ($_GET['range'] ?? '') === '28' ? 'selected' : '' ?>>Last 28 Days</option>
      <option value="90" <?= ($_GET['range'] ?? '') === '90' ? 'selected' : '' ?>>Last 3 Months</option>
      <option value="all" <?= ($_GET['range'] ?? '') === 'all' ? 'selected' : '' ?>>All Time</option>
    </select>
  </form>
</div>


<?php
$range = $_GET['range'] ?? 'today'; // Default to today
$today = date('Y-m-d');

switch ($range) {
    case 'today':
        $startDate = $today;
        $endDate = $today;
        break;
    case 'yesterday':
        $startDate = date('Y-m-d', strtotime('-1 day'));
        $endDate = $startDate;
        break;
    case '7':
        $startDate = date('Y-m-d', strtotime('-7 days'));
        $endDate = $today;
        break;
    case '28':
        $startDate = date('Y-m-d', strtotime('-28 days'));
        $endDate = $today;
        break;
    case '90':
        $startDate = date('Y-m-d', strtotime('-90 days'));
        $endDate = $today;
        break;
    case 'all':
        $startDate = '2000-01-01';
        $endDate = $today;
        break;
    default:
        $startDate = $today;
        $endDate = $today;
        break;
}
?>



        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Revenue</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                    <ion-icon name="wallet-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
  <h4 class="mb-0">
    <?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

      $query = "SELECT SUM(price * quantity) AS total FROM order_items WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
      $result = mysqli_query($conn, $query);

      $total = 0;
      if ($result && $row = mysqli_fetch_assoc($result)) {
          $total = $row['total'] ?? 0;
      }
      echo "$" . number_format((float)$total, 2);
    ?>
  </h4>
</div>
                  <div class="ms-auto">+6.32%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
  <div class="card radius-10">
    <div class="card-body">
      <div class="d-flex align-items-start gap-2">
        <div>
          <p class="mb-0 fs-6">Total Customer</p>
        </div>
        <div class="ms-auto widget-icon-small text-white bg-gradient-info">
          <ion-icon name="people-outline"></ion-icon>
        </div>
      </div>
      <div class="d-flex align-items-center mt-3">
        <div>
<h4 class="mb-0">
  <?php
    $query = "SELECT COUNT(*) AS total_customers FROM users WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        echo number_format((int)($row['total_customers'] ?? 0));
    } else {
        echo "0";
    }
  ?>
</h4>

        </div>
        <!-- <div class="ms-auto">+12.45%</div> -->
      </div>
    </div>
  </div>
</div>

          <div class="col">
  <div class="card radius-10">
    <div class="card-body">
      <div class="d-flex align-items-start gap-2">
        <div>
          <p class="mb-0 fs-6">Total Orders</p>
        </div>
        <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
          <ion-icon name="bag-handle-outline"></ion-icon>
        </div>
      </div>
      <div class="d-flex align-items-center mt-3">
<h4 class="mb-0">
  <?php
    $query = "SELECT COUNT(*) AS total_orders FROM orders WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($conn, $query);

    $ordersCount = 0;
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $ordersCount = $row['total_orders'] ?? 0;
        echo number_format($ordersCount);
    } else {
        echo "0";
    }
  ?>
</h4>

<div>
  <h4 class="mb-0"><?= number_format($totalOrders) ?></h4>
</div>
        <!-- <div class="ms-auto">+3.12%</div> -->
      </div>
    </div>
  </div>
</div>

          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Add Carts</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <?php


// Get unique users who added items to cart based on timestamp
$cartUsersQuery = "SELECT COUNT(DISTINCT user_id) AS cartUsers FROM cart WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
$cartUsersResult = mysqli_query($conn, $cartUsersQuery);
$cartUsers = 0;

if ($cartUsersResult && $row = mysqli_fetch_assoc($cartUsersResult)) {
    $cartUsers = $row['cartUsers'];
}

// Get total registered users in the same date range
$totalUsersQuery = "SELECT COUNT(*) AS totalUsers FROM users WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsers = 1; // Default to 1 to avoid division by zero

if ($totalUsersResult && $row = mysqli_fetch_assoc($totalUsersResult)) {
    $totalUsers = $row['totalUsers'] ?: 1; // Use 1 if 0 to avoid division error
}

// Calculate percentage
$percentage = ($cartUsers / $totalUsers) * 100;


// Calculate percentage
$percentage = ($cartUsers / $totalUsers) * 100;
?>

<h4 class="mb-0"><?= number_format($cartUsers) ?></h4>
<div class="ms-auto text-success fw-bold"><?= number_format($percentage, 2) ?>%</div>


                  <!-- <div class="ms-auto">+8.52%</div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
<?php
// Example: Let's assume each order gives you $100 revenue

$revenuePerOrder = 100;

// Total orders
$sql = "SELECT COUNT(*) as total_orders FROM orders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalOrders = $row['total_orders'];
$totalRevenue = $totalOrders * $revenuePerOrder;

// You can also group by date or month if needed for charts
?>


  


        <div class="row">
  <div class="col-12 col-xl-8 d-flex">
    <div class="card radius-10 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <h6 class="mb-0">Earning Reports</h6>
          <div class="dropdown options ms-auto">
            <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
              <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
            </div>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>

        <div class="row g-4 align-items-center mb-4">
          <div class="col-12 col-xl-4">
            <div class="d-flex align-items-center gap-2 mb-3">
              <h1 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0)); ?></h1>
              <p class="mb-0 text-success bg-light-success px-2 rounded py-1">+10.6%</p>
            </div>
            <p class="mb-0">Based on total orders placed, multiplied by average order revenue.</p>
          </div>
          <div class="col-12 col-xl-8">
            <div id="chart3"></div>
          </div>
        </div>

        <div class="d-flex flex-column flex-lg-row align-items-lg-center align-self-end justify-content-lg-between border p-3 gap-3 mb-0 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-success text-success">
              <ion-icon name="card-outline"></ion-icon>
            </div>
            <div>
              <h4 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0), 2); ?></h4>
              <p class="mb-0 text-secondary">Total Revenue</p>
            </div>
          </div>
          <div class="vr d-none d-lg-block"></div>
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-info text-info">
              <ion-icon name="diamond-outline"></ion-icon>
            </div>
            <div>
              <h4 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0) * 0.6, 2); ?></h4>
              <p class="mb-0 text-secondary">Total Profit</p>
            </div>
          </div>
          <div class="vr d-none d-lg-block"></div>
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-purple text-purple">
              <ion-icon name="people-circle-outline"></ion-icon>
            </div>
            <div>
              <h4 class="mb-0"><?php echo number_format((int)($totalOrders ?? 0)); ?></h4>
              <p class="mb-0 text-secondary">Total Customers</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php
// Total Revenue
$totalRevenue = 0;
$queryRevenue = "SELECT SUM(price * quantity) AS total FROM order_items WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
$resultRevenue = mysqli_query($conn, $queryRevenue);
if ($resultRevenue && $row = mysqli_fetch_assoc($resultRevenue)) {
    $totalRevenue = $row['total'];
}

// Total Orders (assuming each order_id is unique per order)
$queryOrders = "SELECT COUNT(DISTINCT order_id) AS total_orders FROM order_items WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
$resultOrders = mysqli_query($conn, $queryOrders);
$totalOrders = ($resultOrders && $row = mysqli_fetch_assoc($resultOrders)) ? $row['total_orders'] : 0;

// Total Profit - assuming 60% of revenue is profit
$totalProfit = $totalRevenue * 0.6;
?>



<div class="row">
  <div class="col-12 col-xl-8 d-flex">
    <div class="card radius-10 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <h6 class="mb-0">Earning Reports</h6>
          <div class="dropdown options ms-auto">
            <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
              <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
            </div>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>

        <div class="row g-4 align-items-center mb-4">
          <div class="col-12 col-xl-4">
            <div class="d-flex align-items-center gap-2 mb-3">
              <h1 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0)); ?></h1>
              <p class="mb-0 text-success bg-light-success px-2 rounded py-1">+10.6%</p>
            </div>
            <p class="mb-0">Based on total orders placed, multiplied by average order revenue.</p>
          </div>
          <div class="col-12 col-xl-8">
            <div id="chart3"></div>
          </div>
        </div>

        <div class="d-flex flex-column flex-lg-row align-items-lg-center align-self-end justify-content-lg-between border p-3 gap-3 mb-0 rounded-3">
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-success text-success">
              <ion-icon name="card-outline"></ion-icon>
            </div>
            <div>
              <h1 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0)); ?></h1>
              <p class="mb-0 text-secondary">Total Revenue</p>
            </div>
          </div>
          <div class="vr d-none d-lg-block"></div>
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-info text-info">
              <ion-icon name="diamond-outline"></ion-icon>
            </div>
            <div>
              <h4 class="mb-0">$<?php echo number_format((float)($totalRevenue ?? 0) * 0.6, 2); ?></h4>
              <p class="mb-0 text-secondary">Total Profit</p>
            </div>
          </div>
          <div class="vr d-none d-lg-block"></div>
          <div class="d-flex align-items-center gap-3">
            <div class="widget-icon rounded-circle bg-light-purple text-purple">
              <ion-icon name="people-circle-outline"></ion-icon>
            </div>
            <div>
              <h4 class="mb-0"><?php echo number_format((int)($totalOrders ?? 0)); ?></h4>
              <p class="mb-0 text-secondary">Total Customers</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

  <?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all completed orders
$sql = "SELECT * FROM order_items ORDER BY created_at DESC LIMIT 10";


$result = $conn->query($sql);
?>        



        <div class="card radius-10 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Recent Orders</h6>
              <div class="fs-5 ms-auto dropdown">
                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                    class="bi bi-three-dots"></i></div>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="table-responsive mt-2">
            <table class="table align-middle mb-0">
    <thead class="table-light">
      <tr>
        <th>#ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Status</th>
        <th>Date</th>
        <!-- <th>Actions</th> -->
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td>#<?= $row['order_id'] ?></td>
            <td>
              <div class="d-flex align-items-center gap-3">
                <div class="product-box border" style="width: 50px; height: 50px; overflow: hidden;">
                  <img src="<?= $row['product_image'] ?>" alt="product" style="width: 100%; height: auto;">
                </div>
                <div class="product-info">
                  <h6 class="product-name mb-1"><?= $row['product_name'] ?></h6>
                </div>
              </div>
            </td>
            <td><?= $row['quantity'] ?></td>
            <td>$<?= number_format($row['price'], 2) ?></td>
           <td><span class="badge bg-success">Completed</span></td>

            <td><?= date("M d, Y", strtotime($row['created_at'])) ?></td>
            <!-- <td>
              <div class="d-flex align-items-center gap-3 fs-6">
                <a href="javascript:;" class="text-primary" title="View">
                  <ion-icon name="eye-outline"></ion-icon>
                </a>
                <a href="javascript:;" class="text-warning" title="Edit">
                  <ion-icon name="pencil-outline"></ion-icon>
                </a>
                <a href="javascript:;" class="text-danger" title="Delete">
                  <ion-icon name="trash-outline"></ion-icon>
                </a>
              </div>
            </td> -->
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center">No completed orders found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--end page content wrapper-->


    <!--start footer-->
    <footer class="footer">
      <div class="footer-text">
        Copyright © 2023. All right reserved.
      </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
      </button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
            <label class="form-check-label" for="SemiDark">Semi Dark</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end switcher-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

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
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
  <script src="assets/plugins/chartjs/chart.min.js"></script>
  <script src="assets/js/index.js"></script>
  <!-- Main JS-->
  <script src="assets/js/main.js"></script>
        <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Search Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="searchForm" onsubmit="searchProducts(event)">
          <div class="mb-3">
            <label for="sku" class="form-label">SKU Number</label>
            <input type="text" class="form-control" id="sku" placeholder="Enter SKU number">
          </div>
          <div class="mb-3">
            <label for="productId" class="form-label">Product ID</label>
            <input type="text" class="form-control" id="productId" placeholder="Enter Product ID">
          </div>
          <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>

        <!-- 🔽 Results appear here -->
        <div id="searchResults" class="mt-3"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

<script>
function searchProducts(event) {
    if (event) event.preventDefault(); // prevent form reload

    const sku = document.getElementById('sku').value.trim();
    const productId = document.getElementById('productId').value.trim();

    if (!sku && !productId) {
        alert("Please enter either SKU or Product ID.");
        return;
    }

    // Prepare form data
    const formData = new FormData();
    formData.append('sku', sku);
    formData.append('productId', productId);

    // Fetch product from search.php via POST
    fetch('search.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('searchResults').innerHTML = html;
    })
    .catch(err => {
        console.error(err);
        document.getElementById('searchResults').innerHTML = "<p style='color:red;'>❌ Error fetching product</p>";
    });
}
</script>


</body>

</html>