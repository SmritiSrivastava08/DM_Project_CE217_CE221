<?php
$to=$_REQUEST['email'];
$subject = "OTP";
$otp=rand(111111,999999);
$message = "This is a OTP for password recovery: ".$otp;

$headers  = 'From:dreamjobisyours@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
mail($to, $subject, $message, $headers)
?>