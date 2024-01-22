<?php  //this is the php code to insert the categories to the database
include('../includes/conn.php');   /*including the connections*/
if(isset($_POST['insert_cat']))  /*checking if the button is insert_cat then it inserts the values*/
{
  $cat_titles = $_POST['cat_title'];   /*storing the values of insert textbox in new variable*/
//to display the category
  $select_query = "select * from categories where category_title = '$cat_titles'";
  $query2 = mysqli_query($con,$select_query);
  $num1 = mysqli_num_rows($query2);
  if($num1>0)
  {
    echo "<script>alert('This category is already present')</script>";
  }
  else{
    /*it is insert query*/
    $insert_query = "insert into categories(category_title) values ('$cat_titles')";  
    $query1 = mysqli_query($con,$insert_query); /*it is used to connect the con and query*/
    if($query1)
    {
      echo "<script>alert('Category Inserted Successfully')</script>";  /*if query is executed it is going to execute*/
    }
  }  
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action = "" method = "POST" class = "mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert a Category" aria-label="categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-success border-0 p-2 my-3" name="insert_cat"  value="Insert Category">


</div>
</form>