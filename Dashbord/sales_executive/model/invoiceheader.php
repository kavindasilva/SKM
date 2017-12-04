<?php
require_once '../../../php/dbcon.php';
session_start();
$selesx=$_SESSION['currentuser'];
$invoiceno=$_POST['invoiceno'];
$netamount=$_POST['netamount'];
$discount=$_POST['discount'];
$invoicenote=$_POST['invoicenote'];
$status=$_POST['status'];
$sordno=$_POST['sordno'];
$subtotal=$_POST['subtotal'];
$date=date("Y-m-d");
$query="INSERT INTO invoice VALUES($invoiceno,$netamount,$discount,'$invoicenote','$status',$subtotal,'$date','$selesx',$sordno);";


if(mysqli_query($conn,$query)){
	echo "success";
}
else
	echo mysqli_error($conn);
mysqli_close($conn);	

?>