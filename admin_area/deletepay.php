<!--this is the page to delete the paymnets in the admin side-->
<?php
if(isset($_GET['delete_pay']))
{
    $delete_pay_id = $_GET['delete_pay'];
    $query_del_pay = "delete from userpayments where payment_id = '$delete_pay_id'";
    $querydelpay = mysqli_query($con,$query_del_pay);
    if($querydelpay)
    {
        echo "<script>alert('Payments Successfully deleted')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
?>