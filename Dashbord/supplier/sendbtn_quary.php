<?php
//linked with dashboard.php sendbtn
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/10/2017
 * Time: 6:08 PM
 */
require_once('../../php/dbcon.php');
//$pr_no=$_POST['pr_no'];
$sup_id=$_POST['sup_id'];
$t_size=$_POST['t_size'];
$unitprice=$_POST['unitprice'];
$sup_qty=$_POST['sup_qty'];
$i=$_POST['i'];
$qty=$_POST['qty'];
//echo ($sup_qty);

//getting tire id
$t_id_quary="SELECT t_id FROM tire WHERE `supplier_s_id`=$sup_id AND `tire_size`='$t_size'";
$t_id_result=mysqli_query($conn,$t_id_quary);
$t_id=mysqli_fetch_row($t_id_result)[0];
//getting pr_no
$pr_no_quary="SELECT purchase_requisition_pr_no FROM pr_item WHERE tire_t_id=$t_id";
$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];
//quantity and unit price entering pr table
$pr_item_tbl_quary = "UPDATE `pr_item` SET `supplierble_qty` = $sup_qty, `supplierble_unitprice` = '$unitprice' WHERE `pr_item`.`tire_t_id` = $t_id";
mysqli_query($conn,$pr_item_tbl_quary);
//pr tbl and tire tblstatus update
//echo($pr_no);
$pr_status_quary="UPDATE `purchase_requisition` SET `status` = 'replied' WHERE `purchase_requisition`.`pr_no` = $pr_no";
mysqli_query($conn,$pr_status_quary);
$tire_status_quary="UPDATE `tire` SET `status` = 'replied' WHERE `tire`.`t_id` = $t_id";
mysqli_query($conn,$tire_status_quary);
