<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/3/2017
 * Time: 7:36 PM
 */
require_once('../../php/dbcon.php');
$tire_id=$_POST['tire_id'];
$sup_id_statement="select supplier_s_id from tire WHERE t_id=$tire_id";
$sup_id_result=mysqli_query($conn,$sup_id_statement);

while ($row=mysqli_fetch_array($sup_id_result)){
    $sup_id=$row['supplier_s_id'];
    echo"$sup_id";
}
?>