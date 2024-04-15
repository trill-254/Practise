<?php
include '../includes/connect.php';
include '../functions/common_function.php';
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{
        overflow-x: hidden;
    }
</style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/log.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                    
                    <!--password field-->
                    <div class="form-outline mb-4">
                        <lable for="user_password" class="form-lable">Password</lable>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login"/>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="admin_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
   $user_username=$_POST['user_username'];
   $user_password=$_POST['user_password'];
   
   $select_query= "Select * from `admin_table` where admin_name='$user_username'";
   $result=mysqli_query($con,$select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);

            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
?>