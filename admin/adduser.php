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
              <span class="hidden-xs"><?php echo $_SESSION['user']; ?></span>
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
          <p><?php echo $_SESSION['user']; ?></p>
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
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li  id="dd"class="active treeview menu-open">
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
            <li><a href="index.php"><i class="fa fa-circle-o"></i> New user</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> View all</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Edit details</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Reset password</a></li>
            <li><a href="#"><i class="fa fa-circle-o" style="color:#ee0000"></i> Remove user</a></li>
           </ul>
        </li>
		
		<li class="treeview">

          <a href="#">
            <i class="fa fa-edit"></i> <span>Managers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewMgr.php"><i class="fa fa-circle-o"></i> View all</a></li>
            <li><a href="viewMgr.php"><i class="fa fa-circle-o"></i> Edit details</a></li>
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
            <li><a href=""><i class="fa fa-circle-o"></i> Change password</a></li>
            <li><a href="../php/logout.php"><i class="fa fa-circle-o"></i> Sign out</a></li>
          </ul>
        </li>
    
                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<?php
//session maintainence // kavindasilva
/**
 * get method eken user type eka ganna. ekata adalawa fields display karanna
 
 if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="adm") {
     echo "not an admin";
	 //header('Location:../login.html');
 }

/**/
include '../php/dbcon2.php';
//include  //header files & css,JS


if(!isset($_GET['type'])){
	//header("Location: index.php");
}
$newUserType=$_GET['type'];


?>
<script type="text/javascript" src="adminFun.js"></script>

<center>

<form method="post" action="adminfuns1.php">
<table>
	<td><input type='text' name='utype' value="<?php echo $newUserType; ?>" hidden/>
	
	<tr><td>First name</td>	<td><input type="text" name="fname" autocomplete="off" required/></td></tr>
	<tr><td>Last name</td>	<td><input type="text" name="lname" autocomplete="off" required=""/></td></tr>
	<tr><td>Email</td>		<td><input type="email" name="eml" autocomplete="off" required=""/></td></tr>
	<tr><td>Address</td>	<td><textarea name="addr" autocomplete="off"></textarea></td></tr>
	<tr><td>Phone</td>		<td><input type="text" name="telp" autocomplete="off" required=""/></td></tr>
	<tr><td>Prefered username</td><td><input type="text" name="prefuser" autocomplete="off" />
									<button  data-toggle="modal" class="btn btn-default" data-target="#myModal" >Check</button>
									</td></tr>
	<!--sub>danata username eka validate karanne na. ekata UI ekak dala availability check karanna oni</sub-->
	
	<?php
	switch ($newUserType) {
	case 'cust': echo"<title>New customer</title>"; 
		customer();break;
	
	case 'salex': echo"<title>New Sales executive</title>";
		salesEx();break;
	
	case 'dealer': echo"<title>New Dealer</title>";
		dealer();break;
	
	case 'suppl': echo"<title>New Supplier</title>";
		supplier();break;
	case 'ks':
		break;
	
	default:
		break;
}
	?>
	
	
	<tr><td><input type="submit" name="" value="OK" onclick="return confirmI();" /></td>	<td><input type="reset" value="Clear" /></td></tr>
</table>
</form>
</center>

<ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
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
  
  <div class="modal fade" id="myModal">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 style="color: black;font-style: italic;font-weight:500">Login</h3>
         
          </div>
          <div class="modal-body">
            <form method="post" action="php/user.php" name="login_form">
              <p><input  style="color: black;font-style: italic;font-weight:500" type="text" class="span3" name="euname" id="username" placeholder="UserName" required></p>
              <p><input  style="color: black;font-style: italic;font-weight:500" type="password" class="span3" name="passwd" placeholder="Password" required></p>
              <p><button type="submit" class="btn btn-primary">Sign in</button>
                <a  style="color: black;font-style: italic;font-weight:500" href="#">Forgot Password?</a>
              </p>
            </form>
          </div>
          <div class="modal-footer">Not Registerd? <a href="#" class="btn btn-primary">Register</a></div>
        </div>


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

</body>
</html>



<?php
 
 /*
$newUserType = $_POST['utype'];
$fnm=$_POST['fname'];
$lnm=$_POST['lname'];
$username=$fnm.$lnm; //username eka unique, PK. 

$em=$_POST['eml'];
$adr=$_POST['addr'];
$phn=$_POST['telp'];*/

//in case of redirection
function fillForm($field){ //field == text box name
	if(isset($_GET[$field])){ //
		//header("Location: index.php");
		echo $_GET['$field'];
	}
}
function customer(){
	echo "<tr><td>Company</td>		<td><input type='text' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Customer' disabled/>";
	//echo "<td><input type='text' name='utype0' value='Customer' hidden/>"; //for user type
}

function salesEx(){
	//echo "<tr><td>Company</td>	<td><input type='text' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Sales Executive' disabled/>";
}

function supplier(){
	echo "<tr><td>Brand</td>		<td><input type='text' name='brnd' autocomplete='on' required/></td></tr>";
	echo "<tr><td>Country</td>		<td><input type='text' name='cont' autocomplete='on' required/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Supplier' disabled/>";
}

function dealer(){
	echo "<tr><td>Shop name</td>		<td><input type='text' name='shopnm' required/>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Dealer' disabled/>";
}

?>