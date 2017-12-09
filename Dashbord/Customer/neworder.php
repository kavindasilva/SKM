<head>
	 <link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
</head>
<body>
 <!--already in the order error-->
   <div class="modal fade modal-danger" id="allreadyin" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<h4>This item is already in the order</h4>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-sm btn-warning" data-dismiss="modal" style="width: 70px;">OK</button>
        </div>
      </div>
    </div>
  </div>      
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
<?php require_once('../../php/dbcon.php')?>
<?php include '../../assets/missingfield.php'?>
<?php include '../../assets/outofstock.php'?>
<?php include '../../assets/noowner.php'?>
<?php include '../../assets/success.php'?>           
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
  <form id="maininvoiceform" class="form-inline">
  <div class="form-group" data-aos="zoom-out-right">
					<label for="sordno">Sales Order No</label>
					<input  class="form-control" id="sordno" disabled value="
		 	
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
	<div class="form-group">
	   <!-- display date-->
		<div class="col-xs-2 control-label pull-right" data-aos="zoom-out-left"><label id="date"></label></div>
		  <script>
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  document.getElementById("date").innerHTML ="Date:"+ y + "/" + m + "/" + d;
		</script>
	  </div></form></br></br>
   <!-- invoice items pannel starts here-->
  <div class="row">
        <div  class="col-xs-3 pull-right" style="width: auto; margin-right: 50px;" data-aos="zoom-out-left">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Order Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
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
          		
				</div></br>
            
            	<div class="col-md-3 ">
            	<button type="button" class="btn btn-warning" onClick="removeselected();" style="width: 153px" >Remove Selected</button>
            	</div>
			
            	<div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="customerplaceorder();" style="width: 153px" >Place Order</button>
            	</div>
            	</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
			
			<!-- add tires to invoice pannel goes here-->
<form id="addtiresform" action="#" method="post" class="pull-left" data-aos="zoom-out-right">
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
 	<input id="quantity" type="text" placeholder="Quantity" required="" class="form-control input-md">
      </select></div></div></br>
<button type="button" class="btn btn-success" style="width: 70px" onClick="validate();">Add</button>
</br></br>
 </div>
 </form>
 <!-- add tires to invoice pannel concludes here-->
	  </section> 
<script src="../../js/formcontrol.js?2"></script>
<script>
    AOS.init();
 </script>
</body>
</html>