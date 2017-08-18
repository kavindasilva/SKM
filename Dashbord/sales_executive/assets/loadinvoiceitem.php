<?php

$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];

$statement="select s_id from supplier where brand='$brand' && country='$country'";

require_once '../../../php/dbcon.php';
$result = mysqli_query($conn, $statement);
$r = mysqli_fetch_array($result);
$sid = $r['s_id'];
$satatement="select unit_price from tire where supplier_s_id='$sid' && tire_size='$tiresize'";
$result2 = mysqli_query($conn, $satatement);
$r2 = mysqli_fetch_array($result2);
$up = $r2['unit_price'];
$fup=array('stack'=>'overflow');
echo $up;

?>