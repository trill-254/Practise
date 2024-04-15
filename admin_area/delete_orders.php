<?php
if(isset($_GET['delete_orders'])){
    $delete_orders = $_GET['delete_orders'];

    // Prepare the delete statement
    $delete_query = "DELETE FROM `user_orders` WHERE order_id=?";
    $stmt = mysqli_prepare($con, $delete_query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $delete_orders);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if($result){
        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}

