<!--This is the file to display the order details in detail of the user-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY Orders</title>
</head>
<body>
<?php
   $username=$_SESSION['username'];
   $get_user="select * from usertable where user_name='$username'";
   $result=mysqli_query($con,$get_user);
   $row_fetch=mysqli_fetch_assoc($result);
   $user_id=$row_fetch['user_id']; 
   //echo $user_id;
   ?>
    <h3 class="text-center text-success mb-4">My Orders</h3>
    <form action="" method="POST">
    <div class="container">
    <table class="table table-bordered mt-5 table-success table-striped-columns">
  <thead>
    <tr>
      <th>#</th>
      <th>Order_Number</th>
      <th>Amount Due</th>
      <th>Total Products</th>
      <th>Invoice_Number</th>
      <th>Date</th>
      <th>Complete/Incomplete</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $get_order_details = "select * from userorders where user_id = $user_id";
  $result_orders = mysqli_query($con,$get_order_details);
  $number=1;
  while($row_data=mysqli_fetch_assoc($result_orders))
  { 
    $order_id=$row_data['order_id'];
    $amount_due=$row_data['amount_due'];
    $total_products=$row_data['total_products'];
    $invoice_no=$row_data['invoice_no'];
    $order_date=$row_data['order_date'];
    $order_status=$row_data['order_status'];
    if($order_status=='pending')
    {
        $order_status='Incomplete';
    }
    else
    {
        $order_status='Complete';
    }
    echo "<tr>
    <td>$number</td>
    <td>$order_id</td>
    <td>$amount_due</td>
    <td>$total_products</td>
    <td>$invoice_no</td>
    <td>$order_date</td>
    <td>$order_status</td>";
    ?>
    <?php
    if($order_status=='Complete')
    {
      echo "<td>Paid</td>";
    }
    else
    {
    echo "<td><a href='confirmpayment.php?order_id=$order_id' class='text-decoration: none'>Confirm</td>
  </tr>";
    }
  $number++;
  }
 
    ?>
    
   
  </tbody>
</table>
    </div>
</form>
</body>
</html>