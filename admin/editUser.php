<?php

/**
this file contains:
 dealer, customer, supplier UI+sql
 dealer, customer, supplier password reset UI+sql
*/
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
require_once '../php/dbcon.php';
//include  //header files & css,JS

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SKMM | Admin Panel</title>
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../fonts/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../icon/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../css/skins/_all-skins.min.css">

    <!-- Google Font ->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"-->
	
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
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
//include '../php/dbcon2.php';
//include  //header files & css,JS

?>
  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../images/skmlogo.jpg" style="height:50px;" alt="User Image"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><img src="../images/skmlogo.jpg" style="height:50px;" alt="User Image"><b>Dunlop</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
                        
			
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            
          </li>
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/user8-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce <?php echo $_SESSION['user']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/user8-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                  Sales-Executive
                 <small>S.K.Munasinghe Motors</small>
                </p>
              </li>
         
                     <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="settings.php" class="btn btn-default btn-flat">Profile</a>
                </div>
				 
                <div class="pull-right">
                  <a href="../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
				
				<div style="margin-left:77px;">
                  <a href="lockscreen.html" class="btn btn-default btn-flat">Lock Profile</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/user8-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce<?php echo $_SESSION['user']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"  id="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li  id="dd" class="active treeview menu-open">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>
       
        <li class="treeview">

          <a href="#">
            <i class="fa fa-edit"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php" ><i class="fa fa-circle-o"></i> New user</a></li>
            <li><a href="viewAll.php" ><i class="fa fa-circle-o"></i> View all</a></li>
            <li><a href="viewAll.php"><i class="fa fa-circle-o"></i> Edit details</a></li>
            <li><a href="viewAll.php"><i class="fa fa-circle-o"></i> Reset password</a></li>
            <li><a href="viewAll.php"><i class="fa fa-circle-o" style="color:#ee0000"></i> Remove user</a></li>
           </ul>
        </li>
		
		<li class="treeview">

          <a href="viewMgr.php">
            <i class="fa fa-edit"></i> <span>Managers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewMgr.php"><i class="fa fa-circle-o"></i> View all</a></li>
            <li><a href="viewMgr.php" name="viewMgr"><i class="fa fa-circle-o"></i> Edit details</a></li>
            <li><a href="viewMgr.php"><i class="fa fa-circle-o"></i> Reset password</a></li>
           </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../php/changepass.php"><i class="fa fa-circle-o"></i> Change password</a></li>
            <li><a href="../php/logout.php"><i class="fa fa-circle-o"></i> Sign out</a></li>
          </ul>
        </li>
    
                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>

<?php
require_once "../php/dbcon.php";

$empID1=$_POST['eid'];

//view manager details 
if(isset($_POST['updatemgr'])){
	changeMgrUI($empID1);
}

//edit manager details 
if(isset($_POST['setupdate'])){
	changeMgrSQL();
}


?>

	</section>
    <!-- Main content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Sole Agent of Dunlop tires in Srilanka
    </div>
    <strong>S.K.Muanasinge Motors </strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
  
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


</div>

<!-- jQuery 3.1.1 -->
<script src="../js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap no need 3.3.7 -->
<script src="../js/bootstrap.min.js"></script>
<!-- FastClick no need -->
<script src="../js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<script src="../js/navigation_controler.js"></script>

</body>
</html>

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

//reset user password
if(isset($_POST['resetusr'])){
	$user=$_POST['uname'];
	$sql="update user set password='skmreset' where user_name='$user';";
	
	$res=mysqli_query($GLOBALS['conn'],$sql);
	if(!$res){
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	else{
		echo "<script>alert('User password reset succesfully');window.location.href = 'index.php';</script>";
	}
}	
	
?>