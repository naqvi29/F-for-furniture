<?php

if (isset($_POST['username'])) {

    include('connect.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con-pass'];


    $showerror = '';
    $success = '';
    $username_error = '';
    $email_error = '';
    $pass_error = '';
    $con_pass_error = '';

    if (empty($username)) {
        $username_error = "please enter a username";
    }
    if (empty($email)) {
        $email_error = "please enter an email";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Email is not valid";
        }
    }
    if (empty($pass)) {
        $pass_error = "Please create a password";
    } elseif (strlen($pass) < 8) {
        $pass_error = 'Password is too short';
    } elseif (strlen($pass) > 20) {
        $pass_error = 'Password is too long!';
    } elseif (!preg_match("@[0-9]@", $pass)) {
        $pass_error = 'Password must include at least one number';
    } elseif (!preg_match("#[a-z]+#", $pass)) {
        $pass_error = 'Password must include at least one letter';
    } elseif (!preg_match("#[A-Z]+#", $pass)) {
        $pass_error = 'Password must include one uppercase letter';
    } elseif (!preg_match("#[^\w]#", $pass)) {
        $pass_error = 'Password must include at least one symbol';
    }
    if (empty($con_pass)) {
        $con_pass_error = "Please confirm your password";
    }
    if ($username_error == '' && $email_error == '' && $pass_error == '' && $con_pass_error == '') {


        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string(md5($_POST['pass']));
        $con_pass = $conn->real_escape_string(md5($_POST['con-pass']));

        // Checking For Existing Account

        $chk_user_query = "SELECT * FROM `users` WHERE user_email = '$email'";
        $query_result = mysqli_query($conn, $chk_user_query);
        $num_rows = mysqli_num_rows($query_result);
        if ($num_rows > 0) {
            $email_error = "This Email is already registered";
        } else {
            
            // Password Matching

            if ($pass === $con_pass) {
                $query = "INSERT INTO users (user_name, user_email, user_password) 
                  VALUES ('$username','$email','$pass')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    $success = 'Your account is created click ok to login';
                }
            } else {
                $con_pass_error = "Passwords do not match";
            }
        }
    }
    $output = array(
        'success'       => $success,
		'username_error'	=>	$username_error,
		'email_error'	=>	$email_error,
		'pass_error'	=>	$pass_error,
		'con_pass_error'	=>	$con_pass_error,
	);

	echo json_encode($output);
}
?>