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
<?php include '../../assets/missingfield.php'?>
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
        <li  class=" treeview">
          <a href="dashbord.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>
       
        <li class="treeview ">
                <li class="treeview " >
          <a href="#">
            <i class="fa fa-edit" ></i> <span >Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="neworder.php"><i class="fa fa-circle-o active " style="color:aliceblue;"></i><span style="color:aliceblue;">New Order</span></a></li>
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
          <ul class="treeview-menu">
            <li><a href="newinvoice.php"><i class="fa fa-circle-o "></i> New Invoice</a></li>
            <li><a href="#"><i class="fa fa-circle-o" style="color:aliceblue;"></i> <span style="color:aliceblue;">Customer Invoice</span></a></li>
            <li><a href="findinvoice.php"><i class="fa fa-circle-o"></i> Find Invoice</a></li>
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
   <h1>
        New Customer Invoice
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Invoice</a></li>
          <li class="active"><a href="#"><i class="fa"></i> Customer Invoice</a></li>
       
      </ol>
    </section>
<div class="box">
    		
    	</div>
     <section class="content ">
  <form id="maininvoiceform">
	<div class="form-group  ">
  		<label class="col-md-4 control-label">First Name</label>  
  	<div class="col-md-4">
  		<input id="textinputfname"  type="text" placeholder="Full Name" class="form-control input-md" required="">
    
 	 </div>
   	<div class="col-xs-1 control-label">
	   <label  style="margin-left: 50px" id="date">Date</label></div>
	   <!-- display date-->
		<div class="col-xs-2 control-label"><label id="date"></label></div>
	  <script>
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  document.getElementById("date").innerHTML = y + "/" + m + "/" + d;
		</script>
  
	  </div></br></br></br>
 <div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label>  
  <div class="col-md-4">
  <input id="textinputlname"  type="text" placeholder="Last Name" class="form-control input-md" required="">
    
  </div>
  
</div>
 </br></br>
 
 <div class="form-group">
  <label class="col-md-4 control-label" >Contact</label>  
  <div class="col-md-4">
  <input id="textinputcontact"  min=10 max=10 ="text" placeholder="Contact No" class="form-control input-md" required="">
    
  </div>
  
</div>
</br></br>

 <!-- invoice items pannel starts here-->
  <div class="row">
        <div  class="col-xs-3" style="width: auto;">
          <div class="box pull-left" >
            <div class="box-header">
              <h3 class="box-title">Invoice Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class="table-bordered table-hover" width="600" >
                <thead>
                <tr>
                 <th><input type=checkbox></th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price(Rs.)</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
               
                <tbody>
                                 
                </tbody>
                
              </table>
            </div>
            <div class="box-footer">
            <div class="row">
            <div class="col-md-3">
            	<button type="button" class="btn btn-danger" style="width: 153px" onClick="removeall()">Remove All Items</button>
            	</div>
            	<div class="col-md-3 pull-right" id="subtotal">
            		<label class="pricelabel" id="subtotal"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Sub Total</strong>
				</div>
				</div></br>
            	<div class="row">
            		<div class="col-md-3 pull-right">
            		<select class="form-control" id="discount">
            			<option value=".1">10%</option>
            			<option value=".15">15%</option>
            		</select>
            	</div>
            	<div class="col-md-3">
            	<button type="button" class="btn btn-warning" style="width: 153px">Remove Selected Item</button>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Discount Type</strong>
            	</div>
            	</div></br>
            	<div class="row">
            		<div class="col-md-3 pull-right">
            		<label class="pricelabel " id="dis"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Discount</strong>
            	</div>
            	</div>
            	<div class="row"><div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="a();" style="width: 153px" >Generate Invoice</button>
            	</div>
            		<div class="col-md-3 pull-right">
            		<label class="pricelabel" id="net"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Net Amount</strong>
            	</div>
            	</div>
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
			</form>
			<!-- add tires to invoice pannel goes here-->
<form id="addtiresform" action="#" method="post" class="pull-left">
 <div class="selectitempanal container pull-left">
	 <h4><strong>Add tires</strong></h3>
 	 <div class="row">
 	 <div class="col-xs-6">Brand</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="brand">
        <option value="" >Select</option>
       <option value="Dunlop" >Dunlop</option>
       <option value="Kaizen" >Kaizen</option>
		 </select></div></div></br>
      <div class="row">
 	 <div class="col-xs-6">Country</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="country" >
        <option value="" >Select</option>
       <option value="Japan" >Japan</option>
       <option value="Indonesion" >Indonesion</option>
        <option value="Thaiwan" >Thaiwan</option>
		 </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Tire Size</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="tiresize" >
        <option value="" >Select</option>
        <option value="165R16" >165R16</option>
      </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Quantity</div>
 	 <div class="col-xs-6">
 	<input id="quantity" type="text" placeholder="Quantity" required="" class="form-control input-md">
      </select></div></div></br>
<button type="button" class="btn btn-success" style="width: 70px" onClick="validate();">Add</button>
</br></br>
 </div>
 </form>
 <!-- add tires to invoice pannel concludes here-->
	  </section>
	

	</div>

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
 
<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>   
  
<!-- inline javascript goes here-->
<script>
	function validate(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
		if(x=="" ||y==""||z==""||q=="")
			{
				$('.modal-danger').modal('show');
				 
			}
		else{
			
			$.ajax({
				type:"post",
				url:"assets/loadinvoiceitem.php",
				data:({brand:x,country:y,tiresize:z}),
				success:function(data){
					
				 $('#orderitems').append("<tr class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td></tr>");
				validate.sum+=data*q;
				updatedata();
				}	
			});
		}
	}
	validate.sum=0;
	function updatedata(){
				$("#subtotal").html(validate.sum);
				var discount=validate.sum*document.getElementById('discount').value;	
				$("#dis").html(discount);
				var netamount=validate.sum-discount;
				$("#net").html(netamount);	
	}
	
	function removeall(){

		validate.sum=0;
		$(".table-bordered  .removable").remove();
	}
	function a(){
	//$('#maininvoiceform').on('submit',function(){
		var fn=document.getElementById('textinputfname').value;
		var ln=document.getElementById('textinputlname').value;
		var cn=document.getElementById('textinputcontact').value;
		var tot=document.getElementById('subtotal').textContent;
		var dis=document.getElementById('dis').textContent;
		var net=document.getElementById('net').textContent;
	
	  $.ajax({
		  type:"post",
		  url:"controler/cusinvoicecontroler.php",
		  data:({fname:fn,lname:ln,contact:cn,total:tot,discount:dis,netamount:net}),
		  success:function(data){
			  alert(data);
		  }
	  });
	}//);
	
	$('#discount').on('change',function(){
		updatedata();
	});
	
</script>

  



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
