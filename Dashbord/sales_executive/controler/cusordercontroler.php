<?php
require_once '../../../php/dbcon.php';
$date=date(Y m d);
echo $date;
$shopname=$_POST['shopname'];
$comname=$_POST['comname'];
$tot=$_POST['total'];
if($shopname!=""){
$query1="select d_id from dealer where shop_name=$shopname";
$result=mysqli_query($conn,$query1);
if (!($result)) 
		{echo "Error in query";
		return;
		}
else
	$did=$result['d_id'];	
}
else	
$did=null;

if(comname!=""){
$query1="select r_id from customer where company_name=$comname";
$result=mysqli_query($conn,$query1);
if (!($result)) 
		{echo "Error in query";
		return;
		}
else
	$cid=$result['r_id'];	
}
else	
$cid=null;
$data=date(y-m-d);
$query="INSERT INTO sales_order VALUES(null, $tot,'n',$did,$cusid);";

		if (mysqli_query( $GLOBALS['conn'], $query)) 
    		echo "New record created successfully";
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);

		mysqli_close($GLOBALS['conn']);

?>