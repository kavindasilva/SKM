
<?php
/**
	This file contains the UI to edit dealer, customer, supplier
	This file contains the SQL queries to edit dealer, customer, supplier
	This file should be required in "editUser.php"
*/
require_once '../php/dbcon.php';

//===== UI s ===============================================================================================================
function editDealerUI($id, $un){ //user id, user_name
	$sqlq = "select u.user_name,u.email,u.address,d.shop_name,d.tel,d.d_id from user u, dealer d WHERE u.user_name=d.user_user_name AND d.d_id=$id;"; 
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) != 1){ //check result. unpossible to be empty. there should be only one row
		echo "<p>Unexpected system error</p>";
		return;
	}		
	else {
		echo "<table id='tblstd'  class='table'>";
		$row = mysqli_fetch_array($res); //there should be only one result
		echo "<form method='post' action='editUserUI.php'>";
			
		echo "<tr><input type='text' name='did' value='" . $row['d_id'] . "' hidden/>"; //dealer ID
		echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //dealer user_name
		
		echo "<tr> <td>Dealer ID</td> <td><input type='text' value='" . $row['d_id'] . "' disabled/></td></tr>";
		echo "<tr> <td>User Name</td> <td><input type='text' value='" . $row['user_name'] . "' disabled/></td></tr>";
		echo "<tr> <td>Email</td> <td><input type='text' name='email' value='" . $row['email'] . "'required/></td></tr>";
		echo "<tr> <td>Address</td> <td><textarea name='addr'>".$row['address']."</textarea> </td></tr>";
		echo "<tr> <td>Telephone</td> <td><input type='text' name='tel' value='" . $row['tel'] . "'required/></td></tr>";
		echo "<tr> <td>Shop Name</td> <td><input type='text' name='shop' value='" . $row['shop_name'] . "'required/></td></tr>";
		
		echo "<tr><td><input type='submit' name='updatedealer2' onclick='return confirmU()' value='Update'/></td>";
		echo "<td><a href='viewAll.php'><input type='button' value='cancel'></a></td></tr></form>";	
		
		echo "</table>";
	}
	
}



//===== PHP and SQL ========================================================================================================

if(isset($_POST['updatedealer2'])){
	$userName=$_POST['uname'];
	$Dealerid=$_POST['did'];
	
	$newShop=$_POST['shop'];
	$newTel=$_POST['tel'];
	$newEmail=$_POST['email'];
	$newAddr=$_POST['addr'];
	
	$sql1="update user set email='$newEmail', address='$newAddr' where user_name='$userName';"; //user table
	$sql2="update dealer set shop_name='$newShop', tel='$newTel' where d_id='$Dealerid';";
	
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
		echo "<script>alert('Dealer details updated succesfully');window.location.href = 'viewAll.php';</script>";
	}
}

?>