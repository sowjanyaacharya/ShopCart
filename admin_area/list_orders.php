<!--this is the page to display all the orders-->
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead>
        <?php 
            $get_orders = "select * from userorders";
            $result_orders = mysqli_query($con,$get_orders);
            $row_count = mysqli_num_rows($result_orders);
            ?>
            <tr>
            <th>SL.No</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if($row_count == 0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
    }
    else
    {
        $number=0;
        while($row_data = mysqli_fetch_assoc($result_orders))
        {
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_no = $row_data['invoice_no'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            ?>
           <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $amount_due; ?></td>
            <td><?php echo $invoice_no ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $order_status ?></td>
            <td><a href="index.php?delete_order=<?php echo $order_id; ?>" class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
           <?php
        }
    }
     ?>   
</tbody>
</table>