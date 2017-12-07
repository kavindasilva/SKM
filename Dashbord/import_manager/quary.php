<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/3/2017
 * Time: 7:36 PM
 */
require_once('../../php/dbcon.php');
$tire_id=$_POST['tire_id'];
$tire_qty=$_POST['qty'];
$pr_no=$_POST['pr_no'];


//inserting purchase_requisition table


//$pr_no_quary="SELECT MAX(pr_no) FROM purchase_requisition";
//$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];

$tire_status_change="UPDATE `tire` SET `status` = 'pending' WHERE `tire`.`t_id` = $tire_id";
mysqli_query($conn,$tire_status_change);


$pr_item_tbl_quary="INSERT INTO `pr_item` (`tire_t_id`, `purchase_requisition_pr_no`, `qty`) VALUES ($tire_id,$pr_no,$tire_qty)";
mysqli_query($conn,$pr_item_tbl_quary);

?>