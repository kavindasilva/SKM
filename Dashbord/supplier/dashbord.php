<?php
//include '../../assets/success.php';
session_start();
require_once('../../php/dbcon.php');
$sup_quary="SELECT s_id FROM supplier WHERE user_user_name='".$_SESSION['currentuser']."';";
$sup_id=mysqli_fetch_row(mysqli_query($conn,$sup_quary))[0];
?>
  <section class="content-header">
      <input type="hidden" id="sup_id" value="<?php echo $sup_id; ?>">
   <h1>
       Purchase Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         
          <li class="active"><a href="index.php"><i class="fa"></i>Purchase Requests</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="sup_dashbord_div">
<!--    showing purchase request messages-->
<ul id="quotation">
<?php

    $pr_no_quary="SELECT pr_no,`import_manager_employee_e_id`,`date` FROM purchase_requisition WHERE supplier_s_id=$sup_id AND status='pending'";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);
    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        $pr_no=$pr_no_row[0];
        $emp_name_quary="SELECT user_user_name FROM employee WHERE e_id=$pr_no_row[1]";
        $emp_name=mysqli_fetch_row(mysqli_query($conn,$emp_name_quary));
        echo ("
            <a href=\"#\"><li id='pr_no_li' value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$emp_name[0]." (".$pr_no_row[2].")
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
            <tr><th>Tire size</th><th>Requested Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th></tr>
            </thead>
            <tbody id="sup_dash_table"></tbody>
        </table>
        <div id="tbl_btn_div" class="pull-right">

        </div>

    </div>
</div>

<!--loading requisted tire orders from import manager-->
<script>
    $('#sup_dashbord_div ul a').click(function(){
        $('#sup_dash_table').children('tr').remove();
        $('.sendbtn').remove();
        $.ajax({
            type:"post",
            data:({pr_no:this.firstChild.value}),
            url:"dashbord_quary.php",
            success:function(data){

                $('#sup_dash_table').append(data);
            }
        });
        $('#tbl_btn_div').append("<button class='btn btn-success sendbtn' onclick='sendbtn(this)'>&nbsp;&nbsp;Send&nbsp;&nbsp;</button>");
    });
</script>

<script>
    function sendbtn(eliment) {
        var x = document.getElementById("reply_tbl").rows.length;
        var i = 0;
        for(j=1;j<x;j++){
            var sup_id= document.getElementById("sup_id").value;
            var t_size = document.getElementById("reply_tbl").rows[j].cells[0].innerHTML;
            var qty = document.getElementById("reply_tbl").rows[j].cells[1].innerHTML;
            var sup_qty = document.getElementById("reply_tbl").rows[j].cells[2].firstChild.value;
            var unitprice = document.getElementById("reply_tbl").rows[j].cells[3].firstChild.value;
            $.ajax({
                type: "post",
                data: {sup_id:sup_id ,t_size: t_size, qty:qty, sup_qty: sup_qty, unitprice: unitprice,i:i},
                url: "sendbtn_quary.php",
                success: function (data) {
                    //location.reload(true);
                    document.getElementById('message1').innerHTML="Successfully Sent Quatation";
                    $('#modal-success').modal('show');
                }
            });
            i++;
        }
        eliment.parentElement.parentElement.remove();
        $('#content-wrapper').load('dashbord.php');

        //alert("Successfully Send your quatation");

    }
</script>

<div class="modal modal-success fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="message1"></h4>
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal" onclick="modal_ok_btn(this)">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function modal_ok_btn(element){
        location.reload(true);
    }

</script>