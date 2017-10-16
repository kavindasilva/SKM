<!DOCTYPE html>
<html>

<head>
   <?php require_once('../../php/dbcon.php')?>
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--toggal button-->
  <link rel="stylesheet" href="../../assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="../../css/datepicker3.css">
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
      	     	<!--selecting a buyer row-->
      	<div class="row margin col-md-6" >
      		<strong >Dealer Shop Name </strong>  	
      	
		 <div  class="col-xs-7 col-md-7 pull-right" style="padding-right: 30px;">
 	<select class="form-control" id="shopname" >
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
		 </div><br><br><br>
		 <!-- these toggal buttons are used to show completed orders and pending orders-->		 
		
		 <strong style="margin-right: 20px;">
  			Show Completed Orders
		</strong><input  checked data-toggle="toggle" data-size="small" type="checkbox" data-onstyle="success" >
		<strong  style="margin-right: 20px; margin-left: 46px;" >
  			Show Pending Orders
		</strong><input checked data-toggle="toggle" data-size="small" type="checkbox" data-onstyle="success"><br><br>
	  
		 <!-- by clicking on this button orders will show accroding to filters-->
		 <button class="col-xs-6 col-md-3 btn btn-primary" id="searchord" type="button"><i class="fa fa-search" aria-hidden="true"></i>
 			Search</button>
		 </div>

<!--picking a date range picker,we can choos to date of from date or both at once-->
		 <div class="row margin pull-right col-md-5">
		 <div class="col-sm-2 col-md-4">
      		<strong>From Date</strong>
      	 </div>
      	<div class="col-sm-2 col-md-7">
		 	<div class="form-group">
				<div class="input-group date " >
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker"   placeholder="MM/DD/YYYY" >
				</div>
			</div>
		 </div>
		 <div class="col-sm-2 col-md-4">
      		<strong>To Date</strong>
      	</div>
      	<div class="col-sm-2 col-md-7">
		 	<div class="form-group">
				<div class="input-group date ">
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker"   placeholder="MM/DD/YYYY" >
				</div>
			</div>
		 	</div>	 	 
		 </div>

		  </div>
	  </br>
  <!-- found order details are shown in this table-->	  
		 <div class="row">
		  <div  class="col-xs-12" style="width: auto; margin-left: 72px">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Orders Found</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class=" table-bordered table-hover" id="foundorders" width="920" >
                <thead>
                <tr>
                  <th>SOrdNo</th>
                  <th>Dealer/Customer</th>
                  <th>Date</th>
                  <th>Total Amount(Rs.)</th>
                  <th>Status</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
                  <?php
					$query="SELECT * FROM sales_order";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result)){
						if($row['dealer_d_id']==null){
							$query2="SELECT * FROM customer WHERE r_id='".$row['regular_customer_r_id']."';";
							$result2=mysqli_query($conn,$query2);
							$row2=mysqli_fetch_array($result2);
							$dcname=$row2['company_name'];
						}
						else{
							$query2="SELECT * FROM dealer WHERE d_id='".$row['dealer_d_id']."';";
							$result2=mysqli_query($conn,$query2);
							$row2=mysqli_fetch_array($result2);
							$dcname=$row2['shop_name'];
						}
							
						echo("<tr><td>".$row['sord_no']."</td><td>$dcname</td><td>".$row['date']."</td><td>".$row['total_amount']."</td><td>".$row['status']."</td><td><button class=\"btn btn-success viewitems\">View Items</button></td></tr>");
					}
					
					?>
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
  <!-- when clicking on a row of found orders table the items of the selected order will be showing on this table -->	  
		  <div class="row">
        <div  class="col-xs-12" style="width:auto; margin-left: 72px">
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
                  <th>Quantity</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
               
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
<script src="../../assets/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
<script src="../../js/formcontrol.js?2"></script> 
<script src="../../js/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true
    });
  });
$('.viewitems').click(function(){
	var sno=this.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
	$("#orderitems .removable").remove();
	$.ajax({
		type:'post',
		url:"model/loadorderitem.php",
		data:{sno:sno},
		success:function(data){
			$('#orderitems').append(data);
		}
	});
})	;
</script>

</html>