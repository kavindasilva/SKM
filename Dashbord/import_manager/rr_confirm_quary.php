<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/8/2017
 * Time: 11:19 PM
 */
require_once('../../php/dbcon.php');
$t_id=$_POST['t_id'];
$unitprice=$_POST['unitprice'];
$sup_qty=$_POST['sup_qty'];
//getting pr number
$pr_no_quary="SELECT purchase_requisition_pr_no FROM pr_item WHERE tire_t_id=$t_id";
$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];
////check if there any pc_no with this pr_no
$pc_no_check="SELECT pc_no FROM purchase_confirmation WHERE purchase_requisition_pr_no=$pr_no";
$pc_no_check_result=mysqli_query($conn,$pc_no_check);
if(!$pc_no_check_row=mysqli_fetch_row($pc_no_check_result)){
    //insert data to purchase confirmation tbl
    $pc_table_quary="INSERT INTO `purchase_confirmation` (`pc_no`, `date`, `purchase_requisition_pr_no`) VALUES (NULL,CURDATE(),$pr_no)";
    mysqli_query($conn,$pc_table_quary);

}

//getting pc  number in purchase cofer tbl
$pc_no_quary="SELECT MAX(pc_no) FROM purchase_confirmation";
$pc_no=mysqli_fetch_row(mysqli_query($conn,$pc_no_quary))[0];
//insert data to pr_item tbl
$pc_item_table_quary="INSERT INTO `pc_item` (`tire_t_id`, `purchase_confirmation_pc_no`, `unit_price`, `qty`) VALUES ($t_id,$pc_no,$unitprice,$sup_qty)";
mysqli_query($conn,$pc_item_table_quary);
//update tire status
$tire_status_quary="UPDATE `tire` SET `status` = 'confirmed' WHERE `tire`.`t_id` = $t_id";
mysqli_query($conn,$tire_status_quary);
$pr_status_quary="UPDATE `purchase_requisition` SET `status` = 'confirmed' WHERE `purchase_requisition`.`pr_no` = $pr_no";
mysqli_query($conn,$pr_status_quary);
////delete tire from pr_item tbl
//$pr_item_tire_delete="DELETE FROM `pr_item` WHERE `pr_item`.`tire_t_id` = $t_id AND `pr_item`.`purchase_requisition_pr_no` = $pr_no";
//mysqli_query($conn,$pr_item_tire_delete);

//checking quary
//$tire_check_quary="SELECT tire_t_id FROM pr_item WHERE purchase_requisition_pr_no=$pr_no";
//if(!mysqli_fetch_row(mysqli_query($conn,$tire_check_quary))[0]){
//    //update purchase requsition quary
//    $req_del_quary="UPDATE `purchase_requisition` SET `status` = 'confirmed' WHERE `purchase_requisition`.`pr_no` = $pr_no";
//    mysqli_query($conn,$req_del_quary);
//}

//echo ($pc_no);
