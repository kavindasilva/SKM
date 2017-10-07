<?php
require_once('../../../php/dbcon.php');
$qno=$_POST['qno'];
$action=$_POST['action'];


if($action=="qnote"){
	$query="SELECT * FROM QUOTATION WHERE q_no='$qno';";
	$result=mysqli_query($conn,$query);	
	$row=mysqli_fetch_array($result);
	echo $row['quotation_note'];
}
else{
$query2="SELECT * FROM quotation_item WHERE q_no='$qno';";
	$result2=mysqli_query($conn,$query2);
	while($row2=mysqli_fetch_array($result2)){
		$innerquery="SELECT * FROM tire WHERE t_id='".$row2['tire_t_id']."';";
		$innerresult=mysqli_query($conn,$innerquery);	
		$innerrow=mysqli_fetch_array($innerresult);
		echo "<tr class=\"removable \"><td>".$innerrow['brand_name']."</td><td>".$innerrow['country']."</td><td>".$innerrow['tire_size']."</td><td>".$row2['quantity']."</td><td><select style=\"width:100px;\"><option value=\"10%\">10%</option><option value=\"15%\">15%</option><option value=\"20%\">20%</option></select></td></tr>";
	}
}

?>