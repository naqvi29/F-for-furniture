<?php
session_start();
require('connect.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$company = $_POST['company'];
$country = $_POST['country'];
$street = $_POST['street'];
$apartment = $_POST['apartment'];
$zipcode = $_POST['zip'];
$town = $_POST['town'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pay_method = $_POST['flexRadioDefault'];
$cnum = $_POST['cnum'];
$cname = $_POST['cname'];
$cexp = $_POST['cexp'];
$cvc = $_POST['cvc'];
$amount = $_POST['amount'];
$user_id = $_SESSION['userid'];

$sql = "INSERT INTO `checkouts`(`fname`, `lname`, `company_name`, `country`, `street`, `apartment`, `zip_code`, `town_or_city`, `email_address`, `phone`, `pay_method`, `c_number`, `c_name`, `c_expiry`, `cvc`, `amount`, `costumer_id`) 
VALUES ('$fname','$lname','$company','$country','$street','$apartment','$zipcode','$town','$email','$phone','$pay_method','$cnum','$cname','$cexp','$cvc', '$amount','$user_id')";
$result = mysqli_query($conn, $sql);

use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$email_of_user = $_SESSION['useremail'];
$username_of_customer = $_SESSION['username'];
$subject = "Your order is placed!";
$comment = "Hi  $username_of_customer, Thank you for ordering from Distinctive Bedstore!. We're excited for you to receive your order #140611309029898 and will notify you once it's on its way. If you have ordered from multiple sellers, your items will be delivered in separate packages. We hope you had a great shopping experience! You can check your order status here.";


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "mohammadanis75786@gmail.com";
$mail->Password = "bsusabkewooavyar";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->isHTML(true);
$mail->setFrom("mohammadanis75786@gmail.com");
$mail->addAddress($email_of_user);
$mail->Subject = ($subject);
$mail->Body = $comment;
$mail->send();

$update = "UPDATE cart SET order_status = 'Completed' WHERE user_id = '$user_id'";
$run = mysqli_query($conn, $update);
if (!$run) {
    die(mysqli_error($conn));
}
?>
