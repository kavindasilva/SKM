<!DOCTYPE html>
<html>
<?php include '../../assets/success.php'?>  
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
<!--supplier replied msg loading-->
        <?php
        require_once('../../php/dbcon.php');
        $pr_no_quary="SELECT pr_no,supplier_s_id FROM purchase_requisition WHERE status='replied'";
        $pr_no_result=mysqli_query($conn,$pr_no_quary);
        $i=0;
        while($row=mysqli_fetch_row($pr_no_result)){
            //show details about suplier and pr
            $pr_date_query="SELECT date FROM purchase_requisition WHERE pr_no='".$row[0]."';";
            $sup_name_query="SELECT user_user_name FROM supplier WHERE s_id='".$row[1]."';";
            //$resultinside=mysqli_query($conn,$query2);
            $pr_date=mysqli_fetch_row(mysqli_query($conn,$pr_date_query));
            $sup_name=mysqli_fetch_row(mysqli_query($conn,$sup_name_query));
            $i++;
            echo("
                  
                    <a href=\"#\"><li value=\"".$row[0]."\">
                      <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i> Received requisition from ".$sup_name[0]." (".$pr_date[0].")
                    </li></a>
                  ");


        }
        if($i==0){
            echo("
            
            <h3>There is not any new received requisition</h3>
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

    });

</script>

<script>
    //confirmbtn in rr_quary.php with html tbl
    function confirmbtn(eliment) {
        $.ajax({
            type:"post",
            data:({t_id:eliment.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML,
                unitprice:eliment.parentElement.parentElement.getElementsByTagName('td')[3].innerHTML,
                sup_qty:eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML}),
            url:"rr_confirm_quary.php",
            success:function (data) {
                //alert(data);

            }


        });

        eliment.parentElement.parentElement.remove();
        alert("Successfully confirm tire orders");
    }
</script>

<script>
    function deletebtn(eliment) {
        $.ajax({
            type:"post",
            data:({t_id:eliment.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML,
                unitprice:eliment.parentElement.parentElement.getElementsByTagName('td')[3].innerHTML,
                sup_qty:eliment.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML}),
            url:"rr_delete_quary.php",
            success:function (data) {
               document.getElementById('message1').innerHTML=" deleted successfully";
					   $('#modal-success').modal('show');

            }


        });
        eliment.parentElement.parentElement.remove();

    }
</script>
<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>

</html>

