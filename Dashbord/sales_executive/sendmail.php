
<?php
require_once "../../php/dbcon.php"; //$recip="rdulmina@gmail.com";
//+++++++++++++++ find recipient address ++++++++++++++++++++

session_start();
require_once "sess.php";
//$customer_usr=$_SESSION['currentuser'];
$Qno=$_POST['quoteno'];
$Qno=16;
$recip="errors@dunlop.lk";
$rec_name="To whom it concerns";


$sql="SELECT * FROM quotation q, quotation_item qi, customer c where q.q_no=qi.q_no and c.r_id=q.regular_customer_r_id and q.q_no=$Qno"; //get the
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)==0){
	echo "unexpected system error. qoutation finding failed";
	return;
}
else{
	$temp=mysqli_fetch_array($res);
	$cur_usr=$temp['regular_customer_r_id']; //get customer id
	echo "<hr>".$cur_usr; //cus id
	
	$sql="select * from user u, customer c where u.user_name=c.user_user_name and c.r_id=$cur_usr;";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==0){
		echo "customer ID getting failed";
		return;
	}
	
	$fetched=mysqli_fetch_array($res); //because only one row
	$recip=$fetched['email'];
	echo "<hr>".$recip;
	$rec_name=$fetched['company_name']; //greeting
}
/**/
//$msgbody=$_POST['msg'];
$msgbody="We have replied to your quotation request. please login to your Dunlop account for more details\n";

$fullmsg=$rec_name."\n\n".$msgbody."Thank you\n".$_SESSION['currentuser']."\n This is an automatic generated message by our system. Please login to your dunlop account for further details";



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
$mail->Body = $fullmsg;
$mail->AddAddress("$recip"); //receiver
//$mail->AddAddress("rdulmina@gmail.com"); //receiver

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