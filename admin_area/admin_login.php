<?php
include('../includes/conn.php');
 include('../functions/commonfunc.php');
 @session_start();  //if this page is active means session will start
 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title>Admin Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
          body 
          {
             overflow: hidden;  /* scrolling both side overflow-x means horizontal.. display flex means sideby side*/
          }
        </style>
    </head>
    <body>
        <div class="container-fluid m-3">
            <h2 class="text-center mb-5">Admin Login</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <img src = "../images/logo.jpg" alt="admin registration" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-5">
                   <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Name" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" required class="form-control">
                    </div>
                    <a class = "link-success small fw-bold mt-2 pt-1 mb-2 pb-1">Forgot Password</a>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border=0" name="admin_log" value = "Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account?<a class = "link-danger" href="admin_reg.php">Register</a></p>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['admin_log']))
{
   $adminname =  $_POST['username'];
   $adminpassword =  $_POST['password'];
   //this for verifing the password matches the databse hashed paswrd
   $select_query = "select * from admintable where admin_name = '$adminname'";
   $result = mysqli_query($con,$select_query);
   $row_count = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);
   $user_ip = getIPAddress();
   if($row_count>0)
   {
        $_SESSION['adminname']=$adminname;
        if(password_verify($adminpassword,$row_data['admin_pwd']))
        {
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
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