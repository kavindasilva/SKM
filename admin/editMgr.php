  <!-- Content Header (Page header) -->
    <section class="content-header">
	<script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>

<?php
require_once "../php/dbcon.php";

$empID1=$_POST['eid'];

//view manager details HTML
if(isset($_POST['updatemgr'])){
	changeMgrUI($empID1);
}

//edit manager details SQL+PHP
if(isset($_POST['setupdate'])){
	changeMgrSQL();
}

//reset manager password
if(isset($_POST['resetmgr'])){
	$user=$_POST['uname'];
	$sql="update user set password='skmreset' where user_name='$user';";
	
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
		echo "<script>alert('Manager details updated succesfully');window.location.href = 'index.php';</script>";
	}
	
}	
	
?>