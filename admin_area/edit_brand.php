<!--this is the page to display the editing of the brands in the admin side-->
<?php
if(isset($_GET['edit_brands']))
{
    $edit_bid = $_GET['edit_brands'];
    $querybrand = "select * from brands where brands_id = $edit_bid";
    $querybrandrun = mysqli_query($con,$querybrand);
    $row_fetch_brand=mysqli_fetch_assoc($querybrandrun);
    $brands_id = $row_fetch_brand['brands_id'];
    $brands_category = $row_fetch_brand['brands_category'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="POST">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="brand_tit" class="form-label">Brands Title</label>
        <input type="text" id="brand_title" name="brand_title" value="<?php echo $brands_category; ?>" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_brand" value="Update Brands" class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>
<!--for updating-->
<?php
if(isset($_POST['edit_brand']))
{
    $brands_category = $_POST['brand_title'];
    if( $brands_category == '' )
    {
        echo "<script>alert('Please fill the available fields');</script>";
    }
    else
        //query to update the 
        $update_brands = "update brands set brands_category = '$brands_category' where brands_id=$brands_id";
        $result_update_brands = mysqli_query($con,$update_brands);
        if($result_update_brands)
        {
            echo "<script>alert('Brands updated successfully')</script>";
            echo "<script>window.open('./view_products.php','_self')<script>";
        }
}
?>