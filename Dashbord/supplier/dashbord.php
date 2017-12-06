<?php
session_start();
require_once('../../php/dbcon.php');
$query1="SELECT s_id FROM supplier WHERE user_user_name='".$_SESSION['currentuser']."';";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result);
$query="SELECT * FROM quotation WHERE supplier_s_id='".$row['s_id']."';";
$result=mysqli_query($conn,$query);	
?>
  <section class="content-header">
   <h1>
       Purchase Requests
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         
          <li class="active"><a href="#"><i class="fa"></i>Purchase Requests</a></li>       
      </ol>
</section></br>
<div class="col-md-3" id="quotationreqdiv">
<ul id="quotation">

<?php
				while($row=mysqli_fetch_array($result)){//show details about purchase requesition
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