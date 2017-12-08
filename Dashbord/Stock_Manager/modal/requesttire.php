<?php
require_once('../../../php/dbcon.php');
$tid=$_POST['tid'];
$requiredamount=$_POST['requiredamount'];
$update="UPDATE tire SET status='required',requested_amount=$requiredamount WHERE t_id=$tid;";
if($result=mysqli_query($conn,$update)){
echo "success";
}
else{
    echo (mysqli_error($conn));
}
if(isset($_POST['sordno'])){//change order item status
	$sordno=$_POST['sordno'];
	$changestatus="UPDATE order_item SET status='requested' where sord_no=$sordno and tire_t_id=$tid;";
	if($result=mysqli_query($conn,$changestatus)){
echo "success";
}
else{
    echo (mysqli_error($conn));
}
}

?>