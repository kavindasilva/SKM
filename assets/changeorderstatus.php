<?php
//require_once('../php/dbcon.php');
//$tid=$_POST['tid'];
$supplierble_order_items=0;
$getnewquantity="SELECT * FROM tire WHERE t_id=$tid;";//getting new updated quantity
$result6=mysqli_query($conn,$getnewquantity);	
if($result6){
	
$row6=mysqli_fetch_array($result6);
$newqty=$row6['orderable_qty'];	
	//
$getsordno="SELECT * from order_item WHERE tire_t_id=$tid and status='unavailable' and qty<=$newqty ORDER BY sord_no ASC;";//getting unavilable orders that can be changed to available order by sales order number because we have to prioratise the first placed orders
$result7=mysqli_query($conn,$getsordno);
if($result7){
	
while($row7=mysqli_fetch_array($result7)){
	if($row7['qty']<=$newqty){//checking whether if the next order item is also supplierble
		$changestatus="UPDATE order_item SET status='Available' WHERE tire_t_id=$tid and status='unavailable' and qty<=$newqty and sord_no=".$row7['sord_no'].";";
		mysqli_query($conn,$changestatus);
		$newqty=$newqty-$row7['qty'];//updating the new orderable quantity of the stock
		$supplierble_order_items++;
	}
	$updatequantity="UPDATE tire SET orderable_qty=$newqty WHERE t_id=$tid;";//updating to new orderable quantity of tire
	mysqli_query($conn,$updatequantity);
	
}
	echo $supplierble_order_items;
}
	
}

?>