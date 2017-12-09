<?php
//header
require_once "head.php";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>
	Select an action<br/>
<div class="">

	<!-- kalin dala thibba buttin 4 --
	<a href="adduser.php?type=cust"><button class="list-group-item" name="" value="">Customer</button></a>
	<a href="adduser.php?type=salex"><button class="list-group-item" name="" value="">Sales Executive</button></a>
	<a href="adduser.php?type=dealer"><button class="list-group-item" name="" value="">Dealer</button></a> 
	<a href="adduser.php?type=suppl"><button class="list-group-item" name="" value="">Supplier</button></a-->
	
	   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
            
              <span class="info-box-text">Users</span>
            </div>
            <!-- /.info-box-content -->
          </div>
			<a href="adduserType.php"><button class="form-control dashbordbtn" >New user</button></a>
			<a href="viewAll.php" name="findorder"><button class="form-control dashbordbtn" >View All</button></a>
			<a href="viewAll.php?type=cus" name="findorder"><button class="form-control dashbordbtn" >View customer</button></a>
			<a href="viewAll.php?type=deal" name="findorder"><button class="form-control dashbordbtn" >View dealer</button></a>
			<a href="viewAll.php?type=sup" name="findorder"><button class="form-control dashbordbtn" >View supplier</button></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>

            <div class="info-box-content">
        
              <span class="info-box-text">Employees</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  
		  <a href="viewMgr.php?empT=mgr"><button class="form-control dashbordbtn" ></i>View managers</button></a>
		  <a href="adduser.php?type=salex"><button class="form-control dashbordbtn" >Add new sales-Executive</button></a>
		  <a href="viewMgr.php?empT=sales"><button class="form-control dashbordbtn" >View sales-Executive</button></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!--div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">MailBox</span>
            </div>
            <!-- /.info-box-content ->
          </div>
          <!-- /.info-box ->
        </div-->
		
		
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Reports</span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  <a href="viewMgr.php?empT=sales"><button class="form-control dashbordbtn" >Customers</button></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

</div>
<!--form method="get" action="">
<input ty />
</form-->
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


?>