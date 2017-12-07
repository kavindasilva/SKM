<?php require_once('../../../php/dbcon.php');
$country=$_POST['country'];
$tyresize=$_POST['tyresize'];
$brandname=$_POST['brandname'];
$qty=$_POST['qty'];
$unitprize=$_POST['unitprize'];
$tid=$_POST['tid'];
$ttype=$_POST['ttype'];
$supid="SELECT s_id FROM supplier WHERE brand='$brandname' and country='$country';";

if($result=mysqli_query($conn,$supid)){
$supidg=mysqli_fetch_array($result);
	$supid=$supidg['s_id'];
}
else{
    echo (mysqli_error($conn));
}

$addq="INSERT INTO tire VALUES (NULL, '$country', '$tyresize', '$brandname', $qty, $unitprize,'Available','$supid','$ttype');";

if(mysqli_query($conn,$addq)){
	echo "success";
}
else{
    echo (mysqli_error($conn));
}



?>