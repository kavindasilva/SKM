<?php
require_once('../../../php/dbcon.php');
session_start();
$dis=$_POST['discount'];
$disa=$_POST['discountamount'];
$query="UPDATE quotation_item SET discount='$dis' , discount_amount='$disa' WHERE q_no='".$_SESSION['qno']."';";
mysqli_query($conn,$query);
echo(mysqli_error($conn));

?>