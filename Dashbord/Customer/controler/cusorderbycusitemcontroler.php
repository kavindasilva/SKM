<?php
require_once '../../../php/dbcon.php';
$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$qty=$_POST['qty'];
$status=$_POST['status'];
$tiresize=trim($tiresize);
$query="SELECT t_id from tire WHERE brand_name='$brand' AND country='$country' AND tire_size='$tiresize'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$tid=$row['t_id'];

$query2="SELECT MAX(sord_no) AS maxsno FROM sales_order";
$result=mysqli_query($conn,$query2);
$obj=mysqli_fetch_object($result);
$sordno=$obj->maxsno;

$query="INSERT INTO order_item VALUES($tid,$sordno,$qty,'$status')";
if(mysqli_query($conn,$query)){
	echo "success";
}
else
	echo mysqli_error($conn);

mysqli_close($conn);	
?>