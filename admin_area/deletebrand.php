<!--this is the page to delete the  brands in the admin side-->
<?php
if(isset($_GET['delete_brands']))
{
    $delete_brand_id = $_GET['delete_brands'];
    $query_brand_del = "delete from brands where brands_id = '$delete_brand_id'";
    $queryrundelbrand = mysqli_query($con,$query_brand_del);
    if($queryrundelbrand)
    {
        echo "<script>alert('Successfully deleted the brands')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
    ?>