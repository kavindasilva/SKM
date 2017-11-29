<?php
require_once "../php/dbcon.php";
require_once('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
{
	$this->Image('dun.jpg',60,10,90,0,'JPG');
    $this->SetFont('Helvetica','',25);
	$this->SetFontSize(8);
	//$this->Write(10, 'headS');
	//$this->Cell(30,10,'SKM',1,0,'C');
    //Move to the right
    $this->Cell(80);
    //Line break
    $this->Ln(22);
}

//Page footer
function Footer()
{
	
	/** legend *
	$this->Cell(20,6,'',0);
	$this->Cell(16,6,"Absent",1);$this->SetFillColor(0,200,200);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Cell(16,6,"Repeat",1);$this->SetFillColor(255,185,255);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Cell(16,6,"Low GPA",1);$this->SetFillColor(255,100,100);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Ln();
	*/
	$this->SetFont('Helvetica','',12);
	
	$this->Cell(0,10,'(c) youth builders',0,0,'C');
	$this->Ln();
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetFontSize(20);
}

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
		$this->ks_fillcell(25,6,$eachResult["tel"],1);
		$this->ks_fillcell(20,6,$eachResult["status"],1);
		
		$this->ks_fillcell(25,6,$eachResult["date"],1);
		$this->ks_fillcell(30,6,$eachResult["total_amount"],1);
		
		/*
		$number=$eachResult["gpa"]/12.0;
		$number=number_format((float)$number, 2, '.', '');
		$this->ks_fillGPA(15,6,($number),1);
*/

		$this->Ln();
		$tmpcnt++;
		 	 	 	 	
	} //end of loop
	
	
}// end of function

function ks_fillcell($w,$h=0,$txt,$border=0,$ln=0,$align='',$fill=0,$link=''){
	
	if($txt=="F"){// || $txt)
		$this->SetFillColor(0,200,200);
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}
	
	elseif($txt=="E"||$txt=="D-"||$txt=="D"||$txt=="D+"||$txt=="C-"){// || $txt)
		$this->SetFillColor(255,185,255);
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}/*
	elseif($txt=="F"){// || $txt)
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}*/
	else{
		$this->Cell($w,$h,$txt,$border,$ln,$align,faLse,$link);
	}
}

function ks_fillGPA($w,$h=0,$txt,$border=0,$ln=0,$align='',$fill=0,$link=''){
	
	if($txt<2.0){
		$this->SetFillColor(0,100,100);
		$this->SetFillColor(255,100,100);
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}
	/*
	elseif($txt=="F"){// || $txt)
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}
	elseif($txt=="F"){// || $txt)
		$this->Cell($w,$h,$txt,$border,$ln,$align,truE,$link);
	}*/
	else{
		$this->Cell($w,$h,$txt,$border,$ln,$align,faLse,$link);
	}
}

//Better table
}//end of the class



$pdf=new PDF();
$pdf->SetCreator("youth builders");
$pdf->SetAuthor('group 29');
$pdf->SetTitle('Dunlop');
$pdf->SetSubject('monthly sales report');
$pdf->SetKeywords('');
$pdf->AliasNbPages();
	
//table header
//$header=array('Index','name','PRG','CS','ISM', 'APPlab','MGT','maths','econ'); //original place
$header=array();
$header=array('order id','dealer name','tel. no','order status','order date', 'total amount(Rs)');//,'stat','BPM','GPA');

$strSQL = "Select * From sales_order s, dealer d where s.dealer_d_id=d.d_id;";


$objQuery = mysqli_query($conn,$strSQL); //result set
$i=0;



//*** Table 1 ***//
$pdf->AddPage();

	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$pdf->SetFont('Helvetica','',14);
	//$pdf->Cell(68);
	$pdf->Cell(0,10,'SK Motors',0,0,'C');
	//$pdf->Write(10, 'UCSC 13th batch IS');
	$pdf->Ln();
	
	$pdf->SetFont('Helvetica','',8);
	//$pdf->Cell(88);
	$pdf->Cell(0,8, 'monthly sales report',0,0,'C');
	
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
	
	//count total numbers of visitors
	//$result=mysql_query("Select * from sem3r") or die ("Database query failed: $query<hr>" . mysql_error());
	$result=mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn));
	
	
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	//$pdf->Write(5, 'Total Students: '.$count.'');
	//$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
$pdf->BasicTable($header,$objQuery);


$pdf->Output('tempfile.pdf'); //server eke save venne



?>