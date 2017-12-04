<?php
	/**
	this file contains the code of viewing all dealers, customer, supplier
	*/
	
//header
require_once "head.php";

//check which user type to be viewed
if(!isset($_GET['type'])){
	//header("Location: index.php"); //not working because header is already set
	//echo "<script>window.location.href='index.php';</script>";
	$utype="all";
}
else
	$utype=$_GET['type'];

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>
	
	<?php
	//viewAll2();
	?>
		<!--div class="panel panel-default" >
            <div class="panel-heading">
              <span class="panel-title"> <B>Customers </B>
			  <input type="text" id="search2" onkeyup="searchRows(1,this.id, 'tblcus');"  placeholder="user name"/>
			  <input type="text" name="skey" id="search1" onkeyup="searchRows(4,this.id, 'tblcus');" placeholder="Telephone" />
			  <input type="button" onclick="clearAllCus()" value="clear search"/>
			  </span>
            </div>
            <div class="panel-body" style="height:160px; overflow-y:auto; overflow-x: scroll">
              <?php //viewCus(); ?>
            </div>
        </div-->
		
		
		<div class="panel panel-default" >
            <div class="panel-heading">
              <?php
				if($utype=="cus")
					viewCusSearch();
				elseif($utype=="deal")
					viewDealerSearch();
				elseif($utype=="sup")
					viewSupSearch();
							  
			  ?>
            </div>
            <div class="panel-body" style="height:100%; overflow-y:auto; overflow-x: scroll">
              <?php 
				if($utype=="all")
					viewMenu();
				elseif($utype=="cus")
					viewCus();
				elseif($utype=="deal")
					viewDealer();
				elseif($utype=="sup")
					viewSup();
							  
			  ?>
            </div>
        </div>
		
		

    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="index.php"><i></i> Dashboard</a></li>
    </ol>
    </section>

    <!-- Main content -->
    
<?php
//footer
require_once "foot.php";
?>

<?php

function viewMenu(){
	//echo "KJHB";
	echo "<a href='viewAll.php?type=cus'><button type='button' class='btn btn-lg btn-info'>Customers</button></a>";
	echo "<a href='viewAll.php?type=deal'><button type='button' class='btn btn-lg btn-info'>Dealers</button></a>";
	echo "<a href='viewAll.php?type=sup'><button type='button' class='btn btn-lg btn-info'>Suppliers</button></a>";
	//echo "<a href=''><button type='button' class='list-group-item'>Default</button></a>";
}

//=========================== view search bar and table title ================================================================
function viewDealerSearch(){
	echo "<span class='panel-title'> <B>Dealers </B>";
	echo "<input type='text' id='search2' onkeyup='searchRows(1,this.id, \"tbldealer\");'  placeholder='user name'/>";
	echo "<input type='text' id='search4' onkeyup='searchRows(2,this.id, \"tbldealer\");'  placeholder='Email'/>";
	echo "<input type='text' id='search3' onkeyup='searchRows(5,this.id, \"tbldealer\");'  placeholder='Shop name'/>";
	echo "<input type='text' name='skey' id='search1' onkeyup='searchRows(4,this.id, \"tbldealer\");' placeholder='Telephone' />";
	echo "<input type='button' onclick='clearAll(\"tbldealer\")' value='clear search'/>";
	echo "</span>";
}

function viewCusSearch(){
	echo "<span class='panel-title'> <B>Customers </B>";
	echo "<input type='text' id='search2' onkeyup='searchRows(1,this.id, \"tblcus\");'  placeholder='user name'/>";
	echo "<input type='text' id='search3' onkeyup='searchRows(2,this.id, \"tblcus\");'  placeholder='Email'/>";
	echo "<input type='text' name='skey' id='search1' onkeyup='searchRows(4,this.id, \"tblcus\");' placeholder='Telephone' />";
	
	//for execution of JS. only the id is needed
	echo "<input type='text' name='skey' id='search4' onkeyup='searchRows(4,this.id, \"tblcus\");' placeholder='Telephone' hidden/>";
	echo "<input type='button' onclick='clearAll(\"tblcus\")' value='clear search'/>";
	echo "</span>";
}

function viewSupSearch(){
	echo "<span class='panel-title'> <B>Suppliers </B>";
	echo "<input type='text' id='search2' onkeyup='searchRows(1,this.id, \"tblsup\");'  placeholder='user name'/>";
	echo "<input type='text' id='search3' onkeyup='searchRows(2,this.id, \"tblsup\");'  placeholder='Email'/>";
	echo "<input type='text' id='search4' onkeyup='searchRows(4,this.id, \"tblsup\");'  placeholder='Brand'/>";
	echo "<input type='text' name='skey' id='search1' onkeyup='searchRows(5,this.id, \"tblsup\");' placeholder='Country' />";
	echo "<input type='button' onclick='clearAll(\"tblsup\")' value='clear search'/>";
	echo "</span>";
}

