<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader -->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>

    <!-- plugins -->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>Inventory - Admin</title>
    <!-- <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 80px;
            height: auto;
        }
        .btn {
            padding: 5px 10px;
            background: #0073aa;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-danger {
            background: red;
        }
    </style> -->
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
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary">Settings</button>
                        <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>

    
                      <h1>Inventory List</h1>
                    <form id="addProductForm" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" name="price" placeholder="Price" step="0.01" required>
    
    <select name="category_name" required>
        <option value="">Select Category</option>
        <option value="Used Engines">Used Engines</option>
        <option value="Used Transmissions">Used Transmissions</option>
    </select>

    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Add Product</button>
</form>

<hr>


 <table id="inventoryTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>
        </div>
    </div>
</div>

<!-- JS Files -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
$(document).ready(function(){
    $('#inventoryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'get_products.php',
            type: 'GET'
        },
        order: [[0, 'desc']],
        pageLength: 10,
        columns: [
            { title: "ID" },
            { title: "Product Name" },
            { title: "Price" },
            { title: "Category" },
            { title: "Image", orderable: false, searchable: false },
            { title: "Actions", orderable: false, searchable: false }
        ]
    });

    // Edit product button click
    $(document).on('click', '.edit-product', function(){
        let id = $(this).data('id');
        window.location.href = 'edit_product.php?id=' + id;
    });

    // Delete product button click
    $(document).on('click', '.delete-product', function(){
        if(confirm("Are you sure you want to delete this product?")) {
            let id = $(this).data('id');

            $.ajax({
                url: 'delete_product.php',
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function(response){
                    if(response.status === 'success') {
                        alert(response.message);
                        $('#inventoryTable').DataTable().ajax.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(){
                    alert("Something went wrong while deleting the product.");
                }
            });
        }
    });
});

// Add Product form submit
$('#addProductForm').on('submit', function(e){
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: 'add_product.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        processData: false,  // Important for file upload
        contentType: false,  // Important for file upload
        success: function(response){
            alert(response.message);
            if(response.status === 'success'){
                $('#inventoryTable').DataTable().ajax.reload();
                $('#addProductForm')[0].reset();
            }
        },
        error: function(){
            alert("Something went wrong while adding the product.");
        }
    });
});

</script>

<!-- <script>
$(document).ready(function(){
    $('#inventoryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'get_products.php',
            type: 'GET'
        },
        order: [[0, 'desc']],
        pageLength: 10
    });

    // Example delete click handler (you can expand it later)
    $(document).on('click', '.delete-product', function(){
        if(confirm("Are you sure you want to delete this product?")) {
            let id = $(this).data('id');
            alert("Here you would call delete API for product ID: " + id);
        }
    });
});

// delete_product
$(document).on('click', '.delete-product', function(){
    if(confirm("Are you sure you want to delete this product?")) {
        let id = $(this).data('id');

        $.ajax({
            url: 'delete_product.php',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(response){
                if(response.status === 'success') {
                    alert(response.message);
                    $('#inventoryTable').DataTable().ajax.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(){
                alert("Something went wrong while deleting the product.");
            }
        });
    }
});

// 
$('#addProductForm').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url: 'add_product.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response){
            alert(response.message);
            if(response.status === 'success'){
                $('#inventoryTable').DataTable().ajax.reload();
                $('#addProductForm')[0].reset();
            }
        },
        error: function(){
            alert("Something went wrong while adding the product.");
        }
    });
});
// 
// Add this inside your $(document).ready(function(){ ... });

$(document).on('click', '.edit-product', function() {
    let id = $(this).data('id');
    // Redirect to edit_product.php with the product ID
    window.location.href = 'edit_product.php?id=' + id;
});

</script> -->
</body>
</html>

