<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/10/2017
 * Time: 6:08 PM
 */
require_once('../../php/dbcon.php');
$pr_no=$_POST['pr_no'];
$unitprice=$_POST['unitprice'];
$sup_qty=$_POST['sup_qty'];
$i=$_POST['i'];
$qty=$_POST['qty'];
//echo ($sup_qty);

//getting t_id
$t_id_quary="SELECT tire_t_id FROM pr_item WHERE purchase_requisition_pr_no=$pr_no and qty=$qty";
$t_id_result=mysqli_query($conn,$t_id_quary);
$t_id=mysqli_fetch_row($t_id_result)[0];
//quantity and unit price entering pr table
$pr_item_tbl_quary = "UPDATE `pr_item` SET `supplierble_qty` = $sup_qty, `supplierble_unitprice` = '$unitprice' WHERE `pr_item`.`tire_t_id` = $t_id AND `pr_item`.`purchase_requisition_pr_no` = $pr_no;";
mysqli_query($conn,$pr_item_tbl_quary);
//pr tbl and tire tblstatus update
$pr_status_quary="UPDATE `purchase_requisition` SET `status` = 'replied' WHERE `purchase_requisition`.`pr_no` = $pr_no";
mysqli_query($conn,$pr_status_quary);
$tire_status_quary="UPDATE `tire` SET `status` = 'replied' WHERE `tire`.`t_id` = $t_id";
mysqli_query($conn,$tire_status_quary);
////check if pr_no has in purchase confirmation tbl
//$check_quary="SELECT pc_no FROM purchase_confirmation WHERE purchase_requisition_pr_no=$pr_no";
//$check_result=mysqli_query($conn,$check_quary);
////print_r(mysqli_num_rows($check_result));
//if(!mysqli_fetch_row($check_result) && $i==0){
//
//}
//

//
//
//$pc_no_quary="SELECT MAX(pc_no) FROM purchase_confirmation";
//$pc_no=mysqli_fetch_row(mysqli_query($conn,$pc_no_quary))[0];
//echo($pc_no);
    //enter data to pc_item tbl
//$pc_item_data_quary="INSERT INTO `pc_item` (`tire_t_id`, `purchase_confirmation_pc_no`, `unit_price`, `qty`) VALUES ($t_id, $pc_no, $unitprice, $sup_qty)";
//mysqli_query($conn,$pc_item_data_quary);
////echo($t_id_row[0]);




//getting pr_no
//$pr_no_quary="SELECT purchase_requisition_pr_no FROM pr_item WHERE tire_t_id=$t_id";
//$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];
////enter data to purchase_confirmation tbl
//$pr_conf_data_quary="INSERT INTO `purchase_confirmation` (`pc_no`, `date`, `purchase_requisition_pr_no`) VALUES (NULL, CURDATE(), $pr_no)";
//mysqli_query($conn,$pr_conf_data_quary);
////getting pc no
//$pc_no_quary="SELECT MAX(pc_no) FROM purchase_confirmation";
//$pc_no=mysqli_fetch_row(mysqli_query($conn,$pc_no_quary))[0];
////echo($pc_no);
////enter data to pc_item tbl
//$pc_item_data_quary="INSERT INTO `pc_item` (`tire_t_id`, `purchase_confirmation_pc_no`, `unit_price`, `qty`) VALUES ($t_id, $pc_no, $unitprice, $sup_qty)";
//mysqli_query($conn,$pc_item_data_quary);
