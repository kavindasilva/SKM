 <?php
require_once('../../php/dbcon.php');
session_start();
$query="SELECT r_id FROM customer WHERE user_user_name='".$_SESSION['currentuser']."';";
$result=mysqli_query($conn,$query);	
if($result){
$row=mysqli_fetch_array($result);
$rid=$row['r_id'];
}
$query="SELECT * FROM quotation WHERE regular_customer_r_id='".$rid."' && status='replied';";
$result=mysqli_query($conn,$query);
?>
<body>

	<section class="content-header">
   <h1>
        Quotation Replies
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Quotations</a></li>
          <li class="active"><a href="#"><i class="fa"></i>Quotation replies</a></li>       
      </ol>
	</section>  
   <div class="box">   		
    	</div>
           <section class="content ">
           <?php
			 while($row=mysqli_fetch_array($result)){ 
			   
			   ?>
           <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Quotation Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="quotationitems" class="table-bordered table-hover" width="100%" >
                <thead>
                <tr>
                  <th><input type="checkbox" id="addall"  data-toggle="tooltip" data-placement="top" title="Select all items"></th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price </th>
                  <th>Quantity</th>
                  <th>Discount amount</th>
                  <th>Discount(%)</th>
                </tr>
                </thead>
                <tbody id="orderitembody"> 
                <?php

$query2="SELECT * FROM quotation_item WHERE q_no='".$row['q_no']."';";
	$result2=mysqli_query($conn,$query2);
	while($row2=mysqli_fetch_array($result2)){
		$innerquery="SELECT * FROM tire WHERE t_id='".$row2['tire_t_id']."';";
		$innerresult=mysqli_query($conn,$innerquery);	
		$innerrow=mysqli_fetch_array($innerresult);
		echo "<tr class=\"removable \"><td><input type=\"checkbox\"></td><td>".$innerrow['brand_name']."</td><td>".$innerrow['country']."</td><td>".$innerrow['tire_size']."</td><td class=\"up\">".$innerrow['unit_price']."</td><td>".$row2['quantity']."</td><td class=\"disamount\">".$row2['discount_amount']."</td><td>".$row2['discount']."</td></tr>";
	}
			 

?>
                                                
                </tbody>
				</table>
            <div class="box-footer">
            	<button data-toggle="collapse" class="btn btn-sm btn-success" data-target="#demo">Make an order</button></br></br>
            	<div id="demo" class="collapse">
            	<form class="form-inline">
				  <div class="form-group">
					<label for="subtotal">Sub Total</label>
					<input  class="form-control" id="subtotal" disabled>
				  </div>
				  <div class="form-group">
					<label for="Discount">Discount</label>
					<input  class="form-control" id="Discount" disabled>
				  </div>
				  <div class="form-group">
					<label for="netamount">Net Amount</label>
					<input class="form-control" id="netamount" disabled>
				  </div>
				  
				</form><br>
				<button class="btn btn-default btn-success">Place order</button>	
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			</div>
			<?php } ?><!-- do not delete this line -->
			</section> 
</body>	
<script>
$('#addall').change(function(){
		if(this.checked){
			$('#orderitembody tr td input').prop("checked", true);
		}
		else{
			$('#orderitembody tr td input').prop("checked", false);
		}
	});
	</script>		