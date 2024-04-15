<!--connect file-->
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
    <title>curtains and accessories cart details</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>
    .cart_img{
    width: 80px;
    height: 80px;
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
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
       <?php
         if (isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
        ?> 
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
        </li>
        
        </div>

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
    <a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
  }
  ?>
</ul>
</nav>
<!--header-->
<div class="bg-light">
    <h3 class="text-center">Featured products</h3>
    <p class="text-center">curtains and accessories</p>
</div>

 <!--body structure-->
 <div class="container">
    <div class="row">
        <form action="" method="post" class="form-info">
        <table class="table table-bordered text-center">
            <tbody>
                <!--php code to display dynamic data-->
                <?php 
                    $get_ip_add= getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result= mysqli_query($con, $cart_query);
                    $result_count= mysqli_num_rows($result);
                    if($result_count> 0){
                      echo" <thead><tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr></thead><tbody>";
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products= "Select * from `products` where product_id='$product_id'";
                        $result_products= mysqli_query($con, $select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price=array($row_product_price['product_price']);
                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                       ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                     $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart = "UPDATE `cart_details` SET quantity=? WHERE ip_address=?";
                        $stmt = mysqli_prepare($con, $update_cart);
                        mysqli_stmt_bind_param($stmt, "is", $quantities, $get_ip_add);
                        mysqli_stmt_execute($stmt);
                        $total_price=$total_price*$quantities; }
                    ?>
                    <td><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0" name="update_cart">
                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 mx-3 border-0" name="remove_cart">
                    </td>
                </tr>
                <?php
                        }}}
                  else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                  }
                    ?>
            </tbody>
        </table>
        <!--subtotal-->
        <div class="d-flex mb-3 mt-1">
          <?php
           $get_ip_add= getIPAddress();
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result= mysqli_query($con, $cart_query);
                    $result_count= mysqli_num_rows($result);
                    if($result_count> 0){
                      echo"<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
                      <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>
                      <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                    }else{
                      echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>";
                    }
                    if(isset($_POST['continue_shopping'])){
                      echo "<script>window.open('index.php','_self')</script>";
                    }
          ?>
        </div></div></div> </form>
 <!--function to remove item-->
 <?php
 function remove_cart_item(){
  global $con;
  $remove_item='';
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con, $delete_query);
      if($run_delete){
        $remove_item= "<script>window.open('cart.php','_self')</script>";
      }}}
  return $remove_item;
 }
 $remove_item=remove_cart_item();
 echo $remove_item;
 ?>
<?php include "./includes/footer.php" ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</html>