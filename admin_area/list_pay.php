<!--this is the page to display all the payments-->
<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead>
        <?php 
            $get_pays = "select * from userpayments";
            $result_pays = mysqli_query($con,$get_pays);
            $row_counts = mysqli_num_rows($result_pays);
            ?>
            <tr>
            <th>SL.No</th>
            <th>Invoice Number</th>
            <th>Due Amount</th>
            <th>paymentmode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if($row_counts == 0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No Payments Recieved Yet</h2>";
    }
    else
    {
        $numb=0;
        while($row_dataa = mysqli_fetch_assoc($result_pays))
        {
            $order_id = $row_dataa['order_id'];
            $payment_id = $row_dataa['payment_id'];
            $amount = $row_dataa['amount'];
            $invoice_no = $row_dataa['invoice_no'];
            $payment_mode = $row_dataa['paymentmode'];
            $order_date = $row_dataa['date'];
            $numb++;
            ?>
           <tr>
            <td><?php echo $numb; ?></td>
            <td><?php echo $invoice_no; ?></td>
            <td><?php echo $amount ; ?></td>
            <td><?php echo $payment_mode; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><a href="index.php?delete_pay=<?php echo $payment_id; ?>" class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
           <?php
        }
    }
     ?>   
</tbody>
</table>