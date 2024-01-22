<?php   //this is the php code to insert the products to the databse
include('../includes/conn.php');
if(isset($_POST['insert_products']))
{
    $products_title = $_POST['products_title'];
    $products_description = $_POST['products_description'];
    $products_keyword = $_POST['products_keyword'];
    $products_categories = $_POST['products_categories'];
    //echo $products_categories;
    $products_brands = $_POST['products_brands'];
    //echo $products_brands;
    $products_price = $_POST['products_price'];
   // echo $products_price ;
    $products_status = 'true';
    //accessing images
    $products_image1 = $_FILES['products_image1']['name'];
    $products_image2 = $_FILES['products_image2']['name'];
    $products_image3 = $_FILES['products_image3']['name'];
    //accessing temp_names
    $temp_image1 = $_FILES['products_image1']['tmp_name'];
    $temp_image2 = $_FILES['products_image2']['tmp_name'];
    $temp_image3 = $_FILES['products_image3']['tmp_name'];

    //checking the conditions for empty
    if( $products_title == '' or $products_description == '' or $products_keyword == '' or  $products_categories == '' or $products_brands == '' or $products_price == '' or $products_image1 == '' or  $products_image2 == '' or $products_image3 == '')
    {
        echo "<script>alert('Please fill all the available fields');</script>";
        exit();
    }
    else
    { //moving the uploaded images into the product images folder
        move_uploaded_file($temp_image1,"./product_images/$products_image1");
        move_uploaded_file($temp_image2,"./product_images/$products_image2");
        move_uploaded_file($temp_image3,"./product_images/$products_image3");
    }
    //insert query
    $select_query = "insert into products(products_title,products_description,products_keywords,category_id,brands_id,products_image1,products_image2,products_image3,products_price,date,status)values('$products_title','$products_description','$products_keyword','$products_categories','$products_brands','$products_image1','$products_image2','$products_image3','$products_price',NOW(),'$products_status')";
    $query_run = mysqli_query($con,$select_query);
    if($query_run)
    {
    echo "<script>alert('successfully inserted');</script>";
    }
}
?>
<!DOCTYPE html>  <!--html boiler plate-->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Insert products admin dashboard</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--bootstrap link and css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!--font awesome link and css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel = "stylesheet" href = "../style.css">
</head>
<body class = "bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form which is used to insert the products to the database-->
        <form action = " " method = "POST" enctype="multipart/form-data">  <!-- it is used encytpe to insert the images-->
        <!--title-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_title" class="form-label">Product Title</label>
                <input type="text" name="products_title" id="products_title" class = "form-control" placeholder = "Enter product title" autocomplete="off" required="required">
            </div>
            <!--products_description-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_description" class="form-label">Product Description</label>
                <input type="text" name="products_description" id="products_description" class = "form-control" placeholder = "Enter product decsription" autocomplete="off" required>
            </div>
            <!--products_keyword-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="products_keyword" id="products_keyword" class = "form-control" placeholder = "Enter product keyword" autocomplete="off" required>
            </div>
            <!--categories-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <select name="products_categories" id = " " class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_cat = "select * from categories";
                    $query5 = mysqli_query($con,$select_cat);
                    while($row = mysqli_fetch_assoc($query5))
                    {
                      $category_title = $row['category_title'];
                      $category_id = $row['category_id'];
                     //echo "Category Title: $category_title, Category ID: $category_id<br>";
                      echo "<option value='$category_id'> $category_title </option>";
                    }
                    ?>
                </select>
            </div>
            <!--Brands-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <select name="products_brands" id = " " class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_brand = "select * from brands";
                    $query7 = mysqli_query($con,$select_brand);
                    while($row = mysqli_fetch_assoc($query7))
                    {
                      $brands_category = $row['brands_category'];
                      $brands_id = $row['brands_id'];
                      echo "<option value='$brands_id'> $brands_category</option> ";
                    }
                    ?>
                   
                </select>
            </div>
             <!--products_image1-->
             <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_image1" class="form-label">Products Image 1</label>
                <input type="file" name="products_image1" id="products_image1" class = "form-control"  required="required">
            </div>
            <!--products_image2-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_image2" class="form-label">Products Image 2</label>
                <input type="file" name="products_image2" id="products_image2" class = "form-control"  required="required">
            </div>
             <!--products_image3-->
             <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_image3" class="form-label">Products Image 3</label>
                <input type="file" name="products_image3" id="products_image3" class = "form-control"  required="required">
            </div>
            <!--product price-->
            <div class="form-outline mb-5 w-50 m-auto ">
                <label for="products_price" class="form-label">Products Price</label>
                <input type="text" name="products_price" id="products_price" class = "form-control" placeholder = "Enter products_price" autocomplete="off" required>
            </div>
             <!--product price-->
             <div class="form-outline mb-5 w-50 m-auto ">
                <input type="submit" name="insert_products" class = "btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
  
</body>
</html>