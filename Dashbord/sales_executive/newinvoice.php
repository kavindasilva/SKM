<!DOCTYPE html>
<html>

<head>
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <h1>New Invoice</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Invoice</a></li>
          <li class="active"><a href="#"><i class="fa"></i> New Invoice</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
    	<div class="box">
      	</div>
      		<div class="filters" style="padding-bottom: 20px;" >
			<strong ><h4><b>Select order to invoice</b></h4></strong></br>
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
		 	<div class="form-group">
				<div class="input-group date " style="width: 220px;">
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker"   placeholder="MM/DD/YYYY" >
				</div>
			</div>	
		 	</div>
		 	<div class="col-sm-2" style="margin-left:162px;">
      		<strong>To Date</strong>
      	</div>
      	<div class="col-sm-2">
		 	<div class="form-group">
				<div class="input-group date " style="width: 220px;">
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker"   placeholder="MM/DD/YYYY" >
				</div>
			</div>		
		 	</div>	 	 
		 </div>
		  </div>
		 <div class="row">
		  <div  class="col-xs-12" style="width: auto; margin-left: 72px">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Oredrs Found</h3>
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
			 <div class="row">
		  <div  class="col-xs-12" style="width: auto; margin-left: 72px">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Order Items</h3>
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
                  <th>Quanty</th>
                  <th>Total Amount</th>
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
			 <div class="additempanal">
			 <div class="row">
			 </br><div class="col-xs-3">
			 <button type="button" class="btn btn-success" style="width: 160px; margin-left: 20px">Add Selected Item</button></div>
			 
	  <div class="col-xs-3"><button type="button" class="btn btn-primary" style="width: 160px">Add All Items</button></div>
	<div class="col-xs-3"><button type="button" class="btn btn-warning" style="width: 160px">Remove Selected Item</button></div>
	<div class="col-xs-3"><button type="button" class="btn btn-danger" style="width: 160px">Remove All Items</button></div></br></br></br>
		</div>
		</div>
	  </br>
		  <div class="row">
        <div  class="col-xs-12" style="width:auto; margin-left: 72px">
         <div  class="col-xs-3 pull-right" style="width: auto; margin-right: 50px;">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Order Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class="table-bordered table-hover" width="700" >
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
            			<option value=".20">20%</option>
            		</select>
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
	  </section>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
</div>
</body>
</html>