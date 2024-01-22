<!--this is the page to delete the  categories in the admin side-->
<?php
if(isset($_GET['delete_cat']))
{
    $delete_cat_id = $_GET['delete_cat'];
    $query_cat_del = "delete from categories where category_id = '$delete_cat_id'";
    $queryrundelcat = mysqli_query($con,$query_cat_del);
    if($queryrundelcat)
    {
        echo "<script>alert('Successfully deleted the category')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
    ?>