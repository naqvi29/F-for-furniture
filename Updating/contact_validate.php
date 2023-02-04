<?php

if(isset($_POST["fname"]))
{
	include('connect.php');

	$success = '';

	$fname = $_POST["fname"];
    $lname = $_POST["lname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
    $postal = $_POST['postal'];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$fname_error = '';
    $lname_error = '';
	$email_error = '';
	$phone_error = '';
    $postal_error = '';
	$subject_error = '';
	$message_error = '';

	if(empty($fname))
	{
		$fname_error = 'Please enter your first name';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $fname))
		{
			$fname_error = 'Only letters and white space are allowed';
		}
	}

    if(empty($lname))
	{
		$lname_error = 'Please enter your last name';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $lname))
		{
			$lname_error = 'Only letters and white space are allowed';
		}
	}

	if(empty($email))
	{
		$email_error = 'Please enter your email';
	}
	else
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email_error = 'Email is not valid';
		}
	}

	if(empty($phone))
	{
		$phone_error = 'Please enter your contact info';
	}
	else
	{
		if(!preg_match("/^([03]{2}[0-9]{2})[-\s\.]([0-9]{7})$/", $phone))
		{
			$phone_error = 'Enter valid contact number eg: 0312-*******';
		}
	}

    if(empty($postal)){
        $postal_error = 'Please enter your postal code';
    }

	if(empty($subject))
	{
		$subject_error = 'Please enter your subject';
	}

	if(empty($message))
	{
		$message_error = 'Please enter your message';
	}else{
		if(strlen($message) <=20){
			$message_error = 'Minimum 20 characters are allowed';
		}elseif(strlen($message) > 300){
			$message_error = 'Maximum 300 characters are allowed';
		}
	}

	if($fname_error == '' && $lname_error == '' && $email_error == '' && $phone_error == '' && $postal_error == '' &&  $subject_error == '' && $message_error == '')
	{
		//put insert data code here 

		
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $postal = $_POST['postal'];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
		

		$query = "INSERT INTO `contacts`(`First_Name`, `Last_Name`, `C_Email`, `Phone_Number`, `Postal_Code`, `Subject`, `Message`)
        VALUES ('$fname', '$lname', '$email', '$phone', '$postal', '$subject', '$message');";

		$conn->query($query);

		$conn->close();

		$success = "$('#myModal').modal('show');";
	}

	$output = array(
		'success'		=>	$success,
		'fname_error'	=>	$fname_error,
        'lname_error'	=>	$lname_error,
		'email_error'	=>	$email_error,
		'phone_error'	=>	$phone_error,
        'postal_error' => $postal_error,
		'subject_error'	=>	$subject_error,
		'message_error'	=>	$message_error
	);

	echo json_encode($output);
	
}

?>
