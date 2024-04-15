<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/connect.php';
include '../functions/common_function.php';

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number = mt_rand();
$status = 'pedding';
$count_products = mysqli_num_rows($result_cart_price);

// Calculate total price
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price["product_price"];
        $total_price += $product_price;
    }
}

// Calculate total quantity
$total_quantity = 0;
$get_cart = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$run_cart = mysqli_query($con, $get_cart);
while ($get_item_quantity = mysqli_fetch_array($run_cart)) {
    $quantity = $get_item_quantity['quantity'];
    $total_quantity += $quantity;
}

// Calculate subtotal
if ($total_quantity == 0) {
    $total_quantity = 1;
    $subtotal = $total_price;
} else {
    $subtotal = $total_price * $total_quantity;
}

$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Order submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

$insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $total_quantity, '$status')";
$result_pending_orders = mysqli_query($con, $insert_pending_orders);


// delete items from cart
$empty_cart="Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);
