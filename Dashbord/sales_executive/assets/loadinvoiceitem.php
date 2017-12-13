<?php

$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$tiresize=trim($tiresize);
require_once '../../../php/dbcon.php';
//getting the unit price and tire id of the 
$satatement="select unit_price,t_id from tire where country='$country' and tire_size='$tiresize' and brand_name='$brand'";
$result2 = mysqli_query($conn, $satatement);
$r2 = mysqli_fetch_array($result2);
$up = $r2['unit_price'];
$tid= $r2['t_id'];
$returning['up']=$up;
$returning['tid']=$tid;
echo json_encode($returning);
?>