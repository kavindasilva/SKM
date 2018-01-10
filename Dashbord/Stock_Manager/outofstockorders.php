<?php include '../../assets/missing.php'?><head>
	<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
</head>
   
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
         <div  class="col-xs-12 col-md-12" data-aos="fade-down">
          <div class="box" style="overflow-x:auto;">
            <div class="box-body" id="tablebody">
              <table id="orderitems" class="table-bordered table-hover table" >
                <thead>
                <tr>
                  <th>Sales Order Number</th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Supplierble Quantity</th>
                  <th>Ordered Quantity</th>
                  <th>Suggested Request Amount</th>
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
						$suggestedqty=$row['qty']-$rowinside['orderable_qty'];
						echo "<tr class=\"backred\" id=\"".$rowinside['t_id']."\"><td>".$row['sord_no']."</td><td>".$rowinside['brand_name']."</td><td>".$rowinside['country']."</td><td>".$rowinside['tire_size']."</td><td>".$rowinside['orderable_qty']."</td><td>".$row['qty']."</td><td><input type=\"text\" style=\"width:110px;\" value=\"$suggestedqty\"></td><td><button class=\"btn btn-success\" style=\"width:80px;\">Request</button></td></tr> ";
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
	 $('#tablebody table tbody tr td button').click(function(){
	var requiredamount=this.parentElement.previousSibling.firstChild.value;
	if(requiredamount!=""){
		alert(requiredamount);
	$(this).html('<i class="fa fa-check-circle" style="font-size: 18px;" aria-hidden="true"></i>');
	$(this).prop('disabled', true);
	var row=$(this).parent().parent();
	row.removeClass("backred");
	row.addClass("backgreen");
	var sordno=this.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
	var tid=$(this).parent().parent().attr('id');
	$.ajax({
		url: "modal/requesttire.php",
		method: "POST",
		data: ({tid:tid,requiredamount:requiredamount,sordno:sordno}),
		success: function(data) {
			
		}

	});}
	else{
		document.getElementById('message').innerHTML="Please enter required quantity";
					   $('#modal-missing').modal('show');

	}
	
});
	 
	 
	 
    AOS.init();
 </script>
<script src="../../js/formcontrol.js?v=4"></script>