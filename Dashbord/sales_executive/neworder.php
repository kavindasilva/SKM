<!DOCTYPE html>
<html>
<head>
   
    <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   
</head>
<body>
<?php require_once('../../php/dbcon.php')?>
<?php include '../../assets/missingfield.php'?>
<?php include '../../assets/outofstock.php'?>
<?php include '../../assets/noowner.php'?>
<?php include '../../assets/success.php'?>    
   <!-- Update quantity Modal -->
  <div class="modal fade modal-warning" id="updatequantitymodal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
			<h4>Enter your new quantity</h4><input value="" id="newquantity" class="form-control">
        </div>
        <div class="modal-footer">
          <button  class="btn btn-sm btn-default" data-dismiss="modal" style="width: 70px;">Cancle</button>
          <button  class="btn btn-default pull-left btn-sm" data-dismiss="modal" style="width: 70px;" onClick="updatequan();">Update</button>
        </div>
      </div>
    </div>
  </div>       
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
      		<strong class="col-xs-2 col-md-2" >Dealer / Customer Name </strong>
      	
      	<div class="col-xs-5 col-md-3">
 	<select class="form-control" id="shopname">
        <option value="" >Select</option>
       <?php
	$query="select shop_name from dealer";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['shop_name']."\" >".$row['shop_name']."</option>";
	}
	$query="select company_name from customer";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['company_name']."\" >".$row['company_name']."</option>";
	}
	
	?>
      		 </select>
		 </div>
		 <div class="col-md-5">
		 	<strong class="col-xs-6 col-md-4" >Salers Order No </strong>
		 	<input id="sordnodisplay" disabled value="
		 	
		 	<?php
				$query2="SELECT MAX(sord_no) AS maxsno FROM sales_order";
				$result=mysqli_query($conn,$query2);
				$sordno=0;									  
				if($obj=mysqli_fetch_object($result)){
				$sordno=$obj->maxsno;
				$sordno++;	
				}
				echo($sordno);
													  
													  ?>">
		 </div>
		 
	   <!-- display date-->
		<div class="col-xs-2 control-label pull-right" ><label>Date : </label><label id="date"></label></div>
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
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price(Rs.)</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                   <th>Status</th>
				  <th><a href="#" data-toggle="tooltip" data-placement="top" title="Remove all items" onClick="removeall();"><i class="fa fa-trash" aria-hidden="true" style="font-size: 20px;"></i></a></th>
                </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            <div class="box-footer">
            <div class="col-md-12 ">
              	<div class="col-md-12 ">
            		<label class="pricelabel pull-right" id="subtotal"></label>
            		<strong class="pull-right" style="margin-right:5px; margin-top: 5px;">Sub Total</strong>
				</div>
				</div>
			
            	<div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="placeorder();" style="width: 153px" data-toggle="tooltip" data-placement="top" title="Complete the order" >Place Order</button>
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
      </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Quantity</div>
 	 <div class="col-xs-6">
 	<input id="quantity" type="number" placeholder="Quantity" required="" class="form-control input-md">
      </select></div></div></br>
<button type="button" class="btn btn-success" style="width: 70px" onClick="validate();" data-toggle="tooltip" data-placement="top" title="Add item to order">Add</button>
</br></br>
 </div>
 </form>
 <!-- add tires to invoice pannel concludes here-->
	  </section> 
<script src="../../js/formcontrol.js?6"></script>
<script>
$('#addtiresform').bootstrapValidator();
</script>
</body>
</html>