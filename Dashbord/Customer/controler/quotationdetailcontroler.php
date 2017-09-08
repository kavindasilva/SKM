<?php
require_once '../../../php/dbcon.php';
$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$qty=$_POST['qty'];

$tiresize=trim($tiresize);
$query="SELECT t_id from tire WHERE brand_name='$brand' AND country='$country' AND tire_size='$tiresize'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$tid=$row['t_id'];

$query2="SELECT MAX(q_no) AS maxqno FROM quotation";
$result=mysqli_query($conn,$query2);
$obj=mysqli_fetch_object($result);
$qno=$obj->maxqno;

$query="INSERT INTO quotation_item VALUES($tid,$qno,$qty)";

if(mysqli_query($conn,$query)){
	echo "success";
}
else
	echo mysqli_error($conn);
mysqli_close($conn);	
?>