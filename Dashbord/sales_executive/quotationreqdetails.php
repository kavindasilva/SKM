 <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Quotation Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="quotationitems" class="table-bordered table-hover" width="100%" >
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price </th>
                  <th>Quantity</th>
                  <th>Discount amount</th>
                  <th>Discount</th>
                </tr>
                </thead>
                <tbody> 
                <?php
require_once('../../php/dbcon.php');
session_start();


$query2="SELECT * FROM quotation_item WHERE q_no='".$_SESSION['qno']."';";
	$result2=mysqli_query($conn,$query2);
	while($row2=mysqli_fetch_array($result2)){
		$innerquery="SELECT * FROM tire WHERE t_id='".$row2['tire_t_id']."';";
		$innerresult=mysqli_query($conn,$innerquery);	
		$innerrow=mysqli_fetch_array($innerresult);
		echo "<tr class=\"removable \"><td>".$innerrow['brand_name']."</td><td>".$innerrow['country']."</td><td>".$innerrow['tire_size']."</td><td class=\"up\">".$innerrow['unit_price']."</td><td>".$row2['quantity']."</td><td class=\"disamount\">0</td><td><select class=\"selectdis\" style=\"width:100px;\"><option value=\"5\">5%</option><option value=\"10\">10%</option><option value=\"15\">15%</option><option value=\"20\">20%</option></select></td></tr>";
	}


?>
                                                
                </tbody>
              </table>
            <div class="box-footer">
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			</div>
			<div class="form-group col-md-12 ">
  				<label for="comment">Quotation Note:</label>
  				<textarea class="form-control" rows="5" id="qnote" disabled>
  					<?php
					$query="SELECT * FROM QUOTATION WHERE q_no='".$_SESSION['qno']."';";
					$result=mysqli_query($conn,$query);	
					$row=mysqli_fetch_array($result);
					echo $row['quotation_note'];
					?>
  				</textarea>
			</div>
			<div class="col-md-2 col-sm-5">
            	<button type="button" class="btn btn-primary" onClick="sendquotation();"  >Send Quotation</button>
            	</div>
           <div class="col-md-2 col-sm-5">
            	<button type="button" class="btn btn-warning" onClick="markasread();"  >Mark As Sent </button>
            	</div> 
            	
<script>
	function sendquotation(){
		$.ajax({//updating the stasus to replied in quotation table
			type:"post",
			url:"model/updatequotation.php",
			success:function(data){
				//alert(data);
			}
		});
		var row = document.getElementById('quotationitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
		
		for(var i=0;i<row.length;i++){//updating the discount and discount amount fields in quotation_item table
			
		$.ajax({
			type:"post",
			url:"model/updateqoutationitem.php",
			data:{'discount':row[i].getElementsByTagName('select')[0].value,discountamount:row[i].getElementsByClassName('disamount')[0].innerHTML},
			success:function(data){
				//alert(data);
			}
		});
		}
		   document.getElementById('message').innerHTML="Your Quotation reply successfully sent to the customer";
		   $('#modal-success').modal('show');
           $('.goingtorm').remove(); 
		 	document.getElementById('notificationc').innerHTML=parseInt(document.getElementById('notificationc').innerHTML)-1;
		document.getElementById('notic').innerHTML=parseInt(document.getElementById('notic').innerHTML)-1;
		document.getElementById('qrdetails').innerHTML="<center><h3 style=\"margin-top: 50px;\">Select a quotation request to view detatils</h3></center>";
		
       
	}
	function markasread(){
		 $('.goingtorm').remove(); 
		 	document.getElementById('notificationc').innerHTML=parseInt(document.getElementById('notificationc').innerHTML)-1;
		document.getElementById('notic').innerHTML=parseInt(document.getElementById('notic').innerHTML)-1;
     	document.getElementById('qrdetails').innerHTML="<center><h3 style=\"margin-top: 50px;\">Select a quotation request to view detatils</h3></center>";
	}
	$('.selectdis').on('change',function(){
		var up=this.parentElement.parentElement.getElementsByClassName('up')[0].innerHTML;
		var dis=this.parentElement.parentElement.getElementsByTagName('select')[0].value;
		var discountamount=up*dis/100;
		this.parentElement.parentElement.getElementsByClassName('disamount')[0].innerHTML=discountamount;
	})
</script>            		