<!--this payment.php is going to display if the user has loggedin
and the credentials matches also the items in the cart is there means only-->

<?php
include('../includes/conn.php');
 include('../functions/commonfunc.php');
 ?>
 <!DOCTYPE html>
<head>
<title>Payment Page</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        .imges
        {
         width: 90%;
         margin: auto;
         display: block;
        }
        </style>
</head>
<body>
    <?php  //this is the php code for accessing the users
    $user_ip = getIPAddress();
    $get_user = "select * from usertable where user_ip = '$user_ip'";
    $query1 = mysqli_query($con,$get_user);
    $run_query = mysqli_fetch_array($query1);
    $user_id = $run_query['user_id'];
    
    
    
    ?>
<div class="container">
    <h3 class="text-center text-success">Payment Options</h3>
    <div class="row d-flex justify-content-center align-items-center my-5"><!--d-flex justify-content-center align-items-center it isused for aligning the payment offline into the middle -->
        <div class="col-md-6">
        <a href="https://www.paypal.com"><img src = "../images/upi.jpg" target="_blank" alt = "" class="imges"></a><!--if we use target="_blank" means it will open in the new tab-->
    </div>
    <div class="col-md-6">
        <a href="orders.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Payment Offline</h2></a><!--if we use target="_blank" means it will open in the new tab-->
    </div>
    </div>
</div>

</body>
</html>