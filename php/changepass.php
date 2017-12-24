
<?php

include_once 'dbcon.php';

session_start();
//$uname=$_POST[']
$uname=$_SESSION['currentuser'];
$oldpw=$_POST['oldpass'];
$newpw=$_POST['newpass'];

$oldpw=md5($oldpw);
$newpw=md5($newpw);

$sql="select * from user where user_name='".$uname."';";
$res=mysqli_query($conn, $sql);
if(!$res){
	echo "Database error<br>";
	echo mysqli_error($conn);
}
elseif(mysqli_num_rows($res)==0){
	echo "Unexpected system error<BR>";
}
else{
	$tmp=mysqli_fetch_array($res);
	//when old password is correct
	if($oldpw==$tmp['password']){
		$sql="update user set password='$newpw' where user_name='$uname';";
		$res=mysqli_query($conn, $sql);
		
		if(!$res){
			echo "password change error<br>";
			echo mysqli_error($conn);
			return;
		}
		else{
			//echo "<script>alert('Password updated succesfully');window.location.href = 'index.php';</script>";
			echo "<script>alert('Password updated succesfully');javascript:history.go(-2);</script>";
		}
	}
	else{
		echo "wrong login password";
		echo "<script>alert('Wrong login password');javascript:history.go(-1);</script>";
	}
}


?>