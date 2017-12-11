<?php
require_once('../../../php/dbcon.php');
$sordno=$_POST['sordno'];
//getting sales order items
$getsorditems="SELECT * FROM order_item WHERE sord_no=$sordno;";
$orderitems=mysqli_query($conn,$getsorditems);
while($orderitem=mysqli_fetch_array($orderitems)){
	$update_oraderable_qty="UPDATE tire SET orderable_qty=orderable_qty+".$orderitem['qty']." WHERE t_id=".$orderitem['tire_t_id'].";";
	mysqli_query($conn,$update_oraderable_qty);
}
$query="DELETE FROM sales_order WHERE sord_no=$sordno;";
mysqli_query($conn,$query);
?>
