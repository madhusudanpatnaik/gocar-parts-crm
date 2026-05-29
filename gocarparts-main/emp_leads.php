<?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname  = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

// Check if user is logged in as employee
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    header("Location: login.php");
    exit;
}
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard - Leads</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="emp_style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include('sidebar.php'); ?>

<div class="main-content">
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Lead deleted successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>All Leads</h2>
      <div class="badge bg-info">Total: <?= $total_rows ?> leads</div>
    </div>

    <?php if (isset($_GET['msg'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET['msg']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
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
                            onclick="assignLead(<?= $row['id'] ?>, '<?= $row['lead_type'] ?>')">
                      Assign to Me
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

<!-- Lead Details Modal -->
<div class="modal fade" id="leadDetailsModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lead Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="leadDetailsContent">
        <!-- Lead details will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
function assignLead(leadId, leadType) {
  if (confirm('Are you sure you want to assign this lead to yourself?')) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'assign_task.php';
    
    const leadIdInput = document.createElement('input');
    leadIdInput.type = 'hidden';
    leadIdInput.name = 'lead_id';
    leadIdInput.value = leadId;
    
    const leadTypeInput = document.createElement('input');
    leadTypeInput.type = 'hidden';
    leadTypeInput.name = 'lead_type';
    leadTypeInput.value = leadType;
    
    form.appendChild(leadIdInput);
    form.appendChild(leadTypeInput);
    document.body.appendChild(form);
    form.submit();
  }
}



function viewDetails(leadId, leadType) {
  // Load lead details via AJAX
  fetch(`get_lead_details.php?id=${leadId}&type=${leadType}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById('leadDetailsContent').innerHTML = data;
      new bootstrap.Modal(document.getElementById('leadDetailsModal')).show();
    })
    .catch(error => {
      alert('Error loading lead details');
    });
}

function deleteLead(leadId, leadType) {
  if (confirm('Are you sure you want to delete this lead? This action cannot be undone.')) {
    window.location.href = `delete_lead.php?id=${leadId}&type=${leadType}`;
  }
}
</script>

</body>
</html>