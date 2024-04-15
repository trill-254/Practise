<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'includes/connect.php';
include 'functions/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curtains and accessories.</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BeyondBlinds Botique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a></li>
        <li class="nav-item">
          <a class="nav-link active" href="display_all.php">Products</a></li>
        <?php
         if (isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My account</a></li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a></li>"; }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item">
           <a class="nav-link active text-light" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a></li>
        <li class="nav-item">
         <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li></ul></li></div> 
      <form class="d-flex" action="search_product.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search_data">
      <input type="submit" value="search" class="btn btn-outline-light"  name="search_data_product">
    </form></ul></div></nav>
<?php cart(); ?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(7, 3, 3);">
<ul class="navbar-nav me-auto"> 
  <?php
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/profile.php'>Welcome Guest</a></li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/profile.php'>Welcome ".$_SESSION['username']."</a></li>"; }
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/logout.php'>Logout</a></li>"; }
  ?>
</ul></nav>
<div class="bg-light">
    <h3 class="text-center">Featured products</h3>
    <p class="text-center">curtains and accessories</p>
</div>
<div class="row px-1">
  <div class="col-md-10">
    <div class="row">
      <?php      //calling functions
      get_all_products();
      get_unique_categories();
      get_unique_brands();
      ?>     <!--row end-->
</div></div>
  <div class="col-md-2  bg-secondary p-0">     <!--brands to be displayed-->
     <ul class="navbar-nav me-auto text-center">
  <li class="nav-item" style="background-color: rgb(0, 110, 255);">
    <a class="nav-link text-light" href="#"><h4>Delivery Brands</h4></a>
  </li>
 <?php getbrands(); ?>
     </ul>     <!--categories to be displayed-->
     <ul class="navbar-nav me-auto text-center">
  <li class="nav-item" style="background-color: rgb(0, 110, 255);">
    <a class="nav-link text-light" href="#"><h4>categories</h4></a>
  </li>
  <?php getcetegories(); ?>
     </ul></div></div>
<?php include "./includes/footer.php"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</html>