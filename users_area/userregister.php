<!--this is the user regstration form which comes after adding teh items to the cart from the 
checkout button it checks if the session is set means it redirects directly to the payment option else login page if login credentials
 are not there means they must register from this page-->
 <?php
 include('../includes/conn.php');
 include('../functions/commonfunc.php');
 ?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</head>
<body>
<div class="container-fluid my-3"> <!--my means margin top and bottom  and mb means margin bottom and d-flex to form in a fexible-->
    <h2 class="text-center">New Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action ="" method="post" enctype="multipart/form-data">
                <!--username field-->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                 <!--useremail field-->
                <div class="form-outline mb-4">
                    <label for="useremail" class="form-label">User Email</label>
                    <input type="email" id="useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="useremail"/>
                </div>
                 <!--userimage field-->
                <div class="form-outline mb-4">
                    <label for="userimage" class="form-label">User Image</label>
                    <input type="file" id="userimage" class="form-control" name="userimage"/>
                </div>
                <!--password field-->
                <div class="form-outline mb-4">
                    <label for="userpassword" class="form-label">Password</label>
                    <input type="password" id="userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="userpassword"/>
                </div>
                 <!--confirmpassword field-->
                 <div class="form-outline mb-4">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmpassword" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="confirmpassword"/>
                </div>
                <!--useraddress field-->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">User Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                </div>
                <!--contact field-->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">User Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-success px-3 py-3 border-0" name="userregister">
                </div>
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href = "userlogin.php" class="text-danger"> Login</a></p>
                
</form>
        </div>
    </div>
</div>

</body>
</html>
<!--php code starts from here--if particular button is clicked only data should be inserted-->
<?php
if(isset($_POST['userregister']))
{
    $user_username = $_POST['user_username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];
    $hashpassword = password_hash($userpassword,PASSWORD_DEFAULT);
    $confirmpassword = $_POST['confirmpassword'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $userimage = $_FILES['userimage']['name'];
    $userimage_tmp = $_FILES['userimage']['tmp_name'];
    $user_ip = getIPAddress();
    //select query
    $select_query = "select * from usertable where user_name='$user_username' or user_email='$useremail'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo "<script>alert('username or emailid already exist')</script>";
    }
    else if($userpassword!=$confirmpassword)
    {
        echo "<script>alert('password doesnot match')</script>";
    }

    else
    {
    //insert query
    move_uploaded_file($userimage_tmp,"./user_images/$userimage");
    $insert_query = "insert into usertable(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile)values('$user_username','$useremail','$hashpassword','$userimage','$user_ip','$user_address','$user_contact') ";
    $exec_query = mysqli_query($con,$insert_query);
    }
 //selecting cart items after inserting the data into the database even though the user is not logged in means he can add the items to the cart
 $select_cart_items = "select * from cartdetails where ip_address='$user_ip'";   
 $select1_cart = mysqli_query($con,$select_cart_items);
 $rows_count1 = mysqli_num_rows($select1_cart);
 if($rows_count1>0)
 {
    $_SESSION['username']=$user_username;   //this particular user become active
    echo "<script>alert('you have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";   //self is used to open in the same tab
 }
 else
 {
    echo "<script>window.open('../index.php','_self')</script>";
 }

}
?>