<?php
include('includes/conn.php');
/*simple api customised*/
$brand = array();
if($con)
{
    $sql = "select * from brands";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("content-Type: JSON");
        $i =0;
    while($rows = mysqli_fetch_assoc($result))
    { 
         $brand[$i]['id'] = $rows['brands_id'];
         $brand[$i]['category'] = $rows['brands_category'];
         $i++;
    }
     echo json_encode($brand,JSON_PRETTY_PRINT);
   }
}
?>