<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<?php require_once('../../php/dbcon.php')?>
<?php include '../../assets/missingfield.php'?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <h1>
        New Order
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Invoice</a></li>
          <li class="active"><a href="#"><i class="fa"></i> New Order</a></li>       
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content ">
  <form id="maininvoiceform">
	<div class="form-group">
 		 <div class="row">
      		<strong class="col-xs-2">Dealer Shop Name </strong>
      	
      	<div class="col-xs-2">
 	<select class="form-control" id="shopname" >
        <option value="" >Select</option>
       <?php
	$query="select shop_name from dealer";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['shop_name']."\" >".$row['shop_name']."</option>";
	}
	
	?>
      		 </select>
		 </div>
		 <strong class="col-xs-1">or </strong>
		 <strong class="col-xs-2">Customer Company Name </strong>
      	
      	<div class="col-xs-2">
 		<select class="form-control" id="companyname" >
        <option value="" >Select</option>
       <?php
	$query="select company_name from customer";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['company_name']."\" >".$row['company_name']."</option>";
	}
	
	?>
      		 </select>
		 </div>
		 
	   <!-- display date-->
		<div class="col-xs-2 control-label" style="margin-left: 10px;"><label>Date : </label><label id="date"></label></div>
	 </div>
	  <script>
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  document.getElementById("date").innerHTML = y + "/" + m + "/" + d;
		</script>
	  </div></br></br>
   <!-- invoice items pannel starts here-->
  <div class="row">
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
            <div class="box-footer">
            <div class="row">
              	<div class="col-md-3 pull-right" id="subtotal">
            		<label class="pricelabel" id="subtotal"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Sub Total</strong>
				</div>
          		
           		<div class="col-md-3">
            	<button type="button" class="btn btn-danger" onClick="removeall();" style="width: 153px" >Remove All items</button>
            	</div>
				</div></br>
            
            	<div class="row">	
            	<div class="col-md-3">
            	<button type="button" class="btn btn-warning" onClick="" style="width: 153px" >Remove Selected</button>
            	</div>
				</div></br>
            	<div class="row">	
            	<div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="a();" style="width: 153px" >Place Order</button>
            	</div>
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
 <div class="selectitempanal container" style="margin-left: 15px;">
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
        174R98<option value="165R16" >174R98</option>
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
<script src="../../js/formcontrol.js"></script>
</body>
</html>