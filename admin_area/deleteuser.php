<!--this is the page to delete the user in the admin side-->
<?php
if(isset($_GET['delete_user']))
{
    $delete_userid = $_GET['delete_user'];
    $queryuser = "delete from usertable where user_id = '$delete_userid'";
    $queryrunuser = mysqli_query($con,$queryuser);
    if($queryrunuser)
    {
        echo "<script>alert('User Successfully deleted')</script>";
        echo "<script>window.open('./view_products.php','_self')<script>";
    }
}
?>