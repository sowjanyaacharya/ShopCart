<?php
 include('../includes/conn.php');
 include('../functions/commonfunc.php');
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title>Admin Registration</title>
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
            <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="Password" id="confirmpassword" name="confirmpassword" placeholder="Enter to Confirm" required class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border=0" name="admin_reg" value = "Register">
                    <p class="small fw-bold mt-2 pt-1">Do you already have an account?<a class = "link-danger" href="admin_login.php">Login</a></p>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['admin_reg']))
{
    $admin_username = $_POST['username'];
    $adminemail = $_POST['email'];
    $adminpassword = $_POST['password'];
    $hashpassword = password_hash($adminpassword,PASSWORD_DEFAULT);
    $confirmpassword = $_POST['confirmpassword'];
    $user_ip = getIPAddress();
    //select query
    $select_query = "select * from admintable where admin_name='$admin_username' or admin_email='$adminemail'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo "<script>alert('adminname or adminemailid already exist')</script>";
    }
    else if($adminpassword!=$confirmpassword)
    {
        echo "<script>alert('password doesnot match')</script>";
    }

    else
    {
    $insert_query = "insert into admintable(admin_name,admin_email,admin_pwd)values('$admin_username','$adminemail','$hashpassword') ";
    $exec_query = mysqli_query($con,$insert_query);
    }
    if($exec_query)
    {
        echo "<script>alert('Registered successfully')</script>";
    }
}
?>
 