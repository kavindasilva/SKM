<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/12/2017
 * Time: 1:33 AM
 */
require_once('../../php/dbcon.php');
$pr_no=$_POST['pr_no'];
$t_size=$_POST['t_size'];
$unitprice=$_POST['unitprice'];
$sup_qty=$_POST['sup_qty'];
$i=$_POST['i'];
//pr tbl status change

//getting sup_id
$sup_id_quary="SELECT `supplier_s_id` FROM purchase_requisition WHERE status='delivering' AND pr_no=$pr_no";
$sup_id_result=mysqli_query($conn,$sup_id_quary);
//$j=0;
while ($sup_id_row=mysqli_fetch_row($sup_id_result)){
    //pr tbl status change
    if($i==0){
        $pr_tbl_status_quary="UPDATE `purchase_requisition` SET `status` = 'received' WHERE `purchase_requisition`.`pr_no` = $pr_no";
        mysqli_query($conn,$pr_tbl_status_quary);

    }
    $sup_id=$sup_id_row[0];

        //getting tire id
        $t_id_quary="SELECT t_id FROM tire WHERE `supplier_s_id`=$sup_id AND `tire_size`='$t_size'";
        $t_id_result=mysqli_query($conn,$t_id_quary);
        $t_id=mysqli_fetch_row($t_id_result)[0];
        //geting available tire qty
        $ava_tire_qty_quary="SELECT quantity FROM tire WHERE t_id=$t_id";
        $ava_tire_qty=mysqli_fetch_row(mysqli_query($conn,$ava_tire_qty_quary))[0];
        $tot_qty=$ava_tire_qty+$sup_qty;
        //update tire stock and status
        $tire_update_quary="UPDATE `tire` SET `quantity` =$tot_qty, orderable_qty=orderable_qty+$sup_qty `status` = 'available' WHERE `tire`.`t_id` = $t_id";
        mysqli_query($conn,$tire_update_quary);
        $tid=$t_id;
         require_once('../../assets/changeorderstatus.php');

}


