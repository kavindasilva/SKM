<?php
require_once('../php/dbcon.php');
$tid=$_POST['tid'];
$getnewquantity="SELECT quantity FROM tire WHERE t_id=$tid;";
$result=mysqli_query($conn,$getnewquantity);	
if($result){
$row=mysqli_fetch_array($result);
$update="";
}

?>