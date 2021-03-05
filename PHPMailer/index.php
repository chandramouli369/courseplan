<?php

date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.

// You should enable "Less secure apps for your mail account"
// Create file mail_credentials.php and include the below two lines
$mail->Username = ""; // Your Gmail address.
$mail->Password = ""; // Your Gmail login password or App Specific Password. 
require 'mail_credentials.php';

$reset_mail = $_GET['email'];
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

require("../db.php");

$qry = "SELECT * from users where email='$reset_mail' ";
$res = mysqli_query($db, $qry);
if ($res)
{
	$data = mysqli_fetch_assoc($res);



	$mail->setFrom('dinesh99639@gmail.com', 'Dinesh'); // Set the sender of the message.
	$mail->addAddress($reset_mail, ''); // Set the recipient of the message.
	$mail->Subject = 'Course Files System'; // The subject of the message.

	$mail->Body = "Hi ".$data['name'].",\n\nAs you have requested for reset password instructions\nYour One Time Password (OTP) for Course Files System is ".$otp.".\n\nThis OTP is valid only for 15 minutes."; // Set a plain text body.

	echo $otp."<br>";
	// echo $mail->Body;
	// echo 15*60+time()-time();
	// $mail->send();
	if ($mail->send()) 
	{
		$qry = "UPDATE users set otp='$otp', reset_time=".time()." where email='$reset_mail' ";
		mysqli_query($db, $qry);
		// header("Location:../login/otp.php?email=$reset_mail");
    }
    else
    {
    	// header("Location:../login/index_login.php");
    }
}

// } else {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }