<?php require_once('../../../php/dbcon.php');
$tid=$_POST['tid'];
$delete="DELETE FROM tire WHERE t_id=$tid;";
if(mysqli_query($conn,$delete)){

}
else{
	echo (mysqli_error($conn));
}



?>