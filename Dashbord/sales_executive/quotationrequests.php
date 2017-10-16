<?php
session_start();
require_once('../../php/dbcon.php');
$query="SELECT * FROM quotation WHERE status='notreplied';";
$result=mysqli_query($conn,$query);	
?>
<?php include '../../assets/success.php'?> 
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
<div class="col-md-9 col-sm-12 " id="qrdetails">
        <!-- quotation request item details will load here--> 
        <center><h3 style="margin-top: 50px;">Select a quotation request to view detatils</h3></center>
</div>   
</body>
<script>
	
	$('#quotationreqdiv ul a').click(function(){
		
		$.ajax({
			type:"post",
			data:({qno:this.firstChild.value}),
			url:"controler/loadquotation.php",
			success:function(data){
				
			}
		});
		
		$('#quotation a').removeClass("goingtorm");
		$(this).addClass('goingtorm');
		$('#qrdetails').load('quotationreqdetails.php')
		
		});

</script>
<script src="../../js/formcontrol.js?v=4"></script>