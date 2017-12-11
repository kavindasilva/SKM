<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/12/2017
 * Time: 12:06 AM
 */
?>
 <section class="content-header">
<!--      <input type="hidden" id="sup_id" value="--><?php //echo $sup_id; ?><!--">-->
   <h1>
       Delivering orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active"><a href="index.php"><i class="fa"></i>Delivering orders</a></li>
      </ol>
</section></br>
<div class="col-md-3" id="sup_dashbord_div">
<ul id="quotation">


<?php
    require_once('../../php/dbcon.php');
    $pr_no_quary="SELECT pr_no,`supplier_s_id`,`date` FROM purchase_requisition WHERE status='delivering'";
    $pr_no_result=mysqli_query($conn,$pr_no_quary);

    while ($pr_no_row=mysqli_fetch_row($pr_no_result)){
        $pr_no=$pr_no_row[0];
        $sup_id=$pr_no_row[1];
        ?>
        <input type="hidden" id="sup_id" value="<?php echo $sup_id; ?>">
        <?php
        $sup_name_quary="SELECT `user_user_name` FROM `supplier` WHERE `s_id`=$sup_id";
        $sup_name=mysqli_fetch_row(mysqli_query($conn,$sup_name_quary));
        echo ("
            <a href=\"#\"><li id='pr_no_li' value=\"".$pr_no_row[0]."\">
            <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i>  request from ".$sup_name[0]." (".$pr_no_row[2].")
                    </li></a>
            ");
    }


               ?>

</ul>
</div>
<div class="col-md-9 col-sm-12 " id="dash_tbl_div">
    <!-- delivering order item details will load here-->
    <div class="box-body" id="tbl_div">
        <table class="table-bordered table table-hover" id="confirm_tbl" width="100%">
            <thead>
            <tr><th>Tire size</th><th>Requested Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th></tr>
            </thead>
            <tbody id="sup_dash_table"></tbody>
        </table>
        <div id="tbl_btn_div" class="pull-right">

        </div>

    </div>
</div>

<!--loading delivering tire orders from supplier-->
<script>
    $('#sup_dashbord_div ul a').click(function(){
        $('#sup_dash_table').children('tr').remove();
        $('.sendbtn').remove();
        var pr_no=this.firstChild.value;
        $('#tbl_btn_div').append("<button class='btn btn-success sendbtn'value=\""+pr_no+"\"  onclick='receivedbtn(this)'>&nbsp;&nbsp;Received&nbsp;&nbsp;</button>");
        $.ajax({
            type:"post",
            data:({pr_no:pr_no}),
            url:"delivered_quary.php",
            success:function(data){

                $('#sup_dash_table').append(data);


            }
        });

    });
</script>

<!--confirm button function-->
<script>
    function receivedbtn(eliment) {
        var x = document.getElementById("confirm_tbl").rows.length;
        var i = 0;
        for(j=1;j<x;j++){
            var pr_no=eliment.value;
            var sup_id= document.getElementById("sup_id").value;
            var t_size = document.getElementById("confirm_tbl").rows[j].cells[0].innerHTML;
            var sup_qty = document.getElementById("confirm_tbl").rows[j].cells[2].innerHTML;
            var unitprice= document.getElementById("confirm_tbl").rows[j].cells[3].innerHTML;

            //alert(pr_no);
            $.ajax({
                type: "post",
                data: {pr_no: pr_no,sup_id: sup_id,t_size: t_size, sup_qty: sup_qty, unitprice: unitprice,i:i},
                url: "received_order_btn_quary.php",
                success: function (data) {
                    alert(data);
                }
            });
            i++;
        }
        //alert("Confirmed successfully");
        eliment.parentElement.parentElement.remove();

    }
</script>