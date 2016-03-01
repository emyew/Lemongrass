<?php
	if(isset($_POST["submit"])) {
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$message=$_POST['message'];

		$from = 'Lemongrass Contact Form';
		$to = 'emyew2@gmail.com';
		$subject = 'Feedback for Lemongrass';

		$body = "From: $firstName\n Email: $email\n Message:\n $message";


	if (!$_POST['firstName']) {
		$errFirstName = 'Please enter your first name.';
	}

	if (!$_POST['lastName']) {
		$errLastName = 'Please enter your last name.';
	}

	if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    	$errEmail = 'Please enter a valid email address';
	}

	if (!$_POST['message']) {
		$errMessage = 'Please enter your message.';
	}

	if (!$errFirstName && $errLastName && !$errEmail && !$errMessage) {
    	if (@mail ($to, $subject, $body, $from)) {
        	$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    	} else {
        	$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    	}
	}
}
?>
