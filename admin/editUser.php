
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<script type="text/javascript" src="adminFun.js"></script>
	<script type="text/javascript" src="adminValidate.js"></script>
	<B>admin control panel</b> <br/>

<?php
require_once "../php/dbcon.php";

//============= update queries ======================================================================================================

require_once "editUserUI.php";

if(isset($_POST['updatedealer'])){
	editDealerUI($_POST['did'], $_POST['uname']);
}

if(isset($_POST['updatecust'])){
	editCusUI($_POST['rid'], $_POST['uname']);
}

if(isset($_POST['updatesup'])){
	editSupUI($_POST['sid'], $_POST['uname']);
}



?>

	</section>

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
	echo"<tr><td>Employee ID</td> <td><input type='text' value='".$r1['e_id']."' name='' disabled/></td></tr>";
	echo"<tr><td>User name</td> <td><input type='text' value='".$r2['user_name']."' name='' disabled/></td></tr>";
	
	echo"<tr><td>Name</td> <td><input type='text' value='".$r1['name']."' name='nam'/></td></tr>";
	echo"<tr><td>Telephone</td> <td><input type='text' value='".$r1['tel']."' name='telp'/></td></tr>";
	echo"<tr><td>Email</td> <td><input type='text' value='".$r2['email']."' name='eml'/></td></tr>";
	echo"<tr><td>Address</td> <td><textarea name='addr'>".$r2['address']."</textarea></td></tr>";
	
	echo"<tr><td><input type='submit' onclick='return confirmU()' name='setupdate' value='OK'></td> <td><a href='viewMgr.php'>";
	echo "<input type='button' value='cancel'></a></td></tr>";
	echo"</table></form>";
}
//================ delete queries ================================================================================================
//deletesup
if(isset($_POST['deletesup'])){
	$sql1="delete from supplier where s_id=".$_POST['sid'].";";
	$sql2="delete from user where user_name='".$_POST['uname']."';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql1);
	if(!$res){
		echo "<script>alert('".mysqli_error($GLOBALS['conn'])." supplier delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	$res=mysqli_query($GLOBALS['conn'],$sql2);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('supplier delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	echo "<script>alert('supplier deleted succesfully');window.location.href = 'index.php';</script>";
}

//deletecust
if(isset($_POST['deletecust'])){
	$sql1="delete from regular_customer where r_id=".$_POST['rid'].";";
	$sql2="delete from user where user_name='".$_POST['uname']."';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql1);
	if(!$res){
		//echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('".mysqli_error($GLOBALS['conn'])." customer delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	$res=mysqli_query($GLOBALS['conn'],$sql2);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('customer delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	echo "<script>alert('customer deleted succesfully');window.location.href = 'index.php';</script>";
}

//deletedealer
if(isset($_POST['deletedealer'])){
	$sql1="delete from dealer where d_id=".$_POST['did'].";";
	$sql2="delete from user where user_name='".$_POST['uname']."';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql1);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('dealer delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	$res=mysqli_query($GLOBALS['conn'],$sql2);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		echo "<script>alert('dealer delete failed');window.location.href = 'index.php';</script>";
		return;
	}
	echo "<script>alert('dealer deleted succesfully');window.location.href = 'index.php';</script>";
}

//reset user password ============================================================================================================
if(isset($_POST['resetusr'])){
	$user=$_POST['uname'];
	$sql="update user set password='skmreset' where user_name='$user';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	else{
		echo "<script>alert('User password reset succesfully');window.location.href = 'index.php';</script>";
	}
}	
	
?>