
<?php

include_once 'dbcon.php';

//$uname=$_POST[']
$uname=$_SESSION['user'];
$oldpw=$_POST['oldpass'];
$newpw=$_POST['newpass'];

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
	//when old password is correct
	if($oldpw==$res['password']){
		
	}
}


?>