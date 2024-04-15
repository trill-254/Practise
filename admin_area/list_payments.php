<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info text-center">
        <?php
        $get_payments="Select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        echo "<tr>
            <th>S1 no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    
    <tbody class='table-secondary text-light text-center'>";
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
    }else{
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $order_id=$row['order_id'];
            $amount=$row['amount'];
            $invoice_number=$row['invoice_number'];
            $payment_mode=$row['payment_mode'];
            $date=$row['date'];
            $number++;

        echo " <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>";
            ?>
            <td><a href='index.php?delete_payments=<?php echo $order_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        }
        ?>
    </tbody>
</table>
