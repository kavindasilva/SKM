<?php
require_once('fpdf.php');
require_once("../php/dbcon.php");
$d=date('d_m_Y');
class PDF extends FPDF
{
//	Monthly sold items quantity
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{ 
$this->SetFillColor(200,255,205); //table header color
$w=array(20,30,25,35, 15,);//30,15); //,15,15, 15); //header cell size
	
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'L',true);
	$this->Ln();/**/
	

	//Data
	$tmpcnt=1;
	$this->SetFont('Arial','',10);
	$this->SetFillColor(255,255,255);
	//foreach ($data as $eachResult) 
	while ($eachResult=mysqli_fetch_assoc($data)) 
	{ //width
		$this->Cell(10);
		if($eachResult["totq"]<=3){
			$this->SetFillColor(200,100,100);
		}
		//$this->Cell(10,6,$tmpcnt,1);

		$this->Cell(20,6,$eachResult["t_id"],1,0,'',true); //width height
		$this->Cell(30,6,$eachResult["brand_name"],1,0,'',true);
		$this->Cell(25,6,$eachResult["country"],1,0,'',true);
		
		//$this->Cell(20,6,$eachResult["t_type"],1,0,'',true);
		$this->Cell(35,6,$eachResult["tire_size"],1,0,'',true);
		//$this->Cell(30,6,$eachResult["unit_price"],1,0,'',true);
		
		$this->Cell(15,6,$eachResult["totq"],1,0,'',true);
		$this->SetFillColor(100,100,100);
		$this->Ln();
		$tmpcnt++;
		$this->SetFillColor(255,255,255);
		 	 	 	 	
	} //end of loop
	
	
}// end of function

}//end of the class++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



$pdf=new PDF();
$pdf->SetCreator("ape admin");
$pdf->SetAuthor('testing 29');
$pdf->SetTitle('Dunlop');
$pdf->SetSubject('Monthly sold items quantity');
$pdf->AliasNbPages();
	
//table header
$header=array();
$header=array('Tire ID','Brand','Country','Tire size', 'Quantity'); 

$year='2017';
//$year=$_GET['yr'];
$months='12';
//$months=$_GET['mnth'];
//Data loading
//*** Load MySQL Data ***//
/**		DATABASE QUERY	*/
$strSQL = "SELECT i.sales_order_sord_no, t.t_id
FROM invoice i, sales_order s, invoice_item it, tire t 
where i.sales_order_sord_no=s.sord_no and it.invoice_no=i.invoice_no and it.tire_t_id=t.t_id
AND i.STATUS='paid' 
and year(i.date)='$year' and month(i.date)='$months'
GROUP by t.t_id";


$objQuery = mysqli_query($conn,$strSQL); //result set
$i=0;

//*** Table 1 ***//
$pdf->AddPage();

	$pdf->SetFont('Helvetica','',14);
	$pdf->Ln();
	$pdf->Cell(0,10,'Monthly sold items quantity Report',0,0,'C');
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(57);
	$result=mysqli_query($conn,"select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )
	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	$result=mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn));
		
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	$pdf->Write(5, 'Total Items: '.$count.''); $pdf->Ln();
	$pdf->Write(5, "Month = ".$year."/".$months." ");
	//$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
//$pdf->BasicTable($header,$resultData);
$pdf->BasicTable($header,$objQuery);


$pdf->Output('docs/monthQuan.pdf'); //server eke save venne
header("Location: docs/monthQuan.pdf");
?>