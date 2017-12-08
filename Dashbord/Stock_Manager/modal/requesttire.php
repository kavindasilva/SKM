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


?>