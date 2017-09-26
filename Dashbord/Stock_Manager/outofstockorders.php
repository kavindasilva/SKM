<?php include('../../assets/orderdetailsmodal.php');?>
  <section class="content-header">
   <h1>
        Out of Stock Orders
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Notifications</a></li>
          <li class="active"><a href="#"><i class="fa"></i>Out of Stock Orders</a></li>       
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content ">
         <div  class="col-xs-12 col-md-12" style="width: auto; margin-right: 50px;">
          <div class="box" >
            <div class="box-body" id="tablebody">
              <table id="orderitems" class="table-bordered table-hover" width="860" >
                <thead>
                <tr>
                  <th>Sales Order Number</th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Available Quantity</th>
                  <th>Ordered Quantity</th>
                  <th>Request Amount</th>
                  <th >Action To perform</th>
                </tr>
                </thead>
                <tbody>
<?php				
					require_once '../../php/dbcon.php';
					$query="SELECT * FROM order_item WHERE status='unavailable';";
					$result2=mysqli_query($conn,$query);
					if($result2){
					while($row=mysqli_fetch_array($result2)){
						//taking the tire details from the tire id
						$query3="SELECT * FROM tire WHERE t_id=".$row['tire_t_id'];
						$resultinside=mysqli_query($conn,$query3);
						$rowinside=mysqli_fetch_array($resultinside);
						echo "<tr class=\"backred\"><td>".$row['sord_no']."</td><td>".$rowinside['brand_name']."</td><td>".$rowinside['country']."</td><td>".$rowinside['tire_size']."</td><td>".$rowinside['quantity']."</td><td>".$row['qty']."</td><td><input type=\"text\" style=\"width:110px;\"></td><td><button class=\"btn btn-success\" style=\"width:80px;\">Request</button><button class=\"btn btn-warning \" style=\"margin-left:10px;\">Order Details</button></td></tr> ";
					}
				}
?>					
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
</section>
<script src="../../js/formcontrol.js?v=4"></script>