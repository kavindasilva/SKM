
<?php
//+++++++++++++++ find recipient address ++++++++++++++++++++









//++++++++++ mail sending part +++++++++++++++++++++++++++++++
require('../../mail0/class.phpmailer.php');
require('../../mail0/class.smtp.php');


//original
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
//$mail->Host = "smtp.googlemail.com";
$mail->Port = 465; // or 587 or 465
//$mail->Port = 587; // or 587 or 465
$mail->IsHTML(false);
$mail->Username = "skmm.tesing@gmail.com";
$mail->Password = "dunloplk";
$mail->SetFrom("skmm.tesing@gmail.com"); //sender 
$mail->Subject = "congrats"; //pass karanna variable ekak vidiyata
$mail->Body = "hello,\n welcome to aour automated mail sending service"; //pass karanna variable ekak vidiyata
$mail->AddAddress("rdulmina@gmail.com"); //receiver

echo"<hr color=green>";

//meka kamathi vidiyta hadanna
 if(!$mail->Send()) {
	echo "<hr color=red>" ;
	//header("Location:./home1.php");
    echo "Mailer Error: " . $mail->ErrorInfo;
//	header("Location:./home1.php");
 } else {
    echo "Message has been sent";
	//header("Location:./home1.php");
 }

?> 