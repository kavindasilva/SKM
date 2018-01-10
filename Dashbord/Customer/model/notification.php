<?php
session_start();
require_once('../../../php/dbcon.php');
$query="SELECT r_id FROM customer WHERE user_user_name='".$_SESSION['currentuser']."';";
$result=mysqli_query($conn,$query);	
if($result){
$row=mysqli_fetch_array($result);
$rid=$row['r_id'];
}
$query="SELECT * FROM quotation WHERE regular_customer_r_id='".$rid."' && status='replied';";
$result=mysqli_query($conn,$query);	
if($result){
$noti=mysqli_num_rows($result);
}

echo $noti;

?>