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
session_start();

// Check if user is logged in as employee

$username = htmlspecialchars($_SESSION['username'] ?? 'Employee');



// Pagination logic
$limit = 10; // number of leads per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Get total number of leads
$count_query = "
    SELECT COUNT(*) AS total FROM (
        SELECT id FROM mileage_requests
        UNION ALL
        SELECT id FROM price_requests
        UNION ALL
        SELECT id FROM quote_requests
    ) AS combined
";
$count_result = $conn->query($count_query);
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch leads for current page with assignment status
$lead_query = "
SELECT leads.*, et.employee_id, et.status AS task_status, u.username AS assigned_employee
  FROM (
    SELECT 
      id, 
      user_id, 
      name, 
      email, 
      contact_number, 
      zipcode, 
      notes, 
      make, 
     model, 
      submitted_at, 
      'mileage' AS lead_type 
    FROM mileage_requests
    UNION ALL
    SELECT 
      id, 
      user_id, 
      name, 
      email, 
      contact_number, 
      zipcode, 
      notes, 
      make, 
     model, 
      submitted_at, 
      'price' AS lead_type 
    FROM price_requests
    UNION ALL
    SELECT 
      id, 
      user_id, 
      name, 
      email, 
      contact_number, 
      zipcode, 
      notes, 
      make, 
      model, 
      submitted_at, 
      'request_quote' AS lead_type 
    FROM quote_requests
  ) AS leads
  LEFT JOIN emp_tasks et ON et.lead_id = leads.id AND et.lead_type = leads.lead_type
  LEFT JOIN users u ON u.id = et.employee_id
  ORDER BY submitted_at DESC
  LIMIT $start, $limit
";
$result = $conn->query($lead_query);
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
                  <li class="breadcrumb-item active" aria-current="page">Leads</li>
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
    <h5 class="card-title">Lead Summary</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>S.No.</th>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact_number</th>
            <th>ZipCode</th>
            <th>Part Name</th>
            <th>Vehicle Model</th>
            <th>Lead Type</th>
            <th>Submitted At</th>
            <th>Assignment Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php $sno = $start + 1; while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $sno++ ?></td>
              <td><?= $row['id'] ?></td>
              <td><?= $row['user_id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['contact_number']) ?></td>
              <td><?= htmlspecialchars($row['zipcode']) ?></td>
              <td><?= htmlspecialchars($row['make']) ?></td>
              <td><?= htmlspecialchars($row['model']) ?></td>
              <td>
                <?php 
                $badge_class = '';
                $display_type = '';
                switch($row['lead_type']) {
                  case 'mileage':
                    $badge_class = 'bg-primary';
                    $display_type = 'Mileage';
                    break;
                  case 'price':
                    $badge_class = 'bg-success';
                    $display_type = 'Price';
                    break;
                  case 'request_quote':
                    $badge_class = 'bg-warning';
                    $display_type = 'Request Quote';
                    break;
                }
                ?>
                <span class="badge <?= $badge_class ?>"><?= $display_type ?></span>
              </td>
              <td><?= date('M d, Y H:i', strtotime($row['submitted_at'])) ?></td>
              <td>
                <?php if (empty($row['employee_id'])): ?>
  <span class="badge bg-secondary">Unassigned</span>
<?php else: ?>
  <?php
   $status = htmlspecialchars($row['task_status'] ?? '');
$badge = ($status === 'completed') 
  ? '<span class="badge bg-success">Completed by ' . htmlspecialchars($row['assigned_employee']) . '</span>'
  : '<span class="badge bg-info">Assigned to ' . htmlspecialchars($row['assigned_employee']) . '</span>';
    echo $badge;
  ?>
<?php endif; ?>

              </td>
              <td>
                <div class="btn-group" role="group">
                  <?php if (empty($row['employee_id'])): ?>
                    <button type="button" class="btn btn-sm btn-primary" 
        data-bs-toggle="modal" 
        data-bs-target="#assignModal" 
        onclick="openAssignModal(<?= $row['id'] ?>, '<?= $row['lead_type'] ?>')">
  Assign
</button>


                    
                  <?php else: ?>
                    <button type="button" class="btn btn-sm btn-warning" 
                            onclick="reassignLead(<?= $row['id'] ?>, '<?= $row['lead_type'] ?>')">
                      Reassign
                    </button>
                  <?php endif; ?>
                  
                  <button type="button" class="btn btn-sm btn-info" 
                          onclick="viewDetails(<?= $row['id'] ?>, '<?= $row['lead_type'] ?>')">
                    View
                  </button>
                  
                  <button type="button" class="btn btn-sm btn-danger" 
                          onclick="deleteLead(<?= $row['id'] ?>, '<?= $row['lead_type'] ?>')">
                    Delete
                  </button>
                  
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="13" class="text-center">No leads found.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
      
      <!-- Pagination Controls -->
      <?php if ($total_pages > 1): ?>
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-4">
          <?php if ($page > 1): ?>
            <li class="page-item">
              <a class="page-link" href="emp_leads.php?page=<?= $page - 1 ?>">&laquo; Previous</a>
            </li>
          <?php endif; ?>
          
          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
              <a class="page-link" href="emp_leads.php?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>
          
          <?php if ($page < $total_pages): ?>
            <li class="page-item">
              <a class="page-link" href="emp_leads.php?page=<?= $page + 1 ?>">Next &raquo;</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <?php endif; ?>
    </div>
  </div>
</div>


<!-- Assign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="assign_task_admin.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignModalLabel">Assign Lead</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="lead_id" id="modal_lead_id">
          <input type="hidden" name="lead_type" id="modal_lead_type">

          <div class="mb-3">
            <label for="employee_id" class="form-label">Select Employee</label>
            <select class="form-select" name="employee_id" required>
              <option value="">Select Employee</option>
              <?php
              $user_sql = "SELECT id, username FROM users WHERE role='employee'";
              $user_result = $conn->query($user_sql);
              while ($emp = $user_result->fetch_assoc()) {
                echo "<option value='{$emp['id']}'>{$emp['username']}</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Assign</button>
        </div>
      </div>
    </form>
  </div>
</div>





<!--  -->
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

              <script>

                function openAssignModal(id, type) {
  document.getElementById('modal_lead_id').value = id;
  document.getElementById('modal_lead_type').value = type;
}

              </script>
</body>
</html>



