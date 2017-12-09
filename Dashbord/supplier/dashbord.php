<?php
session_start();
require_once('../../php/dbcon.php');
$sup_quary="SELECT s_id FROM supplier WHERE user_user_name='".$_SESSION['currentuser']."';";
$sup_id=mysqli_fetch_row(mysqli_query($conn,$sup_quary))[0];
//$row=mysqli_fetch_array($result);
//$query="SELECT * FROM quotation WHERE supplier_s_id='".$row['s_id']."';";
//$result=mysqli_query($conn,$query);
?>
  <section class="content-header">
   <h1>
       Qutation Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         
          <li class="active"><a href="#"><i class="fa"></i>Qutation Requests</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="quotationreqdiv">
<ul id="quotation">


<?php

    $pr_no_quary="SELECT pr_no FROM purchase_requisition WHERE supplier_s_id=$sup_id";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);
    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        echo ("
            <a href=\"#\"><li value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$pr_no_row[0]."
                    </li></a>
            ");
    }

//				while($pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))){//show details about purchase requesition
//				echo("
//                     <a href=\"#\"><li value=\"".$pr_no[0]."\">
//                      <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$pr_no[0]."
//                    </li></a>
//                  ");
//
//				}
//                 ?>
</ul>
</div>    