<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if ( function_exists( 'get_option_tree') ) {
	$contactformemailaddy = get_option_tree( 'email_contactform', '', true); 
}

$to = $contactformemailaddy; 

$name = trim($_POST['name']);
$address = trim($_POST['address']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = str_replace(chr(10), "<br>", $_POST['message']);

$body = "<html><head><title>Contact Form Email</title></head><body><br>";
$body .= "Name: <b>" . $name . "</b><br>";
$body .= "Email: <b>" . $email . "</b><br>";
$body .= "Adress: <b>" . $address . "</b><br>";
$body .= "Phone: <b>" . $phone . "</b><br><br>";
$body .= "Message:<br><hr><br><b>" . $message . "</b><br>";
$body .= "<br></body></html>";
	
$subject = 'Contact Form Email from ' . $name;
$header = "From: $to\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=utf-8\n";

mail($to, $subject, $body, $header);

?>