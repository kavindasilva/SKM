<?php
require_once('../../php/dbcon.php');
$ordercount=[0,0,0,0,0,0,0,0,0,0,0,0];
$getdata="SELECT * FROM purchase_confirmation;";
$result=mysqli_query($conn,$getdata);	
if($result){
while($row2=mysqli_fetch_array($result)){
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