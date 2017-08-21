<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
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
  <!-- /.content-wrapper -->
</div>
</body>
</html>