<?php

date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "dinesh99639@gmail.com"; // Your Gmail address.
$mail->Password = "SRI RAMA 8409"; // Your Gmail login password or App Specific Password.


// $reset_mail = $_GET['email'];
$otp = rand()%1000000;

while(true)
{
	if (preg_match('/^\d{6}$/', $otp)) break;
	$otp = rand()%1000000;	
}
// Choose to send either a simple text email...

// ... or send an email with HTML.
//$mail->msgHTML(file_get_contents('contents.html'));
// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
//$mail->AltBody = 'This is a plain-text message body'; 

// Optional: attach a file
// $mail->addAttachment('images/phpmailer_mini.png');

$mail->setFrom('dinesh99639@gmail.com', 'Dinesh'); // Set the sender of the message.
$mail->addAddress('8106313275@vtext.com', ''); // Set the recipient of the message.
$mail->Subject = 'Course Files System'; // The subject of the message.

$mail->Body = "Hello"; // Set a plain text body.

$mail->send();



// } else {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }