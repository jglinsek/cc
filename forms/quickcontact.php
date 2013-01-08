<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if ( function_exists( 'get_option_tree') ) {
	$quickcontactemailaddy = get_option_tree( 'email_quickcontact', '', true); 
}

$to = $quickcontactemailaddy; 

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = str_replace(chr(10), "<br>", $_POST['message']);

$body = "<html><head><title>Quick Contact Form Email</title></head><body><br>";
$body .= "Name: <b>" . $name . "</b><br>";
$body .= "Email: <b>" . $email . "</b><br><br>";
$body .= "Message:<br><hr><br><b>" . $message . "</b><br>";
$body .= "<br></body></html>";
	
$subject = 'Quick Contact Form Email from: ' . $name;
$header = "From: $to\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=utf-8\n";

mail($to, $subject, $body, $header);

?>