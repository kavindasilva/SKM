<?php

$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$tiresize=trim($tiresize);
require_once '../../../php/dbcon.php';
/*$statement="select s_id from supplier where brand='$brand' && country='$country'";
$result = mysqli_query($conn, $statement);
$r = mysqli_fetch_array($result);
$sid = $r['s_id'];
$satatement="select unit_price from tire where supplier_s_id='$sid' && tire_size='$tiresize'";*/
$satatement="select unit_price from tire where country='$country' and tire_size='$tiresize' and brand_name='$brand'";
$result2 = mysqli_query($conn, $satatement);
$r2 = mysqli_fetch_array($result2);
$up = $r2['unit_price'];
echo $up;
?>