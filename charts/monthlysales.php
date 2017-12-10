<?php
// this file gives monthly sales of dunlop and kaizen tires
require_once('../../php/dbcon.php');
function getreport($brandtype){
echo "[";	
for($month_given=6;$month_given<=12;$month_given++)	{
$tcount=0;
	
$getinvoce="SELECT * FROM invoice";
if($result=mysqli_query($GLOBALS['conn'],$getinvoce)){
	while($invoice=mysqli_fetch_array($result)){//taking each invoice
		$date=$invoice['date'];
		$date=explode("-",$date);
		$month=$date[1];
	
		if($month_given==$month){//check the month is matchin to given month
			//then get the invoice items of that invoice
			$invoice_items="SELECT * FROM invoice_item where invoice_no=\"".$invoice['invoice_no']."\";";
			if($result2=mysqli_query($GLOBALS['conn'],$invoice_items)){
				while($invoice_item=mysqli_fetch_array($result2)){//taking each invoice item
					$tid=$invoice_item['tire_t_id'];
					$gettire="SELECT brand_name FROM tire WHERE t_id=$tid";
					$result3=mysqli_query($GLOBALS['conn'],$gettire);	
					$tire=mysqli_fetch_array($result3);
					if($tire['brand_name']==$brandtype){
						$tcount+=$invoice_item['qty'];
					}
					
					
				}
			}
		}
	}
if($month_given==12){
	echo $tcount."]";
}
else{
	echo $tcount.",";
}	

}
else
	echo mysqli_error($conn);	
}
}


?>