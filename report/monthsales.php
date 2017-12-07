<?php
require_once "../php/dbcon.php";
require_once('fpdf.php');
//include_once('template1.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

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
	//$this->Image('dun.jpg',5,5,60,15, 0, 0, '', false,'');  


$this->SetFillColor(255,255,205); //table header color
$w=array(15,30,25, 20, 25,30); //,15 ,15,15, 15); //header cell size
	
	
	//table Header
	/**/
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'L',true);
	$this->Ln();/**/
	

	//Data
	$tmpcnt=1;
	$this->SetFont('Arial','',10);
	//foreach ($data as $eachResult) 
	while ($eachResult=mysqli_fetch_assoc($data)) 
	{ //width
		$this->Cell(10);
		//$this->Cell(10,6,$tmpcnt,1);
		//$this->Cell(20,6,$eachResult["indexno"],1,0,0, true); //width height
		$this->Cell(15,6,$eachResult["sord_no"],1); //width height
		$this->Cell(30,6,$eachResult["shop_name"],1);
		//$this->Cell(10,6,$eachResult["is2001"],1);
		//$this->ks_fillcell(15,6,$eachResult["is2001"],1);
		
		//$this->Cell(20,6,$eachResult["is1002"],1);
		//$this->ks_fillcell(10,6,"-",1);
		$this->Cell(25,6,$eachResult["tel"],1);
		$this->Cell(20,6,$eachResult["status"],1);
		
		$this->Cell(25,6,$eachResult["date"],1);
		$this->Cell(30,6,$eachResult["total_amount"],1);
		
		$this->Ln();
		$tmpcnt++;
		 	 	 	 	
	} //end of loop
	
	
}// end of function

}//end of the class



//$pdf=new PDF();
$pdf=new PDF('P','mm',array(210,297));  //a4 size paper
$pdf->SetCreator("youth builders");
$pdf->SetAuthor('group 29');
$pdf->SetTitle('Dunlop');
$pdf->SetSubject('monthly sales report');
$pdf->SetKeywords('');
$pdf->AliasNbPages();
	
//table header
$header=array();
$header=array('order id','dealer name','tel. no','order status','order date', 'total amount(Rs)');

$strSQL = "Select * From sales_order s, dealer d where s.dealer_d_id=d.d_id;";
$strSQL2= "Select * From sales_order s, customer c where (s.regular_customer_r_id=c.r_id and s.date like '%-10-%')";
//Select * From sales_order s, dealer d, customer c where (s.dealer_d_id=d.d_id and s.date like '%-10-%') or (s.regular_customer_r_id=c.r_id and s.date like '%-10-%')

$objQuery = mysqli_query($conn,$strSQL); //result set
$i=0;



//*** Table 1 ***//
$pdf->AddPage();

	$pdf->SetFont('Helvetica','B',14);
	$pdf->Cell(0,10,'Monthly Sales report',0,0,'C');
	$pdf->Ln();
	
	$pdf->SetFont('Helvetica','',8);
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(37);
	$result=mysqli_query($conn,"select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )
	{
		$pdf->Write(5,'Generated date: '.$row['date']);
	}
	$pdf->Ln();
	
	$result=mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn));
	
	
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	//$pdf->Write(5, 'Total Students: '.$count.'');
	//$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
$pdf->BasicTable($header,$objQuery);


//$pdf->Output('tempfile.pdf'); //server eke save venne
//$pdf->Output('s','/docs/tempfile');
$pdf->Output();


?>