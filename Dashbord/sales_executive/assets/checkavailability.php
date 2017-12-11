<?php

$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$tiresize=trim($tiresize);
require_once '../../../php/dbcon.php';

$satatement="select orderable_qty from tire where country='$country' and tire_size='$tiresize' and brand_name='$brand'";
$result2 = mysqli_query($conn, $satatement);
$r2 = mysqli_fetch_array($result2);
$qty = $r2['orderable_qty'];
echo $qty;

?>