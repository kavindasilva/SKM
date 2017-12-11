
<?php
/**	

	Low stock report 
*/
require_once "../../php/dbcon.php";


//$strSQL="SELECT t_id, sum(quantity) as totq FROM tire where t_id in (SELECT t_id from tire WHERE quantity<10)  GROUP by t_id";
$strSQL="SELECT t_id, tire_size, brand_name, country, sum(quantity) as totq FROM tire where quantity<20 GROUP by t_id";

$objQuery = mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn)); //result set
//echo "Month = ".$year."/".$months."<BR/>";

if(mysqli_num_rows($objQuery)==0){
	echo "No data in system";
}
else{
	echo "<table>";
	echo "<tr> <th>Tire id</th> <th>Size</th> <th>Brand</th> <th>Country</th>"; //<th>type</th>
	echo " ";// <th>unit price(Rs.)</th> 
	echo "<th>Stock quantity</th> </tr>";
	while ($eachResult=mysqli_fetch_assoc($objQuery)) 
	{ //width
		/*$this->Cell(10);
		if($eachResult["quantity"]<=20){
			$this->SetFillColor(200,100,100);
		}*/
		//$this->Cell(10,6,$tmpcnt,1);
		echo "<tr>";
		echo "<td>".$eachResult["t_id"]."</td>";
		echo "<td>".$eachResult["tire_size"]."</td>";
		echo "<td>".$eachResult["brand_name"]."</td>";
		echo "<td>".$eachResult["country"]."</td>";
		echo "<td>".$eachResult["totq"]."</td>";
	 	 	 	
		echo "</tr>"; 	
	}
	echo "</table>";
}


//echo "file called";
?>

<script type="text/javascript">
	function openTab(url){
		window.open(url, '_blank');
	}
</script>








