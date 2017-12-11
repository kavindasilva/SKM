<?php
require_once('../../php/dbcon.php');
function getstockamount($brand,$country){
	$tirecount=0;
	$gettires="SELECT quantity FROM tire WHERE brand_name='$brand' and country='$country';";
	if($result=mysqli_query($GLOBALS['conn'],$gettires)){
	while($tire=mysqli_fetch_array($result)){
		$tirecount=$tirecount+$tire['quantity'];
	}
	}
	
	echo $tirecount;
	
}

?>