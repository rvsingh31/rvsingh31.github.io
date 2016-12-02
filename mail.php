<?php

$msg = $_POST["message"];
$name=$_POST["name"];
$email=$_POST["email"];

if($msg=="" || $name=="" || $email=="")
{
	header("location:index.html?msg=All Fields are necessary!");
	exit;
}

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
session_start();             // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ownerofmysite@gmail.com';                 // SMTP username
$mail->Password = 'splitwise';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('ownerofmysite@gmail.com');
$mail->addAddress("ravindersingh3104.rs@gmail.com");               // Name is optional
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Message from ravinder-singh.me';
$mail->Body    = "Response from a person: ".$name."<br/>"."Email:".$email."<br/>"."Message:".$message;
$mail->AltBody = '';

if(!$mail->send()) {
    $msg= 'Error sending your response, Sorry !';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg='Thank You.You\'ll be responded soon !';
}

header("location:index.html?msg=".$msg);
?>
