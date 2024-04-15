<!--connect file-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/connect.php';
session_start();
// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ./user_login.php");
    exit; // Stop executing the rest of the code
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>curtains and accessories checkout page.</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(167, 161, 161);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BeyondBlinds Botique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a></li>
      <?php
        if (isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My account</a></li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a></li>";
        }
        ?> 
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a></li>
          <ul class="dropdown-menu"></ul></li></div>
      <form class="d-flex" action="search_product.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search_data">
      <input type="submit" value="search" class="btn btn-outline-light"  name="search_data_product">
    </form></ul></div></nav>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(7, 3, 3);">
<ul class="navbar-nav me-auto">
  <?php
  if(!isset($_SESSION['username'])){ echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a></li>";
  }else{ echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
  }
  if (!isset($_SESSION['username'])) {  echo "<li class='nav-item'>
  <a class='nav-link' href='./user_login.php'>Login</a></li>";
  }else{ echo "<li class='nav-item'><a class='nav-link' href='./logout.php'>Logout</a></li>";  }
  ?></ul></nav>
<div class="bg-light">
    <h3 class="text-center">Featured products</h3>
    <p class="text-center">curtains and accessories</p>
</div>
<div class="row px-1">
  <div class="col-md-12"><!--products-->
    <div class="row">
        <?php
      if(!isset($_SERION['username'])){ include 'payment.php';
    }else{include 'user_login.php';}
      ?><!--row end--></div><!--col end--></div></div> 
<?php include "../includes/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</html>