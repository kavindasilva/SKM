<section class="content-header">
   <h1>
        Low Stock Items
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Notifications</a></li>
          <li class="active"><a href="#"><i class="fa"></i> Low stock items</a></li>       
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content ">
         <div  class="col-xs-12 col-md-12" style="width: auto; margin-right: 50px;">
          <div class="box" >
            <div class="box-body" id="tablebody">
              <table id="orderitems" class="table-bordered table-hover" width="800" >
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Available Quantity</th>
                  <th>Request Amount</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
<?php
				require_once '../../php/dbcon.php';
				$query="SELECT * FROM tire WHERE quantity<20;";
				$result=mysqli_query($conn,$query);	
				if($result){
					while($row=mysqli_fetch_array($result)){
						echo "<tr class=\"backred\"><td>".$row['brand_name']."</td><td>".$row['country']."</td><td>".$row['tire_size']."</td><td>".$row['quantity']."</td><td><input type=\"text\" style=\"width:110px;\"></td><td><button class=\"btn btn-success\" style=\"width:80px;\">Request</button></td></tr> ";
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
<script src="../../js/formcontrol.js?v=2"></script>