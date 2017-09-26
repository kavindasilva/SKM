<?php
/**
	view Employees (mgr)
*/

//header
require_once "head.php";
?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
	<script type="text/javascript" src="adminFun.js"></script>
	<h2>admin control panel</h2> <br/>
	
	<!--searchRows(trindex, eleid, tableid)-->
	
	<input type='text' class="" id="srch1" onkeyup="searchRows(1,this.id,'tblMgr');" placeholder="search by name"/><br/>
	
	<?php
		if(!isset($_GET['empT'])){
			header("Location: index.php");
		}
		$empType=$_GET['empT'];
		//if($empType=="mgr")
		viewEmp($empType); 
	?>
	

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->

<?php
//footer
require_once "foot.php";
?>    

<?php


//view all users
function viewEmp($type2){
	if($type2=="mgr")
		$sqlq = "select * from employee where type!='salex';"; //sql query, users list except sales x
	elseif($type2=="sales")
		$sqlq = "select * from employee where type='salex';"; //sql query, users list only sales x
		
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) == 0) //check result
		echo "<p>No users in the system</p>";
	
	else {
		echo "<table id='tblMgr' class='table table-condensed'>";
		echo "<tr> <th>ID</th> <th>Name</th> <th>Telephone</th> <th>User type</th> <th>Username</th></tr>";
		
		while ($row = mysqli_fetch_array($res)) {
			echo "<form method='post' action='editMgr.php'>";
			
			echo "<tr><input type='text' name='eid' value='" . $row['e_id'] . "' hidden/>"; //to track the employee id
			echo "<input type='text' name='uname' value='".$row['user_user_name']."' hidden/>"; //user_user_name
			
			echo "<td>" . $row['e_id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['tel'] . "</td>";
			echo "<td>" . $row['type'] . "</td>";
			echo "<td>" . $row['user_user_name'] . "</td>";

			
			echo "<td><input type='submit' name='updatemgr' onclick='return confirmU()' value='Update'/>";
			echo "<input type='submit' name='resetmgr' onclick='return confirmU()' value='Reset password'/>";
			
			if($type2=="sales")
				echo "<input type='submit' name='deletex' onclick='return confirmD()' value='Delete'/>";
			
			echo "</form></td></tr>";
		}
		echo "</table>";
	}
}

?>