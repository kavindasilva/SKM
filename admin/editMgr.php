<?php
/**
this file contains:
 edit manager UI+sql
 manager password reset UI+sql
*/

require_once "../php/dbcon.php";

$empID=$_POST['eid'];

//edit manager details 
if(isset($_POST['updatemgr'])){
	$sql1="select * from employee where e_id=".$empID; //name, tel
	$sql2="select * from user where user_name=(select user_user_name from employee where e_id=$empID);"; //get user table details - email, address
	
	$res1=mysqli_query($GLOBALS['conn'],$sql1);
	if(!$res1){
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	$res2=mysqli_query($GLOBALS['conn'],$sql2);
	if(!$res2){
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	
	//there is a non-empty result set in both sql queries
	$r1=mysqli_fetch_array($res1);
	$r2=mysqli_fetch_array($res2);
	
	echo "<form method='post' action='editMgr.php'>";
	echo "<Table>";
	//echo"<tr><td></td> <td></td></tr>";
	echo "<input type='text' name='eid' value='".$r1['e_id']."' hidden/>";
	echo "<input type='text' name='uname' value='".$r2['user_name']."' hidden/>";
	echo"<tr><td>Employee ID</td> <td><input type='text' value='".$r1['e_id']."' name='' disabled/></td></tr>";
	echo"<tr><td>User name</td> <td><input type='text' value='".$r2['user_name']."' name='' disabled/></td></tr>";
	
	echo"<tr><td>Name</td> <td><input type='text' value='".$r1['name']."' name='nam'/></td></tr>";
	echo"<tr><td>Telephone</td> <td><input type='text' value='".$r1['tel']."' name='telp'/></td></tr>";
	echo"<tr><td>Email</td> <td><input type='text' value='".$r2['email']."' name='eml'/></td></tr>";
	echo"<tr><td>Address</td> <td><textarea name='addr'>".$r2['address']."</textarea></td></tr>";
	
	echo"<tr><td><input type='submit' name='kk' value='OK'></td> <td><a href='viewMgr.php'><input type='button' value='cancel'></a></td></tr>";
	echo"</table></form>";
}


?>