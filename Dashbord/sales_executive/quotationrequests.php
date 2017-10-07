<?php
session_start();
require_once('../../php/dbcon.php');
$query="SELECT * FROM quotation WHERE status='notreplied';";
$result=mysqli_query($conn,$query);	
?>
<body>
	<section class="content-header">
   <h1>
        Quotation requests
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Quotations</a></li>
          <li class="active"><a href="#"><i class="fa"></i> New quotation request</a></li>       
      </ol>
	</section></br></br>
<div class="col-md-3" id="quotationreqdiv">
<ul id="quotation">

<?php
				while($row=mysqli_fetch_array($result)){//show details about quotation requesition
					$query2="SELECT user_user_name FROM customer WHERE r_id='".$row['regular_customer_r_id']."';";
					$resultinside=mysqli_query($conn,$query2);
					$rowinside=mysqli_fetch_array($resultinside);
				echo("
                  
                    <a href=\"#\"><li value=\"".$row['q_no']."\">
                      <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i> Quotation request from ".$rowinside['user_user_name']."
                    </li></a>
                  ");
					  
				}
                 ?>
</ul>
</div>
<div class="col-md-9 col-sm-12" id="qrdetails">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Quotation Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="quotationitems" class="table-bordered table-hover" width="100%" >
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Quantity</th>
                  <th>Discount</th>
                </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            <div class="box-footer">
            <div class="row">
          
            		
            	<div class="col-md-3 col-sm-3">
            	<button type="button" class="btn btn-warning" onClick="removeselected();" style="width: 153px" >Remove Selected</button>
            	</div>
				
              	<div class="col-md-3 col-sm-3">
            	<button type="button" class="btn btn-primary" onClick="sendRequesition();" style="width: 153px" >Send Requesition</button>
            	</div>
				
            	</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			</div>
			<div class="form-group col-md-4 ">
  				<label for="comment">Quotation Note:</label>
  				<textarea class="form-control" rows="5" id="qnote" disabled></textarea>
			</div>
</div>   
</body>
<script>
	$('#quotationreqdiv ul a').click(function(){
		
		$.ajax({
			type:"post",
			data:({qno:this.firstChild.value,action:"qnote"}),
			url:"controler/loadquotation.php",
			success:function(data){
				document.getElementById('qnote').value=data;
				
			}
		});
		$.ajax({
			type:"post",
			data:({qno:this.firstChild.value,action:"qdetail"}),
			url:"controler/loadquotation.php",
			success:function(data){
				$('.removable').remove();
					$('#quotationitems').append(data);
				
			}
		});
	});
</script>
<script src="../../js/formcontrol.js?v=4"></script>