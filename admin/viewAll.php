    <!-- Content Header (Page header) -->
    <section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>
	
	<?php
	//viewAll2();
	?>
		<div class="panel panel-default" >
            <div class="panel-heading">
              <span class="panel-title"> <B>Customers </B>
			  <input type="text" id="search2" onkeyup="searchRows(1,this.id, 'tblcus');"  placeholder="user name"/>
			  <input type="text" name="skey" id="search1" onkeyup="searchRows(4,this.id, 'tblcus');" placeholder="Telephone" />
			  <input type="button" onclick="clearAllCus()" value="clear search"/>
			  </span>
            </div>
            <div class="panel-body" style="height:160px; overflow-y:auto; overflow-x: scroll">
              <?php viewCus(); ?>
            </div>
        </div>
		
		<div class="">
		<?php viewSup(); ?>
		</div>
		
		<div class="">
		<?php viewDealer(); ?>
		</div>

    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    </section>

    <!-- Main content -->
    

  <!-- /.content-wrapper -->

  
<?php
//view all users
/*
function viewAll2(){
	viewDealer();
	viewCus();
	viewSup();	
}
*/

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
	}
}

function viewCus(){
	$sqlq = "select u.user_name,u.email,u.address,r.tel,r.r_id from user u, regular_customer r WHERE u.user_name=r.user_user_name ;"; //sql query, customer list
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