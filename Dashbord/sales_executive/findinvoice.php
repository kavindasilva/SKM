<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SKMM| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../icon/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/skmlogo.jpg" style="height:50px;" alt="User Image"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><img src="../../images/skmlogo.jpg" style="height:50px;" alt="User Image"><b>Dunlop</b></span>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user8-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
        
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../images/user8-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../images/user8-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                  Sales-Executive
                 <small>S.K.Munasinghe Motors</small>
                </p>
              </li>
         
                     <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
				 
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../../images/user8-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        <li  id="dd"class="treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>
       
        <li class="treeview">
                <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> New Order</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Find Order</a></li>
           </ul>
        </li>
        <li class="treeview menu-open active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li><a href="newinvoice.php"><i class="fa fa-circle-o" ></i> New Invoice</span></a></li>
            <li><a href="newcusInvoice.php"><i class="fa fa-circle-o" ></i> <span >Customer Invoice</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o" style="color:aliceblue;"></i> <span style="color:aliceblue;">Find Invoice</span></a></li>
          </ul>
        </li>
    
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                </li>
           
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <h1>Find Invoice</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Invoice</a></li>
          <li class="active"><a href="#"><i class="fa"></i>Find Invoice</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
    	<div class="box">
      	</div>
      	<div class="filters" style="padding-bottom: 20px;" >
			<strong ><h4><i class="fa fa-filter"  aria-hidden="true">   Filters</i></h4></strong></br>
      	<div class="row margin" >
      		<strong class="col-xs-2">Dealer Shop Name </strong>
      	
      	<div class="col-xs-2" style="width: 250px;">
 	<select class="form-control" >
        <option value="" >Select</option>
      		 </select>
		 </div>
		 <strong class="col-xs-1">or </strong>
		 <strong class="col-xs-2">Regular Customer Company Name </strong>
      	
      	<div class="col-xs-2 " style="width: 250px;">
 	<select class="form-control" >
        <option value="" >Select</option>
      		 </select>
		 </div>
		 <button class="col-xs-1 btn btn-success" type="button"><i class="fa fa-search" aria-hidden="true"></i>
 Search</button>
		 </div>
		 <div class="row margin">
		 <div class="col-sm-2">
      		<strong>From Date</strong>
      	</div>
      	<div class="col-sm-2">
		 	<?php include '../../assets/datetimepicker.php';?>		
		 	</div>
		 	<div class="col-sm-2" style="margin-left:162px;">
      		<strong>To Date</strong>
      	</div>
      	<div class="col-sm-2">
		 	<?php include '../../assets/datetimepicker.php';?>		
		 	</div>	 	 
		 </div>
		  </div>
	  </br>
		 <div class="row">
		  <div  class="col-xs-12" style="width: auto; margin-left: 72px">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Invoice Found</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class=" table-bordered table-hover" width="920" >
                <thead>
                <tr>
                  <th>SOrdNo</th>
                  <th>Date</th>
                  <th>Total Amount(Rs.)</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
                  <td>0152</td>
                  <td>2017/6/28
                  </td>
                  <td>25000</td>
                 
                </tr>
                
                </tbody>
                
              </table>
            </div>
                    <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
			 </div>
						 
	  </br>
		  <div class="row">
        <div  class="col-xs-12" style="width:auto; margin-left: 72px">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Invoice Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class=" table-bordered table-hover" width="920" >
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price(Rs.)</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Dunlop</td>
                  <td>195R16
                  </td>
                  <td>20</td>
                 
                </tr>
                
                </tbody>
                
              </table>
            </div>
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
			</form>
	  </section>
	

	</div>
		
    </div>
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

<!-- jQuery 3.1.1 in case of error in js uncomment this script
<script src="../../js/jquery-3.1.1.min.js"></script>-->
<!-- Bootstrap no need 3.3.7 -->
<script src="../../js/bootstrap.min.js"></script>
<!-- FastClick no need -->
<script src="../../js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../js/demo.js"></script>

</body>


</html>
