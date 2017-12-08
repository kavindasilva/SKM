<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>New Requision</h1>
    <ol class="breadcrumb">
        <li><a href="navigation.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Purchase Confirmation</a></li>
        <li class="active">Received Requisition</li>
    </ol>
</section>
<div class="col-md-3" id="received_requisition_div">
    <ul id="quotation">

        <?php
        require_once('../../php/dbcon.php');
        $pr_no_quary="SELECT pr_no,supplier_s_id FROM purchase_requisition WHERE status='replied'";
        $pr_no_result=mysqli_query($conn,$pr_no_quary);
        while($row=mysqli_fetch_row($pr_no_result)){
            //show details about suplier and pr
            $pr_date_query="SELECT date FROM purchase_requisition WHERE pr_no='".$row[0]."';";
            $sup_name_query="SELECT user_user_name FROM supplier WHERE s_id='".$row[1]."';";
            //$resultinside=mysqli_query($conn,$query2);
            $pr_date=mysqli_fetch_row(mysqli_query($conn,$pr_date_query));
            $sup_name=mysqli_fetch_row(mysqli_query($conn,$sup_name_query));
            echo("
                  
                    <a href=\"#\"><li value=\"".$row[0]."\">
                      <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i> Received requisition from ".$sup_name[0]." (".$pr_date[0].")
                    </li></a>
                  ");

        }
        ?>
    </ul>
</div>
<div class="col-md-9 col-sm-12 " id="rr_div">
    <!-- quotation request item details will load here-->
    <div class="box-body">
        <table class="table-bordered table-hover" width="100%">
            <thead>
            <tr><th>Tire id</th><th>Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th><th>Total Price</th></tr>
            </thead>
            <tbody id="rr_table"></tbody>
        </table>
    </div>

<!--    <center><h3 style="margin-top: 50px;">Select a received requisition</h3></center>-->
</div>
</body>
<script>

    $('#received_requisition_div ul a').click(function(){
        $('#rr_table').children('tr').remove();
        $.ajax({
            type:"post",
            data:({pr_no:this.firstChild.value}),
            url:"rr_quary.php",
            success:function(data){
                $('#rr_table').append(data);
                //alert(data);


            }
        });

       // $('#quotation a').removeClass("goingtorm");
        //$(this).addClass('goingtorm');
        //$('#qrdetails').load('quotationreqdetails.php')

    });

</script>
<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>

</html>

