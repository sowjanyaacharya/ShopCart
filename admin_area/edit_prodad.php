<!--this is the page to display the editing of the products in the admin side-->
<?php
if(isset($_GET['edit_prod']))
{
    $edit_id = $_GET['edit_prod'];
    $query = "select * from products where products_id = '$edit_id'";
    $queryrun = mysqli_query($con,$query);
    $row_fetch=mysqli_fetch_assoc($queryrun);
        $products_id = $row_fetch['products_id'];
        $products_title = $row_fetch['products_title'];
        $products_description = $row_fetch['products_description'];
        $products_keywords = $row_fetch['products_keywords'];
        $products_price = $row_fetch['products_price'];
        $products_image1 = $row_fetch['products_image1'];
        $products_image2 = $row_fetch['products_image2'];
        $products_image3 = $row_fetch['products_image3'];
        $category_id = $row_fetch['category_id'];
        $brand_id = $row_fetch['brands_id'];
        //fetching the brand and category id
        $select_cat = "select * from categories where category_id = $category_id";
        $queryrun2 = mysqli_query($con,$select_cat);
        $row_fetch1=mysqli_fetch_assoc($queryrun2);
        $category_title = $row_fetch1['category_title'];
        //fetching 
        $select_brands = "select * from brands where brands_id = $brand_id";
        $queryrun3 = mysqli_query($con,$select_brands);
        $row_fetch2=mysqli_fetch_assoc($queryrun3);
        $brands_category = $row_fetch2['brands_category'];
}
    ?>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_tit" class="form-label">Product Title</label>
        <input type="text" id="product_title" name="product_title" value="<?php echo $products_title; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
        <input type="text" id="product_description" name="product_description" value="<?php echo $products_description; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="prduct_key" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" name="product_keywords" value="<?php echo $products_keywords; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_cat" class="form-label">Product Category</label>
           <select name="product_category"  class="form-select">
            <option value="<?php echo $category_title;?>"><?php echo $category_title;?></option>
            <?php
            $select_cat_all = "select * from categories";
            $queryrun4 = mysqli_query($con,$select_cat_all);
            while($row_fetch3=mysqli_fetch_assoc($queryrun4))
            {
            $category_title = $row_fetch3['category_title'];
            $category_id = $row_fetch3['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
            };
             ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Product Brands</label>
           <select name="product_brands"  class="form-select">
            <option value="<?php echo $brands_category; ?>"><?php echo $brands_category; ?></option>
            <?php
            $select_brands_all = "select * from brands";
            $queryrun5 = mysqli_query($con,$select_brands_all);
            while($row_fetch4=mysqli_fetch_assoc($queryrun5))
            {
            $brands_category = $row_fetch4['brands_category'];
            $brands_id = $row_fetch4['brands_id'];
            echo "<option value='$brands_id'>$brands_category</option>";
            }
            ?>
           </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="prduct_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
        <input type="file" id="product_image1" name="product_image1"  class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $products_image1 ?>" alt="" class="edit_image">    
    </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="prduct_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
        <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $products_image2 ?>" alt="" class="edit_image">    
    </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="prduct_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
        <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $products_image3 ?>" alt="" class="edit_image">    
    </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_pric" class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" value="<?php echo $products_price; ?>"class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>
<!--for updating-->
<?php
if(isset($_POST['edit_product']))
{
    $products_title = $_POST['product_title'];
    $products_description = $_POST['product_description'];
    $products_keywords = $_POST['product_keywords'];
    $products_category = $_POST['product_category'];
    $products_brands = $_POST['product_brands'];
    $products_price = $_POST['product_price'];
    $products_image1 = $_FILES['product_image1']['name'];
    $products_image2 = $_FILES['product_image2']['name'];
    $products_image3 = $_FILES['product_image3']['name'];
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    if( $products_title == '' or $products_description == '' or $products_keywords == '' or  $products_category == '' or $products_brands == '' or $products_price == '' or $products_image1 == '' or  $products_image2 == '' or $products_image3 == '')
    {
        echo "<script>alert('Please fill all the available fields');</script>";
    }
    else
    { //moving the uploaded images into the product images folder
        move_uploaded_file($temp_image1,"./product_images/$products_image1");
        move_uploaded_file($temp_image2,"./product_images/$products_image2");
        move_uploaded_file($temp_image3,"./product_images/$products_image3");
        //query to update the 
        $update_products = "update products set products_title = '$products_title', products_description = '$products_description', products_keywords = '$products_keywords',category_id= '$products_category',brands_id = '$products_brands',products_image1 = '$products_image1',products_image2 = '$products_image2', products_image3 = '$products_image3',products_price = '$products_price',date=NOW() where products_id = $edit_id";
        $result_update = mysqli_query($con,$update_products);
        if($result_update)
        {
            echo "<script>alert('product updated successfully')</script>";
            echo "<script>window.open('./view_products.php','_self')<script>";
        }
    }
}
?>
