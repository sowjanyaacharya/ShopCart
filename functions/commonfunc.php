<?php  //this is the php codes which contains all the functions in the single file
//include('./includes/conn.php');
function getproducts()  //just using fuctions to reduce the code length this function is used to display the products 
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(!isset($_GET['categories']))
    {
        if(!isset($_GET['brand']))
        {

       
    $select_cat1 = "select * from products order by rand() limit 0,5";
    $result_query = mysqli_query($con,$select_cat1);
    while($row=mysqli_fetch_assoc($result_query)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p>  
            <p class='card-text'>Price: $products_price/-</p>
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='productdetails.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
          </div>
      </div>
    </div>
      
 ";
}
}
}
}
//getting all products
function getallproducts()  //just using fuctions to reduce the code length this function is used to display all the products
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(!isset($_GET['categories']))
    {
        if(!isset($_GET['brand']))
        {

       
    $select_cat1 = "select * from products order by rand() limit 0,9";
    $result_query = mysqli_query($con,$select_cat1);
    while($row=mysqli_fetch_assoc($result_query)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p>  
            <p class='card-text'>Price: $products_price/-</p>
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='productdetails.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
          </div>
      </div>
    </div>
      
 ";
}
}
}
}

//getting unique categories
function getuniquecategories()  //just using fuctions to reduce the code length this function is used to get the categorized products retriving through its id
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(isset($_GET['categories']))
    {
        $category_id = $_GET['categories'];
    $select_cat1 = "select * from products where category_id=$category_id ";
    $result_query = mysqli_query($con,$select_cat1);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0)
    {
        echo "<h1 class='text-center text-danger'>Sorry we don't have in the stock!!!</h1>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p> 
            <p class='card-text'>Price: $products_price/-</p> 
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='productdetails.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
          </div>
      </div>
    </div>
      
 ";
}
}
}
//getting unique brands
function getuniquebrands()  //just using fuctions to reduce the code length this function is used to get the categorized brands retriving through its id
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(isset($_GET['brand']))
    {
        $brands_id = $_GET['brand'];
    $select_cat1 = "select * from products where brands_id=$brands_id ";
    $result_query = mysqli_query($con,$select_cat1);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0)
    {
        echo "<h1 class='text-center text-danger'>Sorry we don't have in the stock!!!</h1>";
    }
    
    while($row=mysqli_fetch_assoc($result_query)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p>
            <p class='card-text'>Price: $products_price/-</p>  
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='productdetails.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
          </div>
      </div>
    </div>
      
 ";
}
}
}

function getbrands()  //this function is used to display all the brands on the side nav bar of teh index.php
{  
    global $con;
    $select_brands = "select * from brands";
    $query3 = mysqli_query($con,$select_brands);
    //$result1 = mysqli_fetch_assoc($query3);
    //echo $result1['brands_category'];
    //echo $result1['brands_category'];
    /*it is used to fetch the data from the database all the brands and to display*/
    while($result1 = mysqli_fetch_assoc($query3))
    {
       $brands_category = $result1['brands_category'];
       $brands_id = $result1['brands_id'];
       echo "<li class='nav-item'>
       <a href='index.php?brand=$brands_id' class='nav-link text-light'><h6>$brands_category</h6></a>
     </li>";
    }
}
function getcategories()   //this function is used to display all the categories on the side nav bar of teh index.php
{
    global $con;
    /*it is used to fetch the data from the database all the brands and to display*/
    $select_category = "select * from categories";
    $query4 = mysqli_query($con,$select_category);
    while($result2 = mysqli_fetch_assoc($query4))
    {
      $category_title = $result2['category_title'];
      $category_id = $result2['category_id'];
       echo "<li class='nav-item'>
       <a href='index.php?categories=$category_id' class='nav-link text-light'><h6>$category_title</h6></a>
     </li> ";
    }
}
//searching products
function search_product()   //this function is used to display the typed keyword
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(isset($_GET['searchdataproduct']))
    {
        $searchdatavalue = $_GET['searchdata'];
    $search_query = "select * from products where products_keywords like '%$searchdatavalue%'";
    $result_query1 = mysqli_query($con,$search_query);
    $num_of_rows = mysqli_num_rows($result_query1);
    if($num_of_rows==0)
    {
        echo "<h1 class='text-center text-danger'>No results match found!!!</h1>";
    }
    while($row=mysqli_fetch_assoc($result_query1)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p>  
            <p class='card-text'>Price: $products_price/-</p>
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='productdetails.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
          </div>
      </div>
    </div>
      
 ";
    }
}

}
//view details function displaying the function
function viewdetails()  //this function is used to display all the images of the products in details
{
    global $con; //making con variable as global
    //checking whether the brand and categories are set or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['categories']))
    {
        if(!isset($_GET['brand']))
        {
            $products_id=$_GET['product_id'];
       
    $select_cat1 = "select * from products where products_id ='$products_id'";
    $result_query = mysqli_query($con,$select_cat1);
    while($row=mysqli_fetch_assoc($result_query)){
      $products_id = $row['products_id'];   //no post method means we should fetch it from the coloumn attribute
      $products_title = $row['products_title'];  //if post means form name attribute
      $products_description = $row['products_description'];
      $products_keywords = $row['products_keywords'];
      $products_image1 = $row['products_image1'];
      $products_image2 = $row['products_image2'];
      $products_image3 = $row['products_image3'];
      $products_price = $row['products_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      //displaying the dynamic data
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
          <div class='card-body'>
           <h5 class='card-title'>$products_title</h5>
            <p class='card-text'>$products_description</p>  
            <p class='card-text'>Price: $products_price/-</p>
            <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add to cart</a>
            <a href='index.php' class='btn btn-secondary'>Go Home</a>
          </div>
      </div>
    </div>
    <div class='col-md-8'>
                <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center'>RELATED PRODUCTS</h4>
                </div>
                <div class='class col-md-6'>
                <img src='./admin_area/product_images/$products_image2' class='card-img-top' alt='$products_title'>
              </div>
              <div class='class col-md-6'>
                <img src='./admin_area/product_images/$products_image3' class='card-img-top' alt='$products_title'></div>
              </div>
              </div>
      
 ";
}
}
}
}
}

