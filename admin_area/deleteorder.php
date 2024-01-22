<!--this is the page to delete the order in the admin side-->
<?php
if(isset($_GET['delete_order']))
{
    $delete_order_id = $_GET['delete_order'];
    $query_del = "delete from userorders where order_id = '$delete_order_id'";
    $querydelrun = mysqli_query($con,$query_del);
    if($querydelrun)
    {
        echo "<script>alert('Orders Successfully deleted')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
?>