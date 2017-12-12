<?php
require_once('../../../php/dbcon.php');
$query="SELECT * FROM quotation WHERE status='notreplied';";
$result=mysqli_query($conn,$query);	
if($result){
echo mysqli_num_rows($result);
}

?>