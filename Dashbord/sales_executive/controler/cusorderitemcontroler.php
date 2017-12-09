<?php
require_once '../../../php/dbcon.php';
$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$qty=$_POST['qty'];
$status=$_POST['status'];
$sordno=$_POST['sordno'];
$tiresize=trim($tiresize);
$query="SELECT t_id from tire WHERE brand_name='$brand' AND country='$country' AND tire_size='$tiresize'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$tid=$row['t_id'];

$query="INSERT INTO order_item VALUES($tid,$sordno,$qty,'$status',null)";

if(mysqli_query($conn,$query)){
	echo "success";
}
else
	echo mysqli_error($conn);
mysqli_close($conn);	
?>