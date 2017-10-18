<?php
require_once '../../../php/dbcon.php';
$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$discount=$_POST['discount'];
$invoiceno=$_POST['invoiceno'];
$tiresize=trim($tiresize);
$query="SELECT t_id from tire WHERE brand_name='$brand' AND country='$country' AND tire_size='$tiresize'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$tid=$row['t_id'];


$query="INSERT INTO invoice_item VALUES($tid,$invoiceno,$discount);";

if(mysqli_query($conn,$query)){
	echo "success";
}
else
	echo mysqli_error($conn);
mysqli_close($conn);	
?>