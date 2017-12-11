<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/7/2017
 * Time: 2:57 PM
 */
require_once('../../php/dbcon.php');
$tire_id=$_POST['tire_id'];
//$tire_qty=$_POST['qty'];
$pr_no=$_POST['pr_no'];

//getting suplier id for insert purchase requisition table
$sup_id_quary="select supplier_s_id from tire WHERE t_id=$tire_id";
if($sup_id=mysqli_fetch_row(mysqli_query($conn,$sup_id_quary))) {
    $pr_tbl_quary = "INSERT INTO `purchase_requisition` (`pr_no`, `date`, `status`, `supplier_s_id`, `import_manager_employee_e_id`) VALUES ($pr_no, CURDATE(), 'pending', $sup_id[0], '3')";
    mysqli_query($conn, $pr_tbl_quary);
}