<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/11/2017
 * Time: 3:25 PM
 */
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
       Purchase Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active"><a href="index.php"><i class="fa"></i>Purchase Requests</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="sup_dashbord_div">
<ul id="quotation">


<?php

    $pr_no_quary="SELECT pr_no,`import_manager_employee_e_id`,`date` FROM purchase_requisition WHERE supplier_s_id=$sup_id AND status='confirmed'";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);

    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        $pr_no=$pr_no_row[0];
        $emp_name_quary="SELECT user_user_name FROM employee WHERE e_id=$pr_no_row[1]";
        $emp_name=mysqli_fetch_row(mysqli_query($conn,$emp_name_quary));
        echo ("
            <a href=\"#\"><li id='pr_no_li' value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  Confirmed order from ".$emp_name[0]." (".$pr_no_row[2].")
                    </li></a>
            ");
    }


               ?>

</ul>

</div>
<div class="col-md-9 col-sm-12 " id="dash_tbl_div">
    <!-- quotation request item details will load here-->
    <div class="box-body" id="tbl_div">
        <table class="table-bordered table table-hover" id="reply_tbl" width="100%">
            <thead>
            <tr><th>Tire size</th><th>Requested Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th><th>Total Price</th></tr>
            </thead>
            <tbody id="sup_dash_table"></tbody>
        </table>
        <div id="tbl_btn_div" class="pull-right">

        </div>

    </div>

    <!--    <center><h3 style="margin-top: 50px;">Select a received requisition</h3></center>-->
</div>

<!--loading requisted tire orders from import manager-->
<script>
    $('#sup_dashbord_div ul a').click(function(){
        $('#sup_dash_table').children('tr').remove();
        $('.sendbtn').remove();
        $('#tbl_btn_div').append("<button class='btn btn-success sendbtn' onclick='sendbtn(this)'>&nbsp;&nbsp;Confirm&nbsp;&nbsp;</button>");
        $.ajax({
            type:"post",
            data:({pr_no:this.firstChild.value}),
            url:"confirm_purchase_quary.php",
            success:function(data){

                $('#sup_dash_table').append(data);


            }
        });

    });
</script>

<script>
    function sendbtn(eliment) {
        var x = document.getElementById("reply_tbl").rows.length;
        var i = 0;
        for(j=1;j<x;j++){
            var pr_no= document.getElementById("pr_no_li").value;
            var t_size = document.getElementById("reply_tbl").rows[j].cells[0].innerHTML;
            var qty = document.getElementById("reply_tbl").rows[j].cells[1].innerHTML;
            var sup_qty = document.getElementById("reply_tbl").rows[j].cells[2].firstChild.value;
            var unitprice = document.getElementById("reply_tbl").rows[j].cells[3].firstChild.value;

            //alert(pr_no);
            $.ajax({
                type: "post",
                data: {pr_no: pr_no, t_size: t_size, qty:qty, sup_qty: sup_qty, unitprice: unitprice,i:i},
                url: "sendbtn_quary.php",
                success: function (data) {
                    alert(data);

                }
            });
            i++;
        }
        eliment.parentElement.parentElement.remove();

    }
