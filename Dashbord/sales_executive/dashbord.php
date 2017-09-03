<section class="content-header">
   <h1>Dashbord</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
          <li class="active"><a href="#"><i class="fa"></i>Dashbord</a></li>
      </ol>
    </section>
     <div class="box">
      	</div>
    <div style="padding:7px; " class="container">
<!--main menu item goes here-->    
   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
            
              <span class="info-box-text">Order</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>

            <div class="info-box-content">
        
              <span class="info-box-text">Invoice</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">MailBox</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Reports</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
<!--main menu item concludes here-->  
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('neworder');">New order</button></br>
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('findorder');" >Find order</button>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('newinvoice');">New Invoice</button></br>
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('findinvoice');">Find Invoice</button>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<button class="form-control dashbordbtn" name="neworder">Inbox</button></br>
		
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<button class="form-control dashbordbtn" name="neworder">Monthly sales Report</button></br>
		<button class="form-control dashbordbtn" name="neworder">Outstandings Report</button>
	</div>
</div>
<!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

	</div>

<script src="../../js/Chart.min.js"></script>	