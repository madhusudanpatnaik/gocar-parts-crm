<?php
require_once __DIR__ . '/includes/config.php';

// Database connection
$host = DB_HOST;
$user = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

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

$employee_id = $_SESSION['user_id'];

// Get employee name
$emp_query = "SELECT name FROM users WHERE id = ?";
$emp_stmt = $conn->prepare($emp_query);
$emp_stmt->bind_param("i", $employee_id);
$emp_stmt->execute();
$emp_result = $emp_stmt->get_result();
$employee = $emp_result->fetch_assoc();

// Pagination logic
$limit = 10; // number of tasks per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Get total number of tasks for this employee
$count_query = "SELECT COUNT(*) AS total FROM emp_tasks WHERE employee_id = ?";
$count_stmt = $conn->prepare($count_query);
$count_stmt->bind_param("i", $employee_id);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch tasks for current employee with lead details
$task_query = "
    SELECT 
        et.id AS task_id,
        et.lead_id,
        et.lead_type,
        et.assigned_at,
        et.status,
        l.user_id,
        l.name,
        l.email,
        l.contact_number,
        l.zipcode,
        l.notes,
        l.make,
        l.model,
        l.submitted_at
    FROM emp_tasks et
    JOIN (
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'mileage' AS lead_type 
        FROM mileage_requests
        UNION ALL
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'price' AS lead_type 
        FROM price_requests
        UNION ALL
        SELECT 
            id, user_id, name, email, contact_number, zipcode, notes, 
            make, model, submitted_at, 'request_quote' AS lead_type 
        FROM quote_requests
    ) AS l ON et.lead_id = l.id AND et.lead_type = l.lead_type
    WHERE et.employee_id = ?
    ORDER BY et.assigned_at DESC
    LIMIT ?, ?
";

$task_stmt = $conn->prepare($task_query);
$task_stmt->bind_param("iii", $employee_id, $start, $limit);
$task_stmt->execute();
$result = $task_stmt->get_result();

// Count task statuses
$status_query = "SELECT status, COUNT(*) AS count FROM emp_tasks WHERE employee_id = ? GROUP BY status";
$status_stmt = $conn->prepare($status_query);
$status_stmt->bind_param("i", $employee_id);
$status_stmt->execute();
$status_result = $status_stmt->get_result();

$pending_tasks = 0;
$completed_tasks = 0;

