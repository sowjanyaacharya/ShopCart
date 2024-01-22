<!--This is the file to delete the user account in profile.php-->
  <h3 class="text-danger mb-4">Delete Account</h3>
  <form action = "" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
    </div>
</form>
<?php
$username_Session=$_SESSION['username'];
if(isset($_POST['delete']))
{
    echo "<script>alert('Are You Sure')</script>";
    $delete_query = "delete from usertable where user_name='$username_Session'";
    $result = mysqli_query($con,$delete_query);
    if($result)
    {
        session_destroy();
        echo "<script>alert('User account successfully deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete']))
{
    echo "<script>window.open('profile.php','_self')</script>";

}
