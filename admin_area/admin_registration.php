<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/connect.php';
include '../functions/common_function.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin registration</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    .img-fluid{
        width: 90%;
        height: 90%;
    }
</style>
<body>
   <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/register.jpeg" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--username field-->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-lable">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="username"/>
                    </div>
                    <!--email field-->
                    <div class="form-outline mb-4">
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email"  required="required" name="email"/>
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <lable for="password" class="form-lable">Password</lable>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="password"/>
                    </div>
                      <!--confirm password field-->
                    <div class="form-outline mb-4">
                        <lable for="conf_user_password" class="form-lable">Confirm password</lable>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register"/>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don`t have an account ?<a href="admin_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password']; // corrected the typo here
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_ip=getIPAddress();

    //select query
    $select_query="Select * from `admin_table` where admin_name='$username' or admin_email='$email'"; // corrected the table name here
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count> 0){
        echo"<script>alert('Username and Email already exist')</script>";
    }elseif($password!=$conf_user_password){ // corrected the variable name here
        echo "<script>alert('Passwords do not match')</script>";
    }
    else {
    //insert_query
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values('$username','$email','$hash_password')"; // corrected the table name here
    $sql_execute=mysqli_query($con, $insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }else{
        die(mysqli_error($con));
    }
}
}
?>

