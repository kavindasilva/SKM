<?php
require_once '../../../php/dbcon.php';
$brand=$_POST['brand'];
$country=$_POST['country'];
$tiresize=$_POST['tiresize'];
$discount=$_POST['discount'];
$invoiceno=$_POST['invoiceno'];
$sordno=$_POST['sordno'];
$qty=$_POST['qty'];
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
//updateing the status of the order item
$changestatus="UPDATE order_item SET status='Issued' where tire_t_id=$tid and sord_no=$sordno;";
//update the stock
$updatestock="UPDATE tire SET quantity=quantity-$qty where t_id=$tid;";
if(mysqli_query($conn,$changestatus)){
	echo "success";
}
else
	echo mysqli_error($conn);
if(mysqli_query($conn,$updatestock)){
	echo "success";
}
else
	echo mysqli_error($conn);
//updating the status of the order
$not_issued_items="SELECT * FROM order_item where sord_no=$sordno;";
$result=mysqli_query($conn,$not_issued_items);
$GLOBALS['flag']=1;
while($row=mysqli_fetch_array($result)){
	if($row['status']=="Available" or row['status']=="unavailable"){
		$GLOBALS['flag']=0;
		break;
	}
}
if($GLOBALS['flag']){
	$update_order_status="UPDATE sales_order SET status='Completed' where sord_no=$sordno;";
	if(mysqli_query($conn,$update_order_status)){
	echo "success";
}
else
	echo mysqli_error($conn);
	
}

mysqli_close($conn);	
?>