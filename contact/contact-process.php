<?php

$address = "info@weld-techengineering.co.uk";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array('name','mail','phone','message' );

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == '' )
		$error = true;
}

if ( !$error ) {

	$name = stripslashes($_POST['name']);
	$mail = stripslashes($_POST['mail']);	
	$phone = stripslashes($_POST['phone']);
	$message = stripslashes($_POST['message']);

	$e_subject = 'You\'ve been contacted by ' . $name . ' via the website.';

	$e_body = "Name: $name" . PHP_EOL;
	$e_body .= "Email: $mail" . PHP_EOL;
	$e_body .= "Phone: $phone" . PHP_EOL . PHP_EOL;
	$e_body .= "Message:" . PHP_EOL . $message . PHP_EOL;

	$msg = wordwrap( $e_body, 70 );

	$headers = "From: $name <$address>" . PHP_EOL;
	$headers .= "Reply-To: $mail" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;

	if(mail($address, $e_subject, $msg, $headers)) {

		// Email has sent successfully, echo a success page.
	
		echo 'Success';

	} else {

		echo 'ERROR!';

	}

}

?>