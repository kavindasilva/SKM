<?php
require_once('../../../php/dbcon.php');
$query="SELECT * FROM tire WHERE quantity<20 and status='Available';";
$result=mysqli_query($conn,$query);	
if($result){
$_SESSION['notificationcount']=mysqli_num_rows($result);
$_SESSION['lowstockitemscount']=mysqli_num_rows($result);
}
$query="SELECT * FROM order_item WHERE status='unavailable' ";
$result2=mysqli_query($conn,$query);
if($result2){
$_SESSION['notificationcount']+=mysqli_num_rows($result2);
$_SESSION['unavalableorderitemscount']=mysqli_num_rows($result2);	
}
?>