//get ipaddress function from javatpoint
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
//cart functions for having the cart page
function cart()
{
if(isset($_GET['add_to_cart']))
{
  global $con;
  $ip = getIPAddress(); 
  $getproductid = $_GET['add_to_cart'];
  $select_query5 = "select * from cartdetails where ip_address='$ip' and products_id=$getproductid";
  $result_query7 = mysqli_query($con,$select_query5);
  $num_of_rows = mysqli_num_rows($result_query7);
    if($num_of_rows>0)
    {
        echo "<script>alert('This item is already present inside the cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";  //_self is used to stay in same tab
    }
    else{
      $insertquery = "insert into cartdetails(products_id,ip_address,quantity)values($getproductid,'$ip',0)";
      $result_query7 = mysqli_query($con,$insertquery);
      echo "<script>alert('Item is added to the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>"; 
    }
}
}
//function to get cart item numbers
function cartno()   //this function is used to display the dynamic cart no in the namvbar
{
  if(isset($_GET['add_to_cart']))
{
  global $con;
  $ip = getIPAddress(); 
  $select_query5 = "select * from cartdetails where ip_address='$ip'";
  $result_query7 = mysqli_query($con,$select_query5);
  $countcart = mysqli_num_rows($result_query7);
}
    else{
      global $con;
  $ip = getIPAddress(); 
  $select_query5 = "select * from cartdetails where ip_address='$ip'";
  $result_query7 = mysqli_query($con,$select_query5);
  $countcart = mysqli_num_rows($result_query7);
    }
    echo $countcart;
}
//total price function
function totalcartprice()
{
  global $con;
  $totalprice=0;
  $ip = getIPAddress(); 
  $cartquery = "select * from cartdetails where ip_address='$ip'";
  $result = mysqli_query($con,$cartquery);
  while($rows=mysqli_fetch_array($result))
  {
    $products_id = $rows['products_id'];
    $selectproducts = "select * from products where products_id=$products_id";
    $result2 = mysqli_query($con,$selectproducts);
    while($rowsprice=mysqli_fetch_array($result2))
  {
    $prod_price = array($rowsprice['products_price']);
    $prod_countprice = array_sum($prod_price);
    $totalprice += $prod_countprice;

  }
  }
  echo $totalprice;
}
//get_user_order_details which is used to 
function get_user_order_details()
{
  global $con;
  $username = $_SESSION['username'];
  $get_details = "select * from usertable where user_name = '$username'";
  $result_query = mysqli_query($con,$get_details);
  while($row_query = mysqli_fetch_array($result_query))
  {
     $user_id = $row_query['user_id'];
     //checking if the get variable set or not in the url if not means pending orders are displayed
     if(!isset($_GET['edit_account']))
     {
      if(!isset($_GET['my_orders']))
      {
        if(!isset($_GET['delete_account']))
        {
          $get_orders="select * from userorders where user_id = $user_id and order_status = 'pending'";
          $result_orders_query = mysqli_query($con,$get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0)
          {
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class = 'text-danger'> $row_count </span>Pending orders</h3>
              <p class='text-center'><a href='profile.php?my_orders' class='text-dark' >Order Details</a></p>";
          }
          else //if the pending orders are zero means
          {
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have Zero Pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark' >Explore Products</a></p>";
          }
        }
      }
     }
  }
}
?>