while ($status = $status_result->fetch_assoc()) {
    if ($status['status'] == 'completed') {
        $completed_tasks = $status['count'];
    } else {
        $pending_tasks = $status['count'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Tasks - Employee Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="emp_style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include('sidebar.php'); ?>

<div class="main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>My Assigned Tasks</h2>
      <div class="d-flex gap-2">
        <span class="badge bg-info fs-6">Welcome, <?php echo $username; ?></span>
      </div>
    </div>

    <!-- Task Statistics -->
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <h4 class="text-primary"><?= $total_rows ?></h4>
            <div class="text-muted">Total Assigned</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <h4 class="text-warning"><?= $pending_tasks ?></h4>
            <div class="text-muted">Pending Tasks</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <h4 class="text-success"><?= $completed_tasks ?></h4>
            <div class="text-muted">Completed</div>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['msg'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET['msg']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if ($result->num_rows == 0): ?>
      <div class="alert alert-info text-center">
        <h5>No tasks assigned yet!</h5>
        <p class="mb-0">Visit the <a href="emp_leads.php" class="alert-link">Leads</a> page to assign leads to yourself.</p>
      </div>
    <?php else: ?>
  
       <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>S.No.</th>
              <th>Lead ID</th>
              <th>Customer Name</th>
              <th>Contact Number</th>
              <th>Vehicle Make</th>
              <th>Vehicle Model</th>
              <th>Lead Type</th>
              <th>Submitted At</th>
              <th>Assigned At</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $sno = $start + 1; while ($row = $result->fetch_assoc()): ?>
              <?php
                $badge_class = ''; $display_type = '';
                switch($row['lead_type']) {
                  case 'mileage': $badge_class = 'bg-primary'; $display_type = 'Mileage'; break;
                  case 'price': $badge_class = 'bg-success'; $display_type = 'Price'; break;
                  case 'request_quote': $badge_class = 'bg-warning'; $display_type = 'Request Quote'; break;
                }
              ?>
              <tr>
                <td><?= $sno++ ?></td>
              <td>
                <a href="navbar.php?lead_id=<?= $row['lead_id'] ?>&type=<?= $row['lead_type'] ?>" 
                  class="text-decoration-none fw-bold text-primary"
                  title="Click to view lead details">
                  <?= $row['lead_id'] ?>
                </a>
              </td>

                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['contact_number']) ?></td>
                <td><?= htmlspecialchars($row['make']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><span class="badge <?= $badge_class ?>"><?= $display_type ?></span></td>
                <td><?= date('M d, Y H:i', strtotime($row['submitted_at'])) ?></td>
                <td><?= date('M d, Y H:i', strtotime($row['assigned_at'])) ?></td>
                <td>
                  <?php if ($row['status'] == 'completed'): ?>
                    <span class="badge bg-success">Completed</span>
                  <?php else: ?>
                    <span class="badge bg-warning">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <div class="btn-group btn-group-sm" role="group">
                    <?php if ($row['status'] != 'completed'): ?>
                      <button type="button" class="btn btn-success" onclick="markTaskCompleted(<?= $row['lead_id'] ?>, '<?= $row['lead_type'] ?>')">Complete</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-info" onclick="viewNotes(<?= $row['lead_id'] ?>, '<?= $row['lead_type'] ?>')">Notes</button>
                    <button type="button" class="btn btn-primary" onclick="contactCustomer('<?= htmlspecialchars($row['email']) ?>', '<?= htmlspecialchars($row['contact_number']) ?>')">Contact</button>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div> 

      <!-- Pagination Controls -->
      <?php if ($total_pages > 1): ?>
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-4">
          <?php if ($page > 1): ?>
            <li class="page-item">
              <a class="page-link" href="my_tasks.php?page=<?= $page - 1 ?>">&laquo; Previous</a>
            </li>
          <?php endif; ?>
          
          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
              <a class="page-link" href="my_tasks.php?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>
          
          <?php if ($page < $total_pages): ?>
            <li class="page-item">
              <a class="page-link" href="my_tasks.php?page=<?= $page + 1 ?>">Next &raquo;</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>

<!-- Notes Modal -->
<div class="modal fade" id="notesModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Customer Notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="notesContent">
        <!-- Notes will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contact Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="contactContent">
        <!-- Contact info will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

function markTaskCompleted(leadId, leadType) {
    if (confirm('Are you sure you want to mark this lead as completed?')) {
        const btn = event.target;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Processing';

        fetch('update_lead_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `lead_id=${leadId}&lead_type=${encodeURIComponent(leadType)}`
        })
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Update the UI
                const row = btn.closest('tr');
                if (row) {
                    // Update status cell
                    const statusCell = row.querySelector('.status-cell');
                    if (statusCell) {
                        statusCell.textContent = 'completed';
                        statusCell.classList.add('text-success');
                    }
                    // Remove action buttons
                    const btnGroup = row.querySelector('.btn-group');
                    if (btnGroup) btnGroup.innerHTML = '<span class="badge bg-success">Completed</span>';
                }
            } else {
                throw new Error(data.message || 'Update failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error: ' + error.message);
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = originalText;
        });
    }
}
function viewNotes(leadId, leadType) {
  fetch(`get_lead_notes.php?id=${leadId}&type=${leadType}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById('notesContent').innerHTML = data;
      new bootstrap.Modal(document.getElementById('notesModal')).show();
    })
    .catch(error => {
      alert('Error loading notes');
    });
}

function contactCustomer(email, phone) {
  const contactInfo = `
    <div class="mb-3">
      <strong>Email:</strong> 
      <a href="mailto:${email}" class="btn btn-outline-primary btn-sm ms-2">
        ${email}
      </a>
    </div>
    <div class="mb-3">
      <strong>Phone:</strong> 
      <a href="tel:${phone}" class="btn btn-outline-success btn-sm ms-2">
        ${phone}
      </a>
    </div>
    <div class="alert alert-info">
      <small>Click the buttons above to open your default email client or phone app.</small>
    </div>
  `;
  
  document.getElementById('contactContent').innerHTML = contactInfo;
  new bootstrap.Modal(document.getElementById('contactModal')).show();
}


</script>
</body>
</html>