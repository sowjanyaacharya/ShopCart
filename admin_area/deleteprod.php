<!--this is the page to delete the products in the admin side-->
<?php
if(isset($_GET['delete_prod']))
{
    $delete_id = $_GET['delete_prod'];
    $query4 = "delete from products where products_id = '$delete_id'";
    $queryrun = mysqli_query($con,$query4);
    if($queryrun)
    {
        echo "<script>alert('Successfully deleted')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
?>