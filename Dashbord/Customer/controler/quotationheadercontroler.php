<?php
require_once '../../../php/dbcon.php';
session_start();

$query1="select r_id from customer where user_user_name='".$_SESSION['currentuser']."'";
$result=mysqli_query($conn,$query1);
if (!($result)) 
		{echo "Error in query";
		return;
		}
else{
	$row=mysqli_fetch_array($result);
	$rid=$row['r_id'];	
}
$query1="INSERT INTO quotation VALUES(null,$rid,'notreplied')";
if (mysqli_query( $conn, $query1)) {
			
    		echo "Request Success";
		}
 		else 
    		echo "Error: " . $query1 . "<br>" . mysqli_error($GLOBALS['conn']);

mysqli_close($GLOBALS['conn']);	
?>