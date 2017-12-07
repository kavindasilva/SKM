<?php require_once('../../../php/dbcon.php');
$country=$_POST['country'];
$tyresize=$_POST['tyresize'];
$brandname=$_POST['brandname'];
$qty=$_POST['qty'];
$unitprize=$_POST['unitprize'];
$tid=$_POST['tid'];
$supid="SELECT s_id FROM supplier WHERE brand='$brandname' and country='$country';";
if($result=mysqli_query($conn,$supid)){
$supid=mysqli_fetch_array($result);
}
else{
    echo (mysqli_error($conn));
}
$add="INSERT INTO tire VALUES (NULL, '$country', '$tyresize', '$brandname', $qty, $unitprize,'Available', '$supid');";
if(mysqli_query($conn,$add)){
	echo "success";
}
else{
    echo (mysqli_error($conn));
}



?>