<!--connect file-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/connect.php';
include '../functions/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .footer{
    position: absolute;
    bottom: 0%;
}
body{
    overflow: hidden;
}
.product_img{
    width: 19%;
    object-fit: contain;
    height: 17%;
}
        </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar-expand-lg " style="background-color: darkgrey;">
        <div class="container-fluid">
          <nav class="navbar-expand-lg ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome June</a>
                </li>
        </ul></nav></div></nav></div>
    <div class="bg-light">
        <h3 class="text-center p-3">Manage Details</h3>
    </div>
    <div class="row">
        <div class="col-md-12 p-2 d-flex align-items-center" style="background-color: rgb(124, 124, 124);">
        <div class="p-3">
        <a href="#"><img src="../images/profile.jpeg" alt="" class="Admin_image"></a>
        <p class="text-light text-center">Admin June</p>
    </div>
    <div class="button text-center">
       <button class="m-2"><a href="insert_product.php" class="nav-link text-dark 
        bg-info m-1 p-2">Insert products</a></button>
       <button class="m-2"><a href="index.php?view_products" class="nav-link text-dark 
        bg-info m-1 p-2">View products</a></button>
       <button><a href="index.php?insert_category" class="nav-link text-dark 
        bg-info m-1 p-2">Insert categories</a></button>
       <button class="m-2"><a href="index.php?view_categories" class="nav-link text-dark 
        bg-info m-1 p-2">View catergories</a></button>
       <button class="m-2"><a href="index.php?insert_brands" class="nav-link text-dark 
        bg-info m-1 p-2">Insert brands</a></button>
       <button class="m-2"><a href="index.php?view_brands" class="nav-link text-dark 
        bg-info m-1 p-2">View brands</a></button>
       <button class="m-2"><a href="index.php?list_orders" class="nav-link text-dark
        bg-info m-1 p-2">All orders</a></button>
       <button class="m-2"><a href="index.php?list_payments" class="nav-link text-dark 
        bg-info m-1 p-2">All payments</a></button>
       <button class="m-2"><a href="index.php?list_users" class="nav-link text-dark 
        bg-info m-1 p-2">List users</a></button>
       <button class="m-2"><a href="admin_login.php" class="nav-link text-dark 
        bg-info m-1 p-2">Login</a></button>
    </div></div></div>
    <div class="container m-3">
         <?php
       if (isset($_GET['insert_category'])) {
            include 'insert_categories.php';
        }
        if (isset($_GET['insert_brands'])) {
            include 'insert_brands.php';
        }
         if (isset($_GET['view_categories'])) {
            include 'view_categories.php';
        }
         if (isset($_GET['edit_category'])) {
            include 'edit_category.php';
        }
         if (isset($_GET['edit_brands'])) {
            include 'edit_brands.php';
        }
         if (isset($_GET['delete_category'])) {
            include 'delete_category.php';
        }
         if (isset($_GET['delete_product'])) {
            include 'delete_product.php';
        }

         if (isset($_GET['delete_brands'])) {
            include 'delete_brands.php';
        }

         if (isset($_GET['view_products'])) {
            include 'view_products.php';
        }

         if (isset($_GET['view_brands'])) {
            include 'view_brands.php';
        }

         if (isset($_GET['list_orders'])) {
            include 'list_orders.php';
        }

          if (isset($_GET['delete_orders'])) {
            include 'delete_orders.php';
        }

          if (isset($_GET['list_payments'])) {
            include 'list_payments.php';
        }

          if (isset($_GET['delete_payments'])) {
            include 'delete_payments.php';
        }

          if (isset($_GET['list_users'])) {
            include 'list_users.php';
        }
       ?>
   
    </div>
    
<?php
include "../includes/footer.php"
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</html>