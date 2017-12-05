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

//getting suplier id for insert purchase requisition table
$sup_id_quary="select supplier_s_id from tire WHERE t_id=$tire_id";
$sup_id=mysqli_fetch_row(mysqli_query($conn,$sup_id_quary))[0];
//inserting purchase_requisition table
$pr_tbl_quary="INSERT INTO `purchase_requisition` (`pr_no`, `date`, `status`, `supplier_s_id`, `import_manager_employee_e_id`) VALUES (NULL, CURDATE(), 'pending', $sup_id, '3')";
mysqli_query($conn,$pr_tbl_quary);

$pr_no_quary="SELECT MAX(pr_no) FROM purchase_requisition";
$pr_no=mysqli_fetch_row(mysqli_query($conn,$pr_no_quary))[0];

$tire_status_change="UPDATE `tire` SET `status` = 'pending' WHERE `tire`.`t_id` = $tire_id";
mysqli_query($conn,$tire_status_change);


//$pr_item_tbl_quary="INSERT INTO `pr_item` (`tire_t_id`, `purchase_requisition_pr_no`, `qty`) VALUES ($tire_id,$pr_no,$tire_qty)";
//mysqli_query($conn,$pr_item_tbl_quary);
echo"$pr_no";
?>