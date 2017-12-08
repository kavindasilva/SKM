<?php
require_once('../../../php/dbcon.php');

if(isset($_POST['brand'])&& isset($_POST['country'])){
	$query="select tire_size from tire where country='".$_POST['country']."' and brand_name='".$_POST['brand']."'";
	$result=mysqli_query($conn,$query);
	if(!$result){
		echo mysqli_error($conn);
	}
	else{
	while($row=mysqli_fetch_array($result)){
		echo $row['tire_size']." ";
	}
	}
	
}
?>