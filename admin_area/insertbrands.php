<?php    //this is the php code to insert the brands to the database
include('../includes/conn.php');   /*including the connections*/
if(isset($_POST['insert_brand']))  /*checking if the button is insert_cat then it inserts the values*/
{
  $brand_titles = $_POST['brand_title'];   /*storing the values of insert textbox in new variable*/
//to display the category
  $select_query = "select * from brands where brands_category = '$brand_titles'";
  $query2 = mysqli_query($con,$select_query);
  $num1 = mysqli_num_rows($query2);
  if($num1>0)
  {
    echo "<script>alert('This brand is already present')</script>";
  }
  else{
    /*it is insert query*/
    $insert_query = "insert into brands(brands_category) values ('$brand_titles')";  
    $query1 = mysqli_query($con,$insert_query); /*it is used to connect the con and query*/
    if($query1)
    {
      echo "<script>alert('Brands Inserted Successfully')</script>";  /*if query is executed it is going to execute*/
    }
  }  
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action = "" method = "POST" class = "mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert a Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">

<input type="submit" class="bg-success p-2 my-3 border-0" name = "insert_brand" value="Insert Brands">
</div>
</form>