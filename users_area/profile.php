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
    <title>curtains and accessories.</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style.css">
<style>
  body{
    overflow-x: hidden;
    
  }
  .profile_img{
    width: 90%;
    margin: auto;
    display: block;
    object-fit: contain;
}
.edit_image{
  width: 100px;
  height: 100px;
  object-fit: contain;
}
</style>
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
          <a class="nav-link " href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Cart<i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             more
          </a>
          <ul class="dropdown-menu">
                       
          </ul>
        </li>
    </div>

        
      <form class="d-flex" action="../search_product.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search_data">
      <input type="submit" value="search" class="btn btn-outline-light"  name="search_data_product">
    </form>
    </ul>
    </div>
</nav>

<!--calling cart function-->
<?php
cart();
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(7, 3, 3);">
<ul class="navbar-nav me-auto">
  <?php
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
  </li>";
  }

  
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Logout</a></li>";
  }
  ?>
  
</ul>
</nav>

<div class="bg-light">
    <h3 class="text-center">Featured products</h3>
    <p class="text-center">curtains and accessories</p>
</div>

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center">
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
            </li>
            <?php
            $username=$_SESSION['username'];
            $user_image="Select * from `user_table` where username='$username'";
            $result_image=mysqli_query($con,$user_image);
            $row_image=mysqli_fetch_array($result_image);
            $user_image=$row_image['user_image'];
            echo "<li class='nav-item'>
                <img src='../images/$user_image' class='profile_img my-3' alt=''>
            </li>";
            ?>
            <!--common functions-->
           
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?edit_account">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
    <a class="nav-link text-light" href="logout.php">Logout</a>
</li>

        </ul>
    </div> 
        <div class="col-md-10 text-center">
            <?php
          
            if(isset($_GET['edit_account'])){
              include 'edit_account.php';
            }
            if(isset($_GET['my_orders'])){
              include 'user_orders.php';
            }
             if(isset($_GET['delete_account'])){
              include 'delete_account.php';
            }
            ?>
        
    </div>
</div>



<?php
include "../includes/footer.php"
?>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</html>