<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SKMM | Admin Panel</title>
	

</head>

<body class="hold-transition skin-blue sidebar-mini">


<?php
//session maintainence // kavindasilva
session_start();
$_SESSION['user']="Test1";
/**
 if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="adm") {
     echo "not an admin";
	 //header('Location:../login.html');
 }

/**/
include_once '../php/dbcon2.php';
//include  //header files & css,JS

?>
  
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<h2>admin control panel</h2> <br/>
	
	<!--searchRows(trindex, eleid, tableid)-->
	
	<input type='text' class="" id="srch1" onkeyup="searchRows(1,this.id,'tblMgr');" placeholder="search by name"/><br/>
	
	<?php viewAllMgr(); ?>
	
	
<!--form method="get" action="">
<input ty />
</form-->
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    
 
</body>
</html>

<?php
//view all users
function viewAllMgr(){
	$sqlq = "select * from employee;"; //sql query, users list
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) == 0) //check result
		echo "<p>No users in the system</p>";
	
	else {
		echo "<table id='tblMgr' class='table table-condensed'>";
		echo "<tr> <th>ID</th> <th>Name</th> <th>Telephone</th> <th>User type</th> <th>Username</th></tr>";
		//echo " <th>sex</th> <th>telephone1</th> <th>telephone2</th> <th>Address</th></tr>";
		
		while ($row = mysqli_fetch_array($res)) {
			echo "<form method='post' action='editMgr.php'>";
			
			echo "<tr><input type='text' name='eid' value='" . $row['e_id'] . "' hidden/>"; //to track the employee id
			echo "<input type='text' name='actor' value='ss' hidden/>"; //set as student 
			
			echo "<td>" . $row['e_id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['tel'] . "</td>";
			echo "<td>" . $row['type'] . "</td>";
			echo "<td>" . $row['user_user_name'] . "</td>";

			
			echo "<td><input type='submit' name='updatemgr' onclick='return confirmU()' value='Update'/>";//"</td>";
			echo "<input type='submit' name='resetmgr' onclick='return confirmU()' value='Reset password'/></td></tr></form>";//"</td>";
			//echo "<input type='submit' name='deletemgr' onclick='return confirmD()' value='DELETE' style='color:red'/>";	
		}
		echo "</table>";
	}
	
}

?>