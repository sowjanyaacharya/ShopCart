<!--including connection here for fetching the brands and categories on the website-->
<?php //cart.php is used to display the cart details here we can perform update and remove the cart items aswell as subtotal also it is going to display
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
    <title>E-COMMERCE cart details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .cartimg
{
width: 50px;
height: 50px;
}
</style>
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
        
      </ul>
     
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
}  //this is to display the login on navbar if the session is not active
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

<!--fourth child for table-->
<div class="container">
    <div class="row">
        <form action="" method="post">
     <table class="table table-bordered text-center">
        <!-- <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody> -->
            <!--php code to display the cart details data-->
            <?php
            global $con;
                $totalprice=0;
                $ip = getIPAddress(); 
                $cartquery = "select * from cartdetails where ip_address='$ip'";
                $result = mysqli_query($con,$cartquery);
                $res_count = mysqli_num_rows($result);
                if($res_count>0)
                {
                 echo "<thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>";
                while($rows=mysqli_fetch_array($result))
                {
                    $products_id = $rows['products_id'];
                    $selectproducts = "select * from products where products_id=$products_id";
                    $result2 = mysqli_query($con,$selectproducts);
                    while($rowsprice=mysqli_fetch_array($result2))
                {
                    $prod_price = array($rowsprice['products_price']);
                    $price_table = $rowsprice['products_price'];
                    $products_title = $rowsprice['products_title'];
                    $products_image1 = $rowsprice['products_image1'];
                    $prod_countprice = array_sum($prod_price);
                    $totalprice += $prod_countprice;

                
                ?>
            <tr>
                <td><?php echo $products_title ?></td>
                <td><img src="./admin_area/product_images/<?php echo $products_image1 ?>" class="cartimg" alt=".."></td>
                <td><input type="text" name="quant" id="quant" class="form-input w-50"></td>
                <?php 
                 $get_ip = getIPAddress(); 
                 if(isset($_POST['update_cart']))
                 {
                    $quantities = $_POST['quant'];
                    $update_carts = "update cartdetails set quantity=$quantities where ip_address='$get_ip'";
                    $result_price=mysqli_query($con,$update_carts);
                    $totalprice = $totalprice*$quantities;
                 }
                 ?>
                <td><?php echo $price_table ?>/-</td><!--for storing an array we make use of []-->
                <td><input type = "checkbox" name="chk[]"  value =" <?php echo $products_id ?>"></td>
                <td><!--<button class="bg-secondary px-2 py-2 mx-3 border-0">Update</button>-->
                <input type="submit" value = "Update Cart" class="bg-secondary px-2 py-2 mx-3 border-0" name="update_cart">
                <input type="submit" value = "Remove" class="bg-secondary px-2 py-2 mx-3 border-0" name="remove_cart"></td>
            </tr>
            <?php }
                }} 
                else
                {
                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                ?>
        </tbody>

     </table>
     <div class="d-flex mb-5">
      <?php
      $ip = getIPAddress(); 
      $cartquery = "select * from cartdetails where ip_address='$ip'";
      $result = mysqli_query($con,$cartquery);
      $res_count = mysqli_num_rows($result);
      if($res_count>0)
      {
        echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$totalprice/-</strong></h4>
        <input type='submit' value = 'Continue Shopping' class='bg-success px-2 py-2 mx-3 border-0' name='Continue_Shopping'>
        <button class='bg-secondary px-2 py-2 mx-3 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Check out</a></button>";
      }
      else
      {
        echo "<input type='submit' value = 'Continue Shopping' class='bg-success px-2 py-2 mx-3 border-0' name='Continue_Shopping'>";
      }
      if(isset($_POST['Continue_Shopping']))
      {
         echo "<script>window.open('index.php','_self')</script>";
      }
      ?>

      

    </div>
</div>
</div>
            </form>
            <?php
            function removecartitem()
            {
                global $con;
                if(isset($_POST['remove_cart']))
                {
                    foreach($_POST['chk'] as $remove_id)
                    {
                        echo $remove_id;
                        $delete_query = "delete from cartdetails where products_id = $remove_id";
                        $delete_price=mysqli_query($con,$delete_query);
                        if($delete_price)
                        {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $removeitem = removecartitem();
            ?>
                            <?php
                            //calling the cart function
                            cart();
                            ?>
                            <!--sidenav bar-->
    <!--seidnavbar-->
                          <!--footer this is the last child-->
                          <?php
    include('./includes/footer.php');
    ?>

    
</body>
</html>