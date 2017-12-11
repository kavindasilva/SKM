<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/11/2017
 * Time: 5:01 PM
 */
require_once('../../php/dbcon.php');
$pr_no=$_POST['pr_no'];
//getting tire id
$t_id_quary="SELECT tire_t_id FROM pr_item WHERE purchase_requisition_pr_no=$pr_no";
$t_id_result=mysqli_query($conn,$t_id_quary);
while($t_id_row=mysqli_fetch_row($t_id_result)){
    $t_id=$t_id_row[0];
    //geting tire size
    $tire_size_quary="SELECT tire_size FROM tire WHERE t_id=$t_id";
    $tire_size=mysqli_fetch_row(mysqli_query($conn,$tire_size_quary))[0];
    $sup_qty_quary="SELECT supplierble_qty,supplierble_unitprice FROM pr_item WHERE tire_t_id=$t_id";
    $sup_qty_reault=mysqli_query($conn,$sup_qty_quary);
    $sup_qty_row=mysqli_fetch_row($sup_qty_reault);
    $sup_qty=$sup_qty_row[0];
    $unit_price=$sup_qty_row[1];
    $total=$sup_qty*$unit_price;
    echo ("<tr><td>$tire_size</td><td id='sup_qty' value=\"$sup_qty\">$sup_qty</td><td id='unit_price'>$unit_price</td><td>$total</td></tr>");
}
