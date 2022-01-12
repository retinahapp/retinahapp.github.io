<?php 
$errors = '';
$myemail = 'info@retinahapp.com';//<-----Put Your email address here.
if(empty($_POST['iname'])  || 
   empty($_POST['iemail']) ||
   empty($_POST['iphone']) ||
   empty($_POST['iselect']) || 
   empty($_POST['imssg']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['iname']; 
$email_address = $_POST['iemail'];
$phone = $_POST['iphone']; 
$select = $_POST['iselect'];
$message = $_POST['imssg']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Inquiry form submission: $name";
	$email_body = "You have received a new inquiry. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n TelNo: $phone \n Solution: $select \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Inquiry form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>