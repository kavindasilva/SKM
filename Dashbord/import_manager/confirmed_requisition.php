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
    <!-- quotation request item details will load here-->
    <div class="box-body">
        <table class="table-bordered table-hover" width="100%">
            <thead>
            <tr><th>Date</th><th>Tire id</th><th>Qty</th><th>Suppliable Qty</th><th>Suppliable unitprice</th><th>Total Price</th></tr>
            </thead>
            <tbody>
<!--            --><?php
//            /**
//             * Created by PhpStorm.
//             * User: Isuru Jayasinghe
//             * Date: 12/8/2017
//             * Time: 10:02 AM
//             */
//            require_once('../../php/dbcon.php');
//            $pr_item_tbl_quary="SELECT tire_t_id,qty,supplierble_qty,supplierble_unitprice FROM pr_item WHERE ";
//            $pr_item_result=mysqli_query($conn,$pr_item_tbl_quary);
//            while($pr_item_row=mysqli_fetch_row($pr_item_result)){
//                $tot_price=$pr_item_row[2]*$pr_item_row[3];
//                echo("<tr><td>$pr_item_row[0]</td><td>$pr_item_row[1]</td><td>$pr_item_row[2]</td><td>$pr_item_row[3]</td><td>$tot_price</td><td><button class=\"btn btn-success confirmbtn\" onclick='confirmbtn(this)'>Confirm</button><button class=\"btn btn-danger deletebtn\" onclick='deletebtn(this)'>Delete</button></td></tr>");
//
//            }
//            ?><!--</tbody>-->
        </table>
    </div>

    <!--    <center><h3 style="margin-top: 50px;">Select a received requisition</h3></center>-->
</div>

</body>

</html>