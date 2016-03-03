<?php

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

//Validate first
if(empty($message)||empty($visitor_email)||empty($first_name)||empty($last_name))
{
    echo "Name, email, and feedback are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email! Please try again!";
    exit;
}

$email_from = $visitor_email;//<== update the email address
$email_subject = "Lemongrass Feedback Form Submission from $first_name $last_name";
$email_body = "You have received a new message from the user $first_name $last_name at $visitor_email.\n\n".
    "Here is the message:\n $message\n\n".

$to = "emyew2@gmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
