<!--this is the user login page where if the user is not logged in means user can login in 2 ways as in the index.php or
 from the checkout.php the session checks whether the particular user has been logged in or not if not means the user must 
login if he is a new user means he should register it-->
<?php
include('../includes/conn.php');
 include('../functions/commonfunc.php');
 @session_start();  //if this page is active means session will start
 ?>
 <!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        body
        {
            overflow-x: Hidden;   /*x axis horizontal scroll bar has been hidden*/
        }
        </style>
</head>
<body>
<div class="container-fluid my-3"> <!--my means margin top and bottom  and mb means margin bottom and d-flex to form in a fexible-->
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action ="" method="post">
                <!--username field-->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!--password field-->
                <div class="form-outline mb-4">
                    <label for="userpassword" class="form-label">Password</label>
                    <input type="password" id="userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="userpassword"/>
                </div>
                <a href = "userlogin.php" class="text-success">Forgot password</a>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-success px-3 py-3 border-0" name="userregister">
                </div>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href = "userregister.php" class="text-danger"> Register</a></p>
                
</form>
        </div>
    </div>
</div>

</body>
</html>
<?php
if(isset($_POST['userregister']))
{
   $user_username =  $_POST['user_username'];
   $userpassword =  $_POST['userpassword'];
   //this for verifing the password matches the databse hashed paswrd
   $select_query = "select * from usertable where user_name = '$user_username'";
   $result = mysqli_query($con,$select_query);
   $row_count = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);
   $user_ip = getIPAddress();
   //cart item after login it should display the cart items of that particular ip
   $select_query_cart = "select * from cartdetails where ip_address = '$user_ip'";
   $select_cart = mysqli_query($con,$select_query_cart);
   $row_count_cart = mysqli_num_rows($select_cart);
   if($row_count>0)
   {
    $_SESSION['username']=$user_username;
        if(password_verify($userpassword,$row_data['user_password']))
        {
           // echo "<script>alert('You have logged in successfully')</script>";
           //now here it checks for after user logging in then rowcount==1 and cartitem==0 means it should redirect for profile.php
           if($row_count==1 and $row_count_cart==0)
           {
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
           }else{
            $_SESSION['username']=$user_username;
            //if this else attched if condition is false maans it should redirect tothe payment page
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
           }
        }
        else{
            echo "<script>alert('Invalid credintials')</script>";
        }
   }
   else{
    echo "<script>alert('Invalid credintials')</script>";
   }
   
}
?>