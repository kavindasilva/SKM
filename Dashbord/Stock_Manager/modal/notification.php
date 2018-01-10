<?php
require_once('../../../php/dbcon.php');
$query="SELECT * FROM tire WHERE quantity<20 and status='Available';";
$result=mysqli_query($conn,$query);	
if($result){
$notificationcount=mysqli_num_rows($result);
$lowstockitemscount=mysqli_num_rows($result);
}
$query="SELECT * FROM order_item WHERE status='unavailable' ";
$result2=mysqli_query($conn,$query);
if($result2){
$notificationcount+=mysqli_num_rows($result2);
$unavalableorderitemscount=mysqli_num_rows($result2);	
}
$notifications['notificationcount']=$notificationcount;
$notifications['unavalableorderitemscount']=$unavalableorderitemscount;
$notifications['lowstockitemscount']=$lowstockitemscount;
echo json_encode($notifications);
?>