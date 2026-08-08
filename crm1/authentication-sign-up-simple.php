<?php
require_once __DIR__ . '/includes/config.php';

// DB Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Admin/Employee Handler
if (isset($_POST['add_admin'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $conn->real_escape_string($_POST['role']);
    $created_at = date("Y-m-d H:i:s");

    // Check if email already exists
    $check = $conn->query("SELECT id FROM users WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert the new user
        $insert = "INSERT INTO users (role, name, username, email, password, created_at)
                   VALUES ('$role', '$name', '$username', '$email', '$password', '$created_at')";
        if ($conn->query($insert)) {
            echo "<script>alert('User added successfully'); window.location.href='customers.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to add user');</script>";
        }
    }
}

// Fetch users for listing
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
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

  <!--start wrapper-->
  <div class="wrapper">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-3">
        <div class="container-fluid">
          <a href="javascript:;"><img src="assets/images/logo-icon-3.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">Contact</a>
              </li>
            </ul>
            <form class="d-flex">
              <a href="javascript:;" class="btn btn-sm btn-primary px-4 radius-30">Buy Now</a>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Add New EMployee OR Admin</h4>
                <p>Creat New account</p>
              </div>
              <form action="" method="POST" class="modal-content">
      <div class="modal-header">
  <!--         
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" id="role" class="form-select" required>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_admin" class="btn btn-success">Add User</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="my-5">
      <div class="container">
        <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
          <a href="javascript:;">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-github"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
          <a href="javascript:;">
            <ion-icon name="logo-pinterest"></ion-icon>
          </a>
        </div>
        <div class="text-center">
          <p class="my-4">Copyright © 2021 UI Admin by Codervent.</p>
        </div>
      </div>
    </footer>
  </div>
  <!--end wrapper-->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>