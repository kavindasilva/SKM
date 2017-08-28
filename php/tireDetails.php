

<?php
require_once "dbcon.php";

//select tire types. default all tires
//just display only required fields on the home page
function viewTire($type='All'){
	$sql="";
	if($type=='All'){
		$sql="select * from tire;";
	}
	else{
		$sql="select * from tire where brand_name='".$type."';";
	}
	
	$res=mysqli_query($GLOBALS['conn'], $sql);
	if(!$res){
		echo "Error in the query<br>";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	else{
		if(mysqli_num_rows($res)==0){
			echo "<tr> <td colspan=4>$type tire list is empty</td> </tr>";
		}
		else{
			while($row=mysqli_fetch_array($res)){
				echo "<tr>";
				
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				
				echo "</tr>";
			}
		}
	}
	
}

?>