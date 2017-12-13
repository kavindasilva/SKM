<?php
require_once('../../../php/dbcon.php');
//sales-executive notifications will be new quotations that a notreplied in the status
$query="SELECT * FROM quotation WHERE status='notreplied';";
$result=mysqli_query($conn,$query);	
if($result){
echo mysqli_num_rows($result);
}

?>