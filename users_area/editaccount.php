<!--This is the file which displays the edit account details inside the profile.php-->
<?php
if(isset($_GET['edit_account']))
{
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from usertable where user_name='$user_session_name'";
    $result_query = mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile= $row_fetch['user_mobile'];
}
/*if the data is found means updating the data*/
    if(isset($_POST['user_update']))
    {
        $update_id = $user_id;
        $update_name=$_POST['username'];  //$_post means fetching the data from the database
        $update_email=$_POST['useremail'];
        $update_address=$_POST['useradd'];
        $update_mobile=$_POST['usermob'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        //upadte the data
        $update_data = "update usertable set user_name='$update_name',user_email='$update_email',user_image='$user_image',user_address='$update_address',user_mobile='$update_mobile' where user_id = $update_id";
        $result_query_update = mysqli_query($con,$update_data);
        if($result_query_update)
        {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('userlogout.php','_self')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" class = "form-control w-50 m-auto" value = "<?php echo $user_name?>" name="username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class = "form-control w-50 m-auto" value = "<?php echo $user_email ?>" name="useremail">
   </div>
   <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class = "form-control m-auto" name="user_image">
        <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_img"><!--image is loaded from the profile.php-->
    </div>
    <div class="form-outline mb-4">
        <input type="text" class = "form-control w-50 m-auto" value="<?php  echo $user_address ?>" name="useradd">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class = "form-control w-50 m-auto" value="<?php  echo $user_mobile ?>" name="usermob">
    </div>
    <input type="submit" value="update" class="bg-info py-2 px-3 border-0" name="user_update">
</form>
</body>
</html>