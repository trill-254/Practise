<?php
if(isset($_GET['delete_payments'])){
    $delete_payments = $_GET['delete_payments'];

    // Prepare the delete statement
    $delete_query = "DELETE FROM `user_payments` WHERE order_id=?";
    $stmt = mysqli_prepare($con, $delete_query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $delete_payments);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if($result){
        echo "<script>alert('Payments has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}