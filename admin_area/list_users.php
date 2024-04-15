<h3 class="text-center text-success">All users</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info text-center">
        <?php
        $get_orders="Select * from `user_table`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        echo "<tr>
            <th>S1 no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    
    <tbody class='table-secondary text-light text-center'>";
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
    }else{
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_email=$row['user_email'];
            $user_address=$row['user_address'];
            $user_mobile=$row['user_mobile'];
            
            $number++;

        echo " <tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td>$user_address</td>
            <td>$user_mobile</td>";
            ?>
            <td><a href='index.php?delete_users=<?php echo $user_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        }
        ?>
    </tbody>
</table>
