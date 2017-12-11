<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/12/2017
 * Time: 12:52 AM
 */
require_once('../../php/dbcon.php');
$pr_no=$_POST['pr_no'];
//getting tire id
$t_id_quary="SELECT tire_t_id,`supplierble_qty`,`supplierble_unitprice` FROM pr_item WHERE purchase_requisition_pr_no=$pr_no";
$t_id_result=mysqli_query($conn,$t_id_quary);
while($t_id_row=mysqli_fetch_row($t_id_result)){
    $t_id=$t_id_row[0];
    $sup_qty=$t_id_row[1];
    $unitprice=$t_id_row[2];
    //geting tire size
    $tire_size_quary="SELECT tire_size FROM tire WHERE t_id=$t_id";
    $tire_size=mysqli_fetch_row(mysqli_query($conn,$tire_size_quary))[0];
    $req_qty_quary="SELECT qty FROM pr_item WHERE tire_t_id=$t_id";
    $req_qty=mysqli_fetch_row(mysqli_query($conn,$req_qty_quary))[0];
    echo ("<tr><td>$tire_size</td><td>$req_qty</td><td>$sup_qty</td><td>$unitprice</td></tr>");
}
//echo ("asd");