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
						
			if($usrtype=='adm')
			{	
				header('Location: ../admin/index.php');
				}
			elseif($usrtype=='salex')
				header('Location: ../dashbord/sales_executive/index.php');		
			elseif($usrtype=='chiefmgr')
				header('Location: ../dashbord/cheif_manager/index.php');	
			elseif($usrtype=='impmgr')
				header('Location: ../dashbord/import_manager/index.php');
			elseif($usrtype=='dealer')
				header('Location: ../dashbord/dealer1/index.php');
			elseif($usrtype=='stockmgr')
				header('Location: ../dashbord/Stock_Manager/index.php');
			elseif($usrtype=='suppl')
				header('Location: ../dashbord/supplier/index.php');
			elseif($usrtype=='cust')
				header('Location: ../dashbord/Customer/index.php');
				
			
		}
		else{
			
			//echo "<br><a href=\"javascript:history.go(-1)\">BACK</a>";
			 header("Location:../invalidlogin.html");
			
			
		}
	}
}
	
//}


?>