//===================================== view table data =========================================================================
//view all dealers
function viewDealer(){
	$sqlq = "select u.user_name,u.email,u.address,d.shop_name,d.tel,d.d_id from user u, dealer d WHERE u.user_name=d.user_user_name ;"; //sql query, dealers list
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) == 0) //check result
		echo "<p>No dealers in the system</p>";
	
	else {
		echo "<table id='tbldealer'  class='table table-condensed'>";
		echo "<tr> <th>dealer ID</th> <th>User name</th> <th>Email</th> <th>Address</th> <th>Telephone</th> <th>Shop name</th></tr>";
		while ($row = mysqli_fetch_array($res)) {
			echo "<form method='post' action='editUser.php'>";
			
			echo "<tr><input type='text' name='did' value='" . $row['d_id'] . "' hidden/>"; //dealer ID
			echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //dealer user_name
			
			echo "<td>" . $row['d_id'] . "</td>";
			echo "<td>" . $row['user_name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['tel'] . "</td>";
			echo "<td>" . $row['shop_name'] . "</td>";
			
			echo "<td><input type='submit' name='updatedealer' onclick='return confirmU()' value='Update'/>";
			echo "<input type='submit' name='resetusr' onclick='return confirmU()' value='Reset password'/>";
			echo "<input type='submit' name='deletedealer' onclick='return confirmD()' value='DELETE' style='color:red'/></td></tr></form>";	
		}
		echo "</table>";
		
		//for the correct execution of JS function
		//echo "<table id='tblcus'></table>";
	}
}

function viewCus(){
	$sqlq = "select u.user_name,u.email,u.address,r.tel,r.r_id from user u, customer r WHERE u.user_name=r.user_user_name ;"; //sql query, customer list
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) == 0) //check result
		echo "<p>No customer in the system</p>";
	
	else {
		echo "<table id='tblcus'  class='table table-condensed'>";
		echo "<tr> <th>Customer ID</th> <th>User name</th> <th>Email</th> <th>Address</th> <th>Telephone</th></tr>";//" <th>Shop name</th></tr>";
		while ($row = mysqli_fetch_array($res)) {
			echo "<form method='post' action='editUser.php'>";
			
			echo "<tr><input type='text' name='rid' value='" . $row['r_id'] . "' hidden/>"; //customer ID
			echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //customer user_name
			
			echo "<td>" . $row['r_id'] . "</td>";
			echo "<td>" . $row['user_name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['tel'] . "</td>";
			//echo "<td>" . $row['shop_name'] . "</td>";
			
			echo "<td><input type='submit' name='updatecust' onclick='return confirmU()' value='Update'/>";
			echo "<input type='submit' name='resetusr' onclick='return confirmU()' value='Reset password'/>";
			echo "<input type='submit' name='deletecust' onclick='return confirmD()' value='DELETE' style='color:red'/></td></tr></form>";	
		}
		echo "</table>";
	}
}

function viewSup(){
	$sqlq = "select u.user_name,u.email,u.address,s.brand,s.country,s.s_id from user u, supplier s WHERE u.user_name=s.user_user_name ;"; //sql query, customer list
	$res = mysqli_query($GLOBALS['conn'] , $sqlq); //result
	
	if (mysqli_num_rows($res) == 0) //check result
		echo "<p>No supplier in the system</p>";
	
	else {
		echo "<table id='tblsup'  class='table table-condensed'>";
		echo "<tr> <th>Supplier ID</th> <th>User name</th> <th>Email</th> <th>Address</th> <th>Brand</th> <th>Country</th></tr>";
		while ($row = mysqli_fetch_array($res)) {
			echo "<form method='post' action='editUser.php'>";
			
			echo "<input type='text' name='sid' value='" . $row['s_id'] . "' hidden/>"; //supplier ID
			echo "<input type='text' name='uname' value='" . $row['user_name'] . "' hidden/>"; //supplier user_name
			
			echo "<tr><td>" . $row['s_id'] . "</td>";
			echo "<td>" . $row['user_name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['brand'] . "</td>";
			echo "<td>" . $row['country'] . "</td>";
			
			echo "<td><input type='submit' name='updatesup' onclick='return confirmU()' value='Update'/>";
			echo "<input type='submit' name='resetusr' onclick='return confirmU()' value='Reset password'/>";
			echo "<input type='submit' name='deletesup' onclick='return confirmD()' value='DELETE' style='color:red'/></td></tr></form>";	
		}
		echo "</table>";
	}
}

?>