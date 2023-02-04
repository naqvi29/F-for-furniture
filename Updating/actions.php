<?php
require('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
    $email =  $_POST['subscription-email'];
    $sql = "SELECT * FROM subscribers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numrows  = mysqli_num_rows($result);
    if ($numrows > 0) {
        $error = "This email is already registered";
    } else {
        $email = $_POST['subscription-email'];
        $comment = "Hello from Distinctive Bedstore";

        $subject = "Subscription";

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

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
        $mail->addAddress($email);
        $mail->Subject = ($subject);
        $mail->Body = $comment;
        $mail->send();

        $email = $_POST['subscription-email'];

        $query = " INSERT INTO subscribers (email) 
            VALUES ('$email')";

        $conn->query($query);
        $conn->close();
    }
    $output = array(
        'error' => $error
    );
    echo json_encode($output);
?>