<?php  //this is used to make or establish the connections to the database
$con = mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));   /*it wont display the connections made*/
}
// else
// {
//     echo "connected";
// }

?>