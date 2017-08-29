<?php
require_once 'dbcon.php';
session_start();
//if(isset($_POST['log'])){
	//echo "form login";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['euname'];
	$password = $_POST['password'];
	
	$checkName = "select * from user where user_name='$name'";
	
	$result = mysqli_query($conn, $checkName);
	
	if (!($result)) 
		{echo "Error in query";}
	$rowcount = mysqli_num_rows($result);
	
	if($rowcount==0){
		echo "Invalid user";
		echo "<br><a href=\"javascript:history.go(-1)\">BACK</a>";
	}
	elseif ($rowcount==1)
	{
		$r = mysqli_fetch_array($result);
		$rpass = $r['password']; //password from DB
		if ($rpass==$password){
			$_SESSION['currentuser']=$name; //user name		
			$usrtype=$r['type'];
			$_SESSION['usertype']=$usrtype; //user type. tp prevent unwanted access
						
			if($usrtype=='ad')
			{	
				header('Location: ./admin/admin.php');
				}
			elseif($usrtype=='se')
				header('Location: ../dashbord/sales_executive/navigation.php');		
			elseif($usrtype=='ch')
				header('Location: ../dashbord/cheif_manager/navigation.php');	
			elseif($usrtype=='im')
				header('Location: ../dashbord/import_manager/navigation.php');
			elseif($usrtype=='de')
				header('Location: ../dashbord/dealer1/navigation.php');
			elseif($usrtype=='sm')
				header('Location: ../dashbord/Stock_Manager/navigation.php');
			elseif($usrtype=='su')
				header('Location: ../dashbord/supplier/navigation.php');
			else
				header('Location: ../dashbord/Customer/navigation.php');
				
			
		}
		else{
			
			//echo "<br><a href=\"javascript:history.go(-1)\">BACK</a>";
			 header("Location:../invalidlogin.html");
			
			
		}
	}
}
	
//}


?>