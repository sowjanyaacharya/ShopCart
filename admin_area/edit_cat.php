<!--this is the page to display the editing of the categories in the admin side-->
<?php
if(isset($_GET['edit_cat']))
{
    $edit_cid = $_GET['edit_cat'];
    $queryeditcat = "select * from categories where category_id = $edit_cid";
    $querycatrun = mysqli_query($con,$queryeditcat);
    $row_fetch_cat=mysqli_fetch_assoc($querycatrun);
    $category_id = $row_fetch_cat['category_id'];
    $category_title = $row_fetch_cat['category_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Categories</h1>
    <form action="" method="POST">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="cat_tit" class="form-label">Category Title</label>
        <input type="text" id="cat_title" name="cat_title" value="<?php echo $category_title; ?>" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_category" value="Update category" class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>
<!--for updating-->
<?php
if(isset($_POST['edit_category']))
{
    $categories_title = $_POST['cat_title'];
        //query to update the 
        $update_cat = "update categories set category_title = '$categories_title' where category_id = $edit_cid";
        $result_update_cat = mysqli_query($con,$update_cat);
        if($result_update_cat)
        {
            echo "<script>alert('product updated successfully')</script>";
            echo "<script>window.open('./view_products.php','_self')<script>";
        }
}
?>