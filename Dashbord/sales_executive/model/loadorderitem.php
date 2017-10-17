<?php
require_once('../../../php/dbcon.php');
$sno=$_POST['sno'];
$query="SELECT * FROM order_item WHERE 	sord_no='$sno';";
$result=mysqli_query($conn,$query);
if($result){
while($row=mysqli_fetch_array($result)){
	$query2="SELECT * FROM tire WHERE t_id=".$row['tire_t_id'].";";
	$result2=mysqli_query($conn,$query2);
	$rowinside=mysqli_fetch_array($result2);
	$tot=(int)$rowinside['unit_price']*(int)$row['qty'];
	echo("<tr class=\"removable\"><td><input type=checkbox></td><td>".$rowinside['brand_name']."</td><td>".$rowinside['country']."</td><td>".$rowinside['tire_size']."</td><td>".$rowinside['unit_price']."</td><td>".$row['qty']."</td><td>$tot</td><td>".$row['status']."</td></tr>");
	
}

}
else
	echo(mysqli_error($conn));




?>