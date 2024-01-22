<?php  //this is the form for payment confirmation if the payment is done the pending order status
     //must be paid and status should display completed
include('../includes/conn.php');
session_start();
if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $select_data = "select * from userorders where order_id=$order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_no'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirms']))
{
    $invoice_numbers = $_POST['invoice_no'];
    $amount=$_POST['amount_due'];
    $paymentmode=$_POST['payment_mode'];
    $insert_query="insert into userpayments(order_id,invoice_no,amount,paymentmode)values($order_id,$invoice_numbers,$amount,'$paymentmode')";
    $run_insert = mysqli_query($con,$insert_query);
    if($run_insert)
    {
       echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
       echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update userorders set order_status='Complete' where order_id=$order_id";
    $exec_query=mysqli_query($con,$update_orders);
}

if(isset($_POST['email']))
{
   // $useremail = $_POST['emails'];
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                                 // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail';                 // SMTP username
$mail->Password = 'pwd';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('fromaddress', 'Fromname');
//$mail->addAddress('sowjiacharya@gmail.com', 'Joe User');    // Add a recipient
$mail->addAddress('toemailaddress', 'toname'); 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation Of Product';
$mail->Body    = 'This is the confirmation of payment of your product....Have a Happiee Shopping ';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-success">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <form action = " " method ="POST">
    <div class="container my-5">
      <div class="form-outline my-3 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo $invoice_number ?>" >
       </div>
        <div class="form-outline my-3 text-center w-50 m-auto">
        <label for="" class="text-light">Amount</label>
        <input type="text" class="form-control w-50 m-auto" name="amount_due" value="<?php echo $amount_due ?>">
        </div>
        <div class="form-outline my-3 text-center w-50 m-auto">
        <select name="payment_mode">
            <option>Select Payment Mode</option>
            <option>UPI</option>
            <option>NetBanking</option>
            <option>PayPal</option>
            <option>CashOnDelivery</option></select>
        </div>
        <div class="form-outline my-3 text-center w-50 m-auto">
            <!--<button type="submit" onclick="sendEmail()" name="confirms" class="py-2 px-3 border-0">Confirm</button>-->
        <input type="submit" class="py-2 px-3 border-0" value="confirm" name="confirms">
        <input type = "submit" class= "py-2 px-3 border=0" value = "Email" name="email">
        </div>
    </div>
</body>
</html>

