<?php
require_once('../../../php/dbcon.php');
$sordno=$_POST['sordno'];
$query="DELETE FROM sales_order WHERE sord_no=$sordno;";
mysqli_query($conn,$query);
?>
