<?php
session_start();
require_once '../../../php/dbcon.php';
$date=date("Y-m-d");
$tot=$_POST['total'];
$query="select r_id from customer where user_user_name='".$_SESSION['currentuser']."';";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$cid=$row['r_id'];
$query="INSERT INTO sales_order VALUES(null,$tot,'incomplete','$date',null,$cid);";

		if (mysqli_query( $GLOBALS['conn'], $query)) {
			
    		echo "Order Success";
		}
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);

		mysqli_close($GLOBALS['conn']);	

?>