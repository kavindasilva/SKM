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
    <h1>Confirmed Requision</h1>
    <ol class="breadcrumb">
        <li><a href="navigation.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Purchase Confirmation</a></li>
        <li class="active">Confirmed Requisition</li>
    </ol>
</section>

<div class="col-md-9 col-sm-12 " id="rr_div">
    <!-- confirmed request item details will load here-->
    <div class="box-body">
        <table class="table-bordered table-hover" width="100%">
            <thead>
            <tr><th>Date</th><th>Tire size</th><th>Brand</th><th>Country</th><th>Suppliable Qty</th><th>Suppliable unitprice</th><th>Total Price</th></tr>
            </thead>
            <tbody>
            <?php
            require_once('../../php/dbcon.php');

            $pc_item_tbl_quary="SELECT tire_t_id,qty,unit_price,purchase_confirmation_pc_no FROM `pc_item`";
            $pc_item_result=mysqli_query($conn,$pc_item_tbl_quary);
            $i=0;
            while($pc_item_row=mysqli_fetch_row($pc_item_result)){
                $t_id=$pc_item_row[0];
                $tire_tbl_quary="SELECT brand_name,country,tire_size FROM tire WHERE t_id=$t_id";
                $tire_tbl_result= mysqli_query($conn,$tire_tbl_quary);
                $tire_tbl_row=mysqli_fetch_row($tire_tbl_result);
                $brand=$tire_tbl_row[0];
                $country=$tire_tbl_row[1];
                $tire_size=$tire_tbl_row[2];
                $pc_no=$pc_item_row[3];
                $date_quary="SELECT date FROM `purchase_confirmation` WHERE pc_no=$pc_no";
                $date=mysqli_fetch_row(mysqli_query($conn,$date_quary))[0];
                $tot_price=$pc_item_row[1]*$pc_item_row[2];
                echo("<tr><td>$date</td><td>$tire_size</td><td>$brand</td><td>$country</td><td>$pc_item_row[1]</td><td>$pc_item_row[2]</td><td>$tot_price</td></tr>");
                $i++;
            }
            if($i==0){
                echo ("<tr><h3>There is not any confirmed requisition</h3></tr>");
            }
            ?></tbody>
        </table>
    </div>

    <!--    <center><h3 style="margin-top: 50px;">Select a received requisition</h3></center>-->
</div>

</body>

</html>