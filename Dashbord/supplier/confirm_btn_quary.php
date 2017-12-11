<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/11/2017
 * Time: 8:40 PM
 */
require_once('../../php/dbcon.php');
$pr_no=$_POST['pr_no'];
$sup_id=$_POST['sup_id'];
$t_size=$_POST['t_size'];
$unitprice=$_POST['unitprice'];
$sup_qty=$_POST['sup_qty'];
$i=$_POST['i'];
//getting tire id
$t_id_quary="SELECT t_id FROM tire WHERE `supplier_s_id`=$sup_id AND `tire_size`='$t_size'";
$t_id_result=mysqli_query($conn,$t_id_quary);
$t_id=mysqli_fetch_row($t_id_result)[0];

if($i==0){
    //update pr table status
    $deliver_update_quary="UPDATE `purchase_requisition` SET `status` = 'delivering' WHERE `purchase_requisition`.`pr_no` = $pr_no";
    mysqli_query($conn,$deliver_update_quary);
}
//update status tire tbl
$tire_delever_update_quary="UPDATE `tire` SET `status` = 'delivering' WHERE `tire`.`t_id` =$t_id";
mysqli_query($conn,$tire_delever_update_quary);
echo ($t_id);