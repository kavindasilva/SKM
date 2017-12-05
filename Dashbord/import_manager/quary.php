<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/3/2017
 * Time: 7:36 PM
 */
require_once('../../php/dbcon.php');
$tire_id=$_POST['tire_id'];

//getting suplier id for insert purchase requisition table
$sup_id_quary="select supplier_s_id from tire WHERE t_id=$tire_id";
$sup_id_result=mysqli_query($conn,$sup_id_quary);

while ($row=mysqli_fetch_array($sup_id_result)){
    $sup_id=$row['supplier_s_id'];
    $pr_tbl_quary="INSERT INTO `purchase_requisition` (`pr_no`, `date`, `status`, `supplier_s_id`, `import_manager_employee_e_id`) VALUES (NULL, CURDATE(), 'pending', $sup_id, '2')";
    mysqli_query($conn,$pr_tbl_quary);
    echo"$sup_id";
}
?>