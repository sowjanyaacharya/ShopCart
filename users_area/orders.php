<?php
//this is the page for payment offline link and displaying the first items
include('../includes/conn.php');
 include('../functions/commonfunc.php');
 if(isset($_GET['user_id']))
 {
    $user_id = $_GET['user_id'];
    
 }
 //getting total items and total price of all items
 $get_ip_address = getIPAddress(); 
 $total_price = 0;
 //getting the particular product id from using the ip address of the user
 $cart_query_price = "select * from cartdetails where ip_address = '$get_ip_address'";
 $result_cart_price = mysqli_query($con,$cart_query_price);
 //taking the count of the products
 //this is for random number genertaion
 $invoice_no = mt_rand();
 $status = 'pending';
//$row_fetch = mysqli_fetch_assoc($result_cart_price);
//$count_products = $row_fetch['quantity'];
$count_products = mysqli_num_rows($result_cart_price);
 //fetching the details one by one
 while($row_price = mysqli_fetch_array($result_cart_price))
 {
    //then fetching the products id of that particular ip
    $products_id = $row_price['products_id'];
    //then we are fetching the product_id from the products
    $select_product = "select * from products where products_id = $products_id";
    $run_price = mysqli_query($con,$select_product);
    //then we are accessing the products price
    while($row_product_price = mysqli_fetch_array($run_price))
    {
        $products_price = array($row_product_price['products_price']);
        //sum up of the price
        $products_values = array_sum($products_price);
        $total_price += $products_values;
    }
 }

 //getting quantity from cart
 $get_carts = "select * from cartdetails";
 $runcart = mysqli_query($con,$get_carts);
 $get_item_quant = mysqli_fetch_array($runcart);
 //it fetches the quantity no from the cart details table
 $quant = $get_item_quant['quantity'];
 //if quantity is 0 means assings 1
 if($quant == 0)
 {
    $quant=1;
    $subtotal = $total_price;
 }
 else
 {
    //else user assigned quant 2 meanstotaprice*quant will be displayed
    $quant = $quant;
    $subtotal = $total_price*$quant;
 }

 //inserting the items into user_orders table
 $insert_orders = "insert into userorders(user_id,amount_due,invoice_no,total_products,order_date,order_status)values($user_id,$subtotal,$invoice_no,$count_products,NOW(),'$status')";  //now to display the current time
 $result_query = mysqli_query($con,$insert_orders);
 if($result_query)
 {
    echo "<script>alert('Orders are submitted successfuly')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
 }
 
 //order pending
 $insert_pending_orders = "insert into pendingorders(user_id,invoice_no,products_id,quantity,order_status)values($user_id,$invoice_no,$products_id,$quant,'$status')";  //now to display the current time
 $result_pending_query = mysqli_query($con,$insert_pending_orders);
 
 //delete items from cart as the payment is done
 $empty_cart = "delete from cartdetails where ip_address = '$get_ip_address'";
 $result_delete = mysqli_query($con,$empty_cart);
 ?>