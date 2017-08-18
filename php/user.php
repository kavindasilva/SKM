<?php


require_once 'dbcon.php';

//if(isset($_POST['log'])){
	//echo "form login";
	$name = $_POST['euname'];
	$password = $_POST['passwd'];
	
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
			$_SESSION['user']=''; //user id
				 header("Location:../Dashbord/adminlte.io/themes/AdminLTE/index2.html");
			
			//adm=admin, sae=sales exe, chf=chief mgr...
			$usrtype=$r['type'];
			if($usrtype=='adm')
				header('Location: ./admin/admin.php');
				//echo "you are the system admin ";
			elseif($usrtype=='sae')
				echo "you are a sales executive";
			elseif($usrtype=='chf')
				echo "hi lokka";
				
			//header('Location: user.php'); //redirection
		}
		else{
			
			//echo "<br><a href=\"javascript:history.go(-1)\">BACK</a>";
			 header("Location:../invalidlogin.html");
			
		}
	}
	
//}


?>