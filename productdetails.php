<!--including connection here for fetching the brands and categories on the website-->
<?php   //it is the php page where we can see in depth about product that is view more button
include('includes/conn.php');
include('functions/commonfunc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-COMMERCE WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
	<!--navbar-->
<div class="container-fluid p-0">
  <!--header which is the first child--> 
    <nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <img src="./images/logo3.png" alt = "" class="logo">   <!--placing of logo-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down" ><sup><?php cartno(); ?></sup></i></a><!--fa solid maens color become bold-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TotalPrice:<?php totalcartprice();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="searchprod.php" method ="get"> <!--d-flex means display flex which is used to display the in the horizontal row-->
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
  <a class = 'nav-link' href='.users_area/userlogin.php'>Login</a>
  </li>";
}
else
{
  echo "<li class = 'nav-item'>
  <a class = 'nav-link' href='.users_area/userlogout.php'>Logout</a>
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
<div class="row px-1">
  <div class="col-md-10">
    <!--products-->
            <div class="row">
              <!--fetching the products-->
              
              <?php
             
             viewdetails();
              getuniquecategories();
              getuniquebrands();

              ?>
              
                <!--<div class="col-md-4 mb-2">
                  <div class="card" >
                    <img src="./images/mango.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                       <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-success">Add to cart</a>
                        <a href="#" class="btn btn-secondary">View more</a>
                      </div>
                  </div>
                </div>-->
                  <!--end of col-->
              </div>
                          
      <!--end of row-->
   </div>

                            <div class="col-md-2 bg-secondary p-0 ">
                              <!--brands to be displayed-->
                              <ul class="navbar-nav me-auto text-center">
                                <li class="nav-item bg-success">
                                  <a href="#" class="nav-link text-light"><h5>Delivery Brands</h5></a>
                                </li>
                                <?php
                               getbrands();
                                ?>
                                
                              
                              </ul>
                              <!--categories to be displayed-->
                              
                              <ul class="navbar-nav me-auto text-center">
                                <li class="nav-item bg-success">
                                  <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
                                </li>
                                <?php 
                                getcategories();
                                ?>
                                
                                
                              </ul>
                            </div>  <!--sidenav bar-->
    <!--seidnavbar-->
                          <!--footer this is the last child-->
                          <?php
    include('./includes/footer.php');
    ?>
</div>
    
</body>
</html>