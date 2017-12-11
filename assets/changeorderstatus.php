<?php
require_once('../php/dbcon.php');
$tid=$_POST['tid'];
$getnewquantity="SELECT quantity FROM tire WHERE t_id=$tid;";//getting new updated quantity
$result=mysqli_query($conn,$getnewquantity);	
if($result){
	
$row=mysqli_fetch_array($result);
$newqty=$row['quantity'];	
	//
$getsordno="SELECT * from order_item WHERE tire_t_id=$tid and status='unavailable' and qty<=$newqty ORDER BY sord_no ASC;";//getting unavilable orders that can be changed to available order by sales order number because we have to prioratise the first placed orders
$result2=mysqli_query($conn,$getsordno);
if($result2){
	
while($row2=mysqli_fetch_array($result2)){
	if($row2[qty]<=$newqty){//checking whether if the next order item is also supplierble
		$changestatus="UPDATE order_item SET status='Available' WHERE tire_t_id=$tid and status='unavailable' and qty<=$newqty and sord_no=".$row2['sord_no'].";";
		mysqli_query($conn,$changestatus);
		$newqty=$newqty-$row2['qty'];//updating the new available quantity of the stock
		
	}
	$updatequantity="UPDATE tire SET quantity=$newqty WHERE t_id=$tid;";//updating to new quantity of tire
	mysqli_query($conn,$updatequantity);
	
}
}
	
}

?>