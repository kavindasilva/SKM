
<?php
/**
	This file contains the UI to edit dealer, customer, supplier
	This file contains the SQL queries to edit dealer, customer, supplier
	+++++++++++++ This file should be required in "editUser.php" +++++++++++++++++++++
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
		
		echo "<tr> <td>Dealer ID</td> <td><input type='text' class='form-control' value='" . $row['d_id'] . "' disabled/></td></tr>";
		echo "<tr> <td>User Name</td> <td><input type='text' class='form-control' value='" . $row['user_name'] . "' disabled/></td></tr>";
		echo "<tr> <td>Email</td> <td><input type='text' class='form-control' name='email' value='" . $row['email'] . "'required/></td></tr>";
		echo "<tr> <td>Address</td> <td><textarea class='form-control' name='addr'>".$row['address']."</textarea> </td></tr>";
		echo "<tr> <td>Telephone</td> <td><input type='text' class='form-control' id='telp' onkeyup='validateTel()' name='tel' value='" . $row['tel'] . "'required/></td></tr>";
		echo "<tr> <td>Shop Name</td> <td><input type='text' class='form-control' name='shop' value='" . $row['shop_name'] . "'required/></td></tr>";
		
		echo "<tr><td><input type='submit' class='form-control' name='updatedealer2' onclick='return validateTel();return confirmU()' value='Update'/></td>";
		echo "<td><a href='viewAll.php'><input type='button' class='form-control' value='cancel'></a></td></tr></form>";	
		
		echo "</table>";
	}
}

function editCusUI($id, $un){ //user id, user_name
	$sqlq = "select u.user_name,u.email,u.address,r.tel,r.r_id from user u, customer r WHERE u.user_name=r.user_user_name AND r.r_id=$id;"; //sql query, customer list
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) != 1){ //check result. unpossible to be empty. there should be only one row
		echo "<p>Unexpected system error</p>";
		return;
	}		
	else {
		echo "<table id='tblstd'  class='table'>";
		$row = mysqli_fetch_array($res); //there should be only one result
		echo "<form method='post' action='editUserUI.php'>";
			
		echo "<tr><input type='text' name='rid' value='" . $row['r_id'] . "' hidden/>"; //Customer ID
		echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //Customer user_name
		
		echo "<tr> <td>Customer ID</td> <td><input type='text' class='form-control' value='" . $row['r_id'] . "' disabled/></td></tr>";
		echo "<tr> <td>User Name</td> <td><input type='text' class='form-control' value='" . $row['user_name'] . "' disabled/></td></tr>";
		echo "<tr> <td>Email</td> <td><input type='text' class='form-control' name='email' value='" . $row['email'] . "'required/></td></tr>";
		echo "<tr> <td>Address</td> <td><textarea class='form-control' name='addr'>".$row['address']."</textarea> </td></tr>";
		echo "<tr> <td>Telephone</td> <td><input type='text' class='form-control' id='telp' onkeyup='validateTel()' name='tel' value='" . $row['tel'] . "'required/></td></tr>";
		//echo "<tr> <td>Shop Name</td> <td><input type='text' name='shop' value='" . $row['shop_name'] . "'required/></td></tr>";
		
		echo "<tr><td><input type='submit' class='form-control' name='updateCus2' onclick='return validateTel();return confirmU()' value='Update'/></td>";
		echo "<td><a href='viewAll.php'><input type='button' class='form-control' value='cancel'></a></td></tr></form>";	
		
		echo "</table>";
	}
}

function editSupUI($id, $un){ //user id, user_name
	$sqlq = "select u.user_name,u.email,u.address,s.brand,s.country,s.s_id from user u, supplier s WHERE u.user_name=s.user_user_name AND s.s_id=$id;"; 
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) != 1){ //check result. unpossible to be empty. there should be only one row
		echo "<p>Unexpected system error</p>";
		return;
	}		
	else {
		echo "<table id='tblstd'  class='table'>";
		$row = mysqli_fetch_array($res); //there should be only one result
		echo "<form method='post' action='editUserUI.php'>";
			
		echo "<tr><input type='text' name='sid' value='" . $row['s_id'] . "' hidden/>"; //Supplier ID
		echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //Supplier user_name
		
		echo "<tr> <td>Supplier ID</td> <td><input type='text' class='form-control' value='" . $row['s_id'] . "' disabled/></td></tr>";
		echo "<tr> <td>User Name</td> <td><input type='text' class='form-control' value='" . $row['user_name'] . "' disabled/></td></tr>";
		echo "<tr> <td>Email</td> <td><input type='text' class='form-control' name='email' value='" . $row['email'] . "'required/></td></tr>";
		echo "<tr> <td>Address</td> <td><textarea class='form-control' name='addr'>".$row['address']."</textarea> </td></tr>";
		echo "<tr> <td>Brand</td> <td><input type='text' class='form-control' name='brnd' value='" . $row['brand'] . "'required/></td></tr>";
		echo "<tr> <td>Country</td> <td><input type='text' class='form-control' name='cont' value='" . $row['country'] . "'required/></td></tr>";
		
		echo "<tr><td><input type='submit' class='form-control' name='updatesup2' onclick='return validateTel();return confirmU()' value='Update'/></td>";
		echo "<td><a href='viewAll.php'><input type='button' class='form-control' value='cancel'></a></td></tr></form>";	
		
		echo "</table>";
	}
}
//===== PHP and SQL ========================================================================================================

//dealer
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

//customer
if(isset($_POST['updateCus2'])){
	$userName=$_POST['uname'];
	$Cusid=$_POST['rid'];
	
	//$newShop=$_POST['shop'];
	$newTel=$_POST['tel'];
	$newEmail=$_POST['email'];
	$newAddr=$_POST['addr'];
	
	$sql1="update user set email='$newEmail', address='$newAddr' where user_name='$userName';"; //user table
	$sql2="update customer set tel='$newTel' where r_id='$Cusid';";
	//$sql2="update customer set shop_name='$newShop', tel='$newTel' where r_id='$Cusid';";
	
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
		echo "<script>alert('Customer details updated succesfully');window.location.href = 'viewAll.php';</script>";
	}
}

//Supplier
if(isset($_POST['updatesup2'])){
	$userName=$_POST['uname'];
	$Supid=$_POST['sid'];
	
	$newCon=$_POST['cont'];
	$newBR=$_POST['brnd'];
	$newEmail=$_POST['email'];
	$newAddr=$_POST['addr'];
	
	$sql1="update user set email='$newEmail', address='$newAddr' where user_name='$userName';"; //user table
	$sql2="update supplier set brand='$newBR', country='$newCon' where s_id='$Supid';";
	
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
		echo "<script>alert('Supplier details updated succesfully');window.location.href = 'viewAll.php';</script>";
	}
}

?>