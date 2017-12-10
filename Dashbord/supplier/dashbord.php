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
         
          <li class="active"><a href="index.php"><i class="fa"></i>Qutation Requests</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="sup_dashbord_div">
<ul id="quotation">


<?php

    $pr_no_quary="SELECT pr_no,`import_manager_employee_e_id`,`date` FROM purchase_requisition WHERE supplier_s_id=$sup_id AND status='pending'";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);
    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        $emp_name_quary="SELECT user_user_name FROM employee WHERE e_id=$pr_no_row[1]";
        $emp_name=mysqli_fetch_row(mysqli_query($conn,$emp_name_quary));
        echo ("
            <a href=\"#\"><li value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$emp_name[0]." (".$pr_no_row[2].")
                    </li></a>
            ");
    }

               ?>

</ul>

</div>
<div class="col-md-9 col-sm-12 " id="dash_tbl_div">
    <!-- quotation request item details will load here-->
    <div class="box-body">
        <table class="table-bordered table table-hover" width="100%">
            <thead>
            <tr><th>Tire id</th><th>Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th><th>Total Price</th></tr>
            </thead>
            <tbody id="rr_table"></tbody>
        </table>
    </div>

    <!--    <center><h3 style="margin-top: 50px;">Select a received requisition</h3></center>-->
</div>
<script>

    $('#sup_dashbord_div ul a').click(function(){
        $('#dash_tbl_div').children('tr').remove();
        $.ajax({
            type:"post",
            data:({pr_no:this.firstChild.value}),
            url:"dashbord_quary.php",
            success:function(data){

                alert(data);


            }
        });

        // $('#quotation a').removeClass("goingtorm");
        //$(this).addClass('goingtorm');
        //$('#qrdetails').load('quotationreqdetails.php')

    });

</script>