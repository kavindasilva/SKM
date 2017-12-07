<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/6/2017
 * Time: 11:06 AM
 */
require_once('../../php/dbcon.php');
$t_id=$_POST['t_id'];
//pr_no for delete purchase requsition quary
$pr_no_quary="SELECT purchase_requisition_pr_no FROM pr_item WHERE tire_t_id=$t_id";
$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];
//delete pr_item(tire) quary
$pr_item_del_quary="DELETE FROM `pr_item` WHERE `pr_item`.`tire_t_id` =$t_id";
mysqli_query($conn,$pr_item_del_quary);
//checking quary
$tire_check_quary="SELECT tire_t_id FROM pr_item WHERE purchase_requisition_pr_no=$pr_no";
if(!mysqli_query($conn,$pr_item_del_quary)){
    //delete purchase requsition quary
    $req_del_quary="DELETE FROM `purchase_requisition` WHERE `purchase_requisition`.`pr_no` = $pr_no";
    mysqli_query($conn,$req_del_quary);
}

//update tire status
$tire_status_change="UPDATE `tire` SET `status` = 'required' WHERE `tire`.`t_id` = $t_id";
mysqli_query($conn,$tire_status_change);