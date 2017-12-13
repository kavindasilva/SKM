<?php
session_start();
require_once '../../../php/dbcon.php';
$date=date("Y-m-d");//getting the system date
$tot=$_POST['total'];
$sordno=$_POST['sordno'];
//select the customer id to the current session username
$query="select r_id from customer where user_user_name='".$_SESSION['currentuser']."';";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$cid=$row['r_id'];
//insert data into sales order
$query="INSERT INTO sales_order VALUES($sordno,$tot,'incomplete','$date',null,$cid,null);";

		if (mysqli_query( $GLOBALS['conn'], $query)) {
			
    		echo "Order Success";
		}
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);

if(isset($_POST['qno'])){
	$qno=$_POST['qno'];
	$changestatus="UPDATE quotation SET status='confirmed';";
	if (mysqli_query( $GLOBALS['conn'], $changestatus)) {
			
    		echo "Order Success";
		}
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);
	
}

		mysqli_close($GLOBALS['conn']);	

?>