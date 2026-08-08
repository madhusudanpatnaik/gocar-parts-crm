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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    // First delete from related tables (e.g. cart)
    $conn->query("DELETE FROM cart WHERE user_id = $delete_id");

    // Then delete from users
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}



$users = [];
$user_sql = "SELECT id, username, email, role FROM users ORDER BY id DESC";
$user_result = $conn->query($user_sql);
if ($user_result->num_rows > 0) {
    while ($row = $user_result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>





<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>Fobia - Bootstrap5 Admin Template</title>
</head>

<body>


  <div class="wrapper">

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
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <!-- <ion-icon name="bag-handle-outline"></ion-icon> -->
            </div>
            <div class="menu-title">Payments</div>
          </a>
         
        </li>
        <li class="menu-label">Leads</li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </div>
            <div class="menu-title">leads</div>
          </a>
          <ul>
            <li> <a href="widgets-static-widgets.html">
                <ion-icon name="ellipse-outline"></ion-icon>Mileage
              </a>
            </li>
            <li> <a href="widgets-data-widgets.html">
                <ion-icon name="ellipse-outline"></ion-icon>price
              </a>
            </li>
            <li> <a href="widgets-data-widgets.html">
                <ion-icon name="ellipse-outline"></ion-icon>Request Quote
              </a>
            </li>
          </ul>
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
            <li> <a href="">
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
              <ul>
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
              </ul>
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


    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="card mt-4">
  <div class="card-body">
    <h5 class="card-title">All Users</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
           <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['id']) ?></td>
              <td><?= htmlspecialchars($user['username'] ?? 'N/A') ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
              <td>
                <span class="badge <?= $user['role'] === 'admin' ? 'bg-danger' : ($user['role'] === 'employee' ? 'bg-info text-dark' : 'bg-primary') ?>">
                  <?= ucfirst($user['role']) ?>
                </span>
              </td>
              <td>
                <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                  <input type="hidden" name="delete_id" value="<?= $user['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php if (empty($users)): ?>
            <tr><td colspan="4">No users found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>

</body>

</html>