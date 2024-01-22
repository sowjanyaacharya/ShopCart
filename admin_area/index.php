<!--this is the page where admin can add the brands and categories and some other viewings and all..-->
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
    <title>Admin_Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
            /* CSS styles for the square box */
           .admin_image
           {
             width: 140px;
             object-fit: contain;
           }
           .footer
           {
            position: absolute;
            bottom: 0;
           }
           body
           {
            overflow-x: hidden;
           }
           .prod_img
           {
            width: 100px;
            object-fit: contain;
           }
           .edit_image
           {
            width: 100px;
            object-fit: contain;
           }
            </style>
  </head>
  <body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--firstchild-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <!--inside adminfolder so .. --><img src = "../images/logo3.png" alt = " " class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar nav text-decoration-none bg-success">
                          <?php //this is to display the login on navbar if the session is not active
if(!isset($_SESSION['adminname']))
{
  echo " <li class = 'nav-item'>
  <a class = 'nav-link' href='#'>WelcomeGuest</a>
</li>";
}
else{
  echo " <li class = 'nav-item'>
  <a class = 'nav-link ' href='#'>Welcome ".$_SESSION['adminname']."</a>
</li>";
}
if(!isset($_SESSION['adminname']))
{
  echo "<li class = 'nav-item'>
  <a class = 'nav-link' href='admin_login.php'>Login</a>
  </li>";
}
else
{
  echo "<li class = 'nav-item'>
  <a class = 'nav-link' href='admin_logout.php'>Logout</a>
  </li>";  
}
?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
      

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Details Maintainence</h3>
        </div>

    <div class="row">
     <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-5">
            <a href="#"><img src="../images/adminlogin.jpg" alt=" " class="admin_image"></a>
            <p class="text-light text-center"><?php echo $_SESSION['adminname']; ?></p>
        </div>
        
        <div class="button text-center"><!--placing of buttons can be done by using emmat ==>button*10>a.nav-link.text-light.bg-success.my(which margintop and bottom)-->
           <!--it directly redirects to the page--> <button class="p-2"><a href="insertproducts.php" class="nav-link text-light bg-success my-1 tex-center">Insert Products</a></button>
            <button class="p-2"><a href="index.php?viewproducts" class="nav-link text-light bg-success my-1">View Products</a></button>
            <button class="p-2"><a href="index.php?insertcategories" class="nav-link text-light bg-success my-1">Insert Categories</a></button><!--this is the get variable which should display on the url-->
            <button class="p-2"><a href="index.php?viewcategories" class="nav-link text-light bg-success my-1">View Categories</a></button>
            <button class="p-2"><a href="index.php?insertbrands" class="nav-link text-light bg-success my-1">Insert Brands</a></button>
            <button class="p-2"><a href="index.php?viewbrands" class="nav-link text-light bg-success my-1">View Brands</a></button>
            <button class="p-2"><a href="index.php?listorders" class="nav-link text-light bg-success my-1">All Orders</a></button>
            <button class="p-2"><a href="index.php?listpayments" class="nav-link text-light bg-success my-1">All Payments</a></button>
            <button class="p-2"><a href="index.php?listusers" class="nav-link text-light bg-success my-1">List Users</a></button>
            <button class="p-2"><a href="admin_logout.php" class="nav-link text-light bg-success my-1">Logout</a></button>
        </div>
     </div>
     </div>
     <!--fourthchild-->
     <!--so here in the url while we click on insert categories it is going to display the url index.php?insert_category so here ith checks in the php code(if isset (insert_category )if yes means it includes insertcategories.php inside the index.php)-->
     <div class="container my-3"> 
        <?php
        if(isset($_GET['insertcategories']))
        {
            include('insertcategories.php');
        }
        if(isset($_GET['insertbrands']))
        {
            include('insertbrands.php');
        }
        if(isset($_GET['viewproducts']))
        {
            include('view_products.php');
        }
        if(isset($_GET['edit_prod']))
        {
            include('edit_prodad.php');
        }
        if(isset($_GET['delete_prod']))
        {
            include('deleteprod.php');
        }
        if(isset($_GET['viewcategories']))
        {
            include('view_categories.php');
        }
        if(isset($_GET['edit_cat']))
        {
            include('edit_cat.php');
        }
        if(isset($_GET['delete_cat']))
        {
            include('deletecat.php');
        }
        if(isset($_GET['viewbrands']))
        {
            include('view_brands.php');
        }
        if(isset($_GET['edit_brands']))
        {
            include('edit_brand.php');
        }
        if(isset($_GET['delete_brands']))
        {
            include('deletebrand.php');
        }
        if(isset($_GET['listorders']))
        {
            include('list_orders.php');
        }
        if(isset($_GET['delete_order']))
        {
            include('deleteorder.php');
        }
        if(isset($_GET['listpayments']))
        {
            include('list_pay.php');
        }
        if(isset($_GET['delete_pay']))
        {
            include('deletepay.php');
        }
        if(isset($_GET['listusers']))
        {
            include('listuser.php');
        }
        if(isset($_GET['delete_user']))
        {
            include('deleteuser.php');
        }


        // if(isset($_GET['insertproducts']))
        // {
        //     include('insertproducts.php');
        // }
        ?>
     </div>
     <?php
    include('../includes/footer.php');
    ?>
     
     </div>
   
   
</body>
</html>