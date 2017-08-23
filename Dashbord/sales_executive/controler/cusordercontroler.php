<?php

//require_once '../../../php/dbcon.php';
require_once('../../../Class/Sales_Order.php');
/*$shopname=$_POST['shopname'];
$comname=$_POST['comname'];
$query1="select d_id from dealer where shop_name=$shopname";
$result=mysqli_query($conn,$query1);
if (!($result)) 
		{echo "Error in query";
		return;
		}
$rowcount=mysqli_num_rows($result);
$did=null;

if($rowcount==1){
$r=mysqli_fetch_array($result);
$did=$r['d_id'];
}

$query1="select r_id from regular_customer where company_name=$comname";
$result=mysqli_query($conn,$query1);
$rowcount=mysqli_num_rows($result);
$cid=null;
if($rowcount==1){
$r=mysqli_fetch_array($result);
$cid=$r['d_id'];
}*/
$neworder= new Sales_Order($_POST['total'],1,1);
$neworder->addNewOrder($_POST['total'],1,1);

?>