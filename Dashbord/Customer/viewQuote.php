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
<?php include '../../assets/missing.php'?>  
<?php include '../../assets/success.php'?> 
<head>
	<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
</head>
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
           <div class="box" data-aos="flip-down">
            <div class="box-header">
              <h3 class="box-title">Quotation Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="quotationitems" class="table-bordered table-hover" width="100%" >
                <thead>
                <tr>
                  <th><input type="checkbox"  id="addall" name="<?php echo $row['q_no']?>" data-toggle="tooltip" data-placement="top" title="Select all items"></th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price </th>
                  <th>Quantity</th>
				  <th>Status</th>
                  <th>Discount amount</th>
                  <th>Discount(%)</th>
                </tr>
                </thead>
                <tbody id="orderitembody<?php echo $row['q_no']?>"> 
                <?php

$query2="SELECT * FROM quotation_item WHERE q_no='".$row['q_no']."';";
	$result2=mysqli_query($conn,$query2);
	while($row2=mysqli_fetch_array($result2)){
		$innerquery="SELECT * FROM tire WHERE t_id='".$row2['tire_t_id']."';";
		$innerresult=mysqli_query($conn,$innerquery);	
		$innerrow=mysqli_fetch_array($innerresult);
		if($innerrow['quantity']>=$row2['quantity']){
			$status='Available';
			echo "<tr class=\"removable\"><td><input type=\"checkbox\" onChange=\"additem(this);\"></td><td>".$innerrow['brand_name']."</td><td>".$innerrow['country']."</td><td>".$innerrow['tire_size']."</td><td class=\"up\">".$innerrow['unit_price']."</td><td>".$row2['quantity']."</td><td>$status</td><td class=\"disamount\">".$row2['discount_amount']."</td><td>".$row2['discount']."</td></tr>";
		}
		else{
			$status='Unavailable';
		
		echo "<tr class=\"removable bg-danger\"><td><input type=\"checkbox\" onChange=\"additem(this);\"></td><td>".$innerrow['brand_name']."</td><td>".$innerrow['country']."</td><td>".$innerrow['tire_size']."</td><td class=\"up\">".$innerrow['unit_price']."</td><td>".$row2['quantity']."</td><td>$status</td><td class=\"disamount\">".$row2['discount_amount']."</td><td>".$row2['discount']."</td></tr>";}
	}
			 

?>
                                                
                </tbody>
				</table>
            <div class="box-footer">
            	<button data-toggle="collapse" class="btn btn-sm btn-success" data-target="#<?php echo $row['q_no']?>">Make an order</button></br></br>
            	<div id="<?php echo $row['q_no']?>" class="collapse">
            	<form class="form-inline">
            	  <div class="form-group">
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
					<label for="subtotal">Sub Total</label>
					<input  class="form-control" id="subtotal" disabled>
				  </div>
				  <div class="form-group">
					<label for="Discount">Total Discount</label>
					<input  class="form-control" id="Discount" disabled>
				  </div>
				  <div class="form-group">
					<label for="netamount">Net Amount</label>
					<input class="form-control" id="netamount" disabled>
				  </div>
				  
				</form><br>
				<button class="btn btn-default btn-success" id="placeorder" name="<?php echo $row['q_no']?>">Place order</button>	
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
var subtotal=0;
var discount=0;
var netamount=0;
function updatedata(){
	$('#subtotal').val(subtotal);
	$('#Discount').val(discount);
	$('#netamount').val(netamount);
	
}	
$('#addall').change(function(){
		if(this.checked){
			$("#orderitembody"+this.getAttribute('name')+" tr td input").prop("checked", true);
		}
		else{
			$("#orderitembody"+this.getAttribute('name')+" tr td input").prop("checked", false);
		}
	});
function  additem(element){
	var row=element.parentElement.parentElement;
	if(element.checked){
			
			subtotal=subtotal+parseInt(row.getElementsByTagName('td')[4].innerHTML);
			discount=discount+parseInt(row.getElementsByTagName('td')[7].innerHTML);
			netamount=subtotal-discount;
			
		}
		else{
			subtotal=subtotal-parseInt(row.getElementsByTagName('td')[4].innerHTML);
			discount=discount-parseInt(row.getElementsByTagName('td')[7].innerHTML);
			netamount=subtotal-discount;
		}
	updatedata();
}
$('#placeorder').click(function(){
	var sordno=$('#sordno').val();
	var qno=this.getAttribute('name');
	if(subtotal==0){
		document.getElementById('message').innerHTML="Please add one or more items to order";
		$('#modal-missing').modal('show');
	}
	else{
	 $.ajax({
		  type:"post",
		  url:"controler/cusorderbycuscontroler.php",
		  data:({total:subtotal,sordno:sordno,qno:qno}),
		  success:function(data){
			
		
		  }
	  });
			var rowarray=document.getElementById('quotationitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			var rows=rowarray.length;
			for(var i=0;i<rows;i++){
				
				if(!(rowarray[i].getElementsByTagName('td')[0].firstChild.checked)){
					continue;
				}
				brand=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[3].innerHTML;
				qty=rowarray[i].getElementsByTagName('td')[5].innerHTML;
				status=rowarray[i].getElementsByTagName('td')[6].innerHTML;
				discount=rowarray[i].getElementsByTagName('td')[8].innerHTML;
			$.ajax({
				  type:"post",
				  url:"controler/cusorderbycusitemcontroler.php",
				  data:({sordno:sordno,brand:brand,country:country,tiresize:tiresize,qty:qty,status:status,discount:discount}),
				  success:function(data){
					 
					//  alert(data);
			 
		  							}
	  });
				
			}
		document.getElementById('message').innerHTML="Your order successfull";
		$('#modal-success').modal('show');
	}
});	
	 AOS.init();
	</script>		