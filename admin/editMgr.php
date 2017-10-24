<?php
/**
	edit Employee (mgr) UI
*/

//header
require_once "head.php";
?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
	<script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>

<?php
require_once "../php/dbcon.php";

$empID1=$_POST['eid'];

//delete sales executive
if(isset($_POST['deletex'])){
	deleteSaleX($empID1,$_POST['uname']);
}

//view employee details HTML
if(isset($_POST['updatemgr'])){
	changeMgrUI($empID1);
}

//edit employee details SQL+PHP
if(isset($_POST['setupdate'])){
	changeMgrSQL();
}

//reset employee password====================================================
if(isset($_POST['resetmgr'])){
	$user=$_POST['uname'];
	$skmreset=md5("skm");
	$sql="update user set password='$skmreset' where user_name='$user';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	else{
		echo "<script>alert('Employee password reset succesfully');window.location.href = 'index.php';</script>";
	}
}	
?>

	</section>
    <!-- Main content -->

<?php
//footer
require_once "foot.php";
?>

<?php
function changeMgrUI($empID){
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
	echo"<tr><td>Employee ID</td> <td><input type='text' class='form-control' value='".$r1['e_id']."' name='' disabled/></td></tr>";
	echo"<tr><td>User name</td> <td><input type='text' class='form-control' value='".$r2['user_name']."' name='' disabled/></td></tr>";
	
	echo"<tr><td>Name</td> <td><input type='text' class='form-control' value='".$r1['name']."' name='nam'/></td></tr>";
	echo"<tr><td>Telephone</td> <td><input type='text' class='form-control' value='".$r1['tel']."' name='telp'/></td></tr>";
	echo"<tr><td>Email</td> <td><input type='text' class='form-control' value='".$r2['email']."' name='eml'/></td></tr>";
	echo"<tr><td>Address</td> <td><textarea class='form-control' name='addr'>".$r2['address']."</textarea></td></tr>";
	
	echo"<tr><td><input type='submit' class='form-control' onclick='return confirmU()' name='setupdate' value='OK'></td>";
	echo "<td><input type='button' value='cancel' class='form-control' onclick='window.history.back()'></td></tr>";
	echo"</table></form>";
}

function changeMgrSQL(){
	$userName=$_POST['uname'];
	$Empid=$_POST['eid'];
	
	$newName=$_POST['nam'];
	$newTel=$_POST['telp'];
	$newEmail=$_POST['eml'];
	$newAddr=$_POST['addr'];
	
	$sql1="update user set email='$newEmail', address='$newAddr' where user_name='$userName';";
	$sql2="update employee set name='$newName', tel='$newTel' where e_id='$Empid';";
	
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
	else{
		echo "<script>alert('Employee details updated succesfully');window.location.href = 'index.php';</script>";
	}
	
}

//delete sales executive
function deleteSaleX($empID, $user){
	$sql1="delete from sales_executive where employee_e_id=".$empID.";";
	$sql2="delete from employee where e_id=".$empID.";";
	$sql3="delete from user where user_name='".$user."';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql1);
	if(!$res){
		echo "<script>alert('".mysqli_error($GLOBALS['conn'])." Sales executive delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	$res=mysqli_query($GLOBALS['conn'],$sql2);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('Sales executive employee delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	$res=mysqli_query($GLOBALS['conn'],$sql3);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('Sales executive user name delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	echo "<script>alert('Sales executive deleted succesfully');window.location.href = 'index.php';</script>";
}	
	
?>