<?php include '../../assets/missing.php'?><head>
	<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
</head>
    
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
         <div  class="col-md-10 col-md-offset-1" data-aos="zoom-out-right" >
          <div class="box" style="overflow-x:auto;" >
            <div class="box-body" id="tablebody">
              <table id="orderitems" class="table-bordered table-hover table" >
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
				$query="SELECT * FROM tire WHERE quantity<20 and status='Available';";
				$result=mysqli_query($conn,$query);	
				if($result){
					while($row=mysqli_fetch_array($result)){
						echo "<form><tr class=\"backred\" id=\"".$row['t_id']."\"><td>".$row['brand_name']."</td><td>".$row['country']."</td><td>".$row['tire_size']."</td><td>".$row['quantity']."</td><td><input type=\"number\" style=\"width:110px;\"></td><td><button class=\"btn btn-success\" >Request</button></td></tr> </form>";
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
 <script>
    AOS.init();
 </script>
 <script>
	 //this handls the action button control of the low stock table
$('#tablebody table tbody tr td button').click(function(){
	var requiredamount=this.parentElement.previousSibling.firstChild.value;
	if(requiredamount!=""){
	$(this).html('<i class="fa fa-check-circle" style="font-size: 18px;" aria-hidden="true"></i>');
	$(this).prop('disabled', true);
	var row=$(this).parent().parent();
	row.removeClass("backred");
	row.addClass("backgreen");
	
	var tid=$(this).parent().parent().attr('id');
	$.ajax({
		url: "modal/requesttire.php",
		method: "POST",
		data: ({tid:tid,requiredamount:requiredamount}),
		success: function(data) {
			
		}

	});}
	else{
		document.getElementById('message').innerHTML="Please enter required quantity";
					   $('#modal-missing').modal('show');

	}
	
});
//this handls the action button order details control of the low stock table
$('#tablebody table tbody tr td :last-child').click(function(){
	//var row=$(this).parent().parent();
	
	$('#orderdetailsmodal').modal('show');
});
</script>
<script src="../../js/formcontrol.js?v=2"></script>