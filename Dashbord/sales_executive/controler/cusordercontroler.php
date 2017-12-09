<?php
require_once '../../../php/dbcon.php';
$date=date("Y-m-d");
$shopname=$_POST['shopname'];
$comname=$_POST['comname'];
$tot=$_POST['total'];
$sordno=$_POST['sordno'];
$guestname=$_POST['guestname'];
$query1="select d_id from dealer where shop_name='$shopname'";
$result=mysqli_query($conn,$query1);	
if (!($result)) 
		{echo "Error in query";
		
		}
else{
	if(mysqli_num_rows($result)){
	$row=mysqli_fetch_array($result);
	$did=$row['d_id'];	}
	else
		$did="null";
}

$query1="select r_id from customer where company_name='$comname'";
$result=mysqli_query($conn,$query1);
if (!($result)) 
		{echo "Error in query";
		
		}
else{
	if(mysqli_num_rows($result)){
	$row=mysqli_fetch_array($result);
	$cid=$row['r_id'];	}
	else
		$cid="null";
}


$query="INSERT INTO sales_order VALUES($sordno,$tot,'incomplete','$date',$did,$cid,'$guestname');";

		if (mysqli_query( $GLOBALS['conn'], $query)) {
			
    		echo "Order Success";
		}
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);

		mysqli_close($GLOBALS['conn']);	

?>