<!--this is the user dashboard page this is going to display
only when the user hasbeen logged in through his credentials
and if the items in the cart is zero means dashboard is going
to display-->
<!--including connection here for fetching the brands and categories on the website-->
<?php  
include('../includes/conn.php');
include('../functions/commonfunc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WELCOME <?php echo  $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body
        {
            overflow-x: Hidden;   /*x axis horizontal scroll bar has been hidden*/
        }
        .profile_img
        {
            width: 90%;
            margin: auto;
            display: block;
            height: 100%;
            object-fit: contain;  /*conatin so that image wont be squeezed */
        }
        .edit_img{
          width: 100px;
          height: 100px;
          object-fit: contain;
        }
        </style>
  </head>
  <body>
	<!--navbar-->
<div class="container-fluid p-0">
  <!--header which is the first child--> 
    <nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <img src="../images/logo3.png" alt = "" class="logo">   <!--placing of logo-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-arrow-down"><sup><?php cartno(); ?></sup></i></a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TotalPrice:<?php totalcartprice();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../searchprod.php" method ="get"> <!--d-flex means display flex which is used to display the in the horizontal row-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchdata">
        
        <input type="submit" value ="search" class="btn btn-outline-light" name="searchdataproduct">
      </form>
    </div>
  </div>
</nav>
</div>
<!-- this is the second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
   
<?php //this is to display the login on navbar if the session is not active
if(!isset($_SESSION['username']))
{
  echo " <li class = 'nav-item'>
  <a class = 'nav-link' href='#'>WelcomeGuest</a>
</li>";
}
else{
  echo " <li class = 'nav-item'>
  <a class = 'nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li>";
} //this is to display the login on navbar if the session is not active
if(!isset($_SESSION['username']))
{
  echo "<li class = 'nav-item'>
  <a class = 'nav-link' href='userlogin.php'>Login</a>
  </li>";
}
else
{
  echo "<li class = 'nav-item'>
  <a class = 'nav-link' href='userlogout.php'>Logout</a>
  </li>";  
}
?>
</ul>
</nav>
<!--third child-->
<div class="bg-light">
<h3 class="text-center">Hidden Store</h3>
<p class="text-center">E-commerce is the website where user can make shopping without going out</p></div>

<!--fourth child--> 
<div class="row">
    <div class="col-md-2">
        <ul class = "navbar-nav bg-secondary text-center" style="height: 100vh">
        <li class="nav-item bg-success">
          <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a><!--fa solid maens color become bold-->
        </li>
        <!--dynamic image in the profile.php-->
        <?php
        $username = $_SESSION['username'];
        $user_query = "select * from usertable where user_name = '$username'";
        $user_query = mysqli_query($con,$user_query);
        $row_image = mysqli_fetch_array($user_query);
        $user_image = $row_image['user_image'];
        echo "<li class='nav-item'>
        <img src = './user_images/$user_image' alt='' class='profile_img my-4'>
      </li>";
        ?>
        
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Pending orders</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?my_orders">My orders</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="userlogout.php">Logout</a><!--fa solid maens color become bold-->
        </li>
</ul>
    </div>
        <div class="col-md-10 text-center">
            <?php //getting pending orders
            get_user_order_details(); 
            if(isset($_GET['edit_account']))
            {
              include('editaccount.php');
            }
            if(isset($_GET['my_orders']))
            {
              include('myorders.php');
            }
            if(isset($_GET['delete_account']))
            {
              include('deleteacc.php');
            }

            ?>
        </div>
    
</div>

                          <!--footer this is the last child-->
                          <?php
    include('../includes/footer.php');
    ?>
</div>
    
</body>
</html>