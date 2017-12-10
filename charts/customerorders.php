<?php
require_once('../../php/dbcon.php');
$ordercount=[0,0,0,0,0,0,0,0,0,0,0,0];
session_start();
$query="SELECT r_id FROM customer WHERE user_user_name='".$_SESSION['currentuser']."';";
$result=mysqli_query($conn,$query);	
if($result){
$row=mysqli_fetch_array($result);
$rid=$row['r_id'];
$query2="SELECT date FROM sales_order WHERE regular_customer_r_id='".$rid."';";
$result2=mysqli_query($conn,$query2);	
while($row2=mysqli_fetch_array($result2)){
	$date=$row2['date'];
	$date=explode("-",$date);
	$month=(int)$date[1];
	$month--;
	$ordercount[$month]=$ordercount[$month]+1;
}
}
echo("[");
for($count=0;$count<12;$count++){
	if($count==11){
		echo($ordercount[$count]."]");
		continue;
	}
	echo($ordercount[$count].",");
}

?>