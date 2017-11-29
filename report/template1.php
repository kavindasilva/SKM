<?php
/*require('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{
*/
function Header1()
{
	$this->Image('img/skm-logo.jpg',60,10,90,0,'JPG');
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
function Footer1()
{
	
	/** legend *
	$this->Cell(20,6,'',0);
	$this->Cell(16,6,"Absent",1);$this->SetFillColor(0,200,200);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Cell(16,6,"Repeat",1);$this->SetFillColor(255,185,255);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Cell(16,6,"Low GPA",1);$this->SetFillColor(255,100,100);$this->Cell(10,6,"",1,'','',truE);$this->Cell(4,6,"",0,'','',faLse);
	$this->Ln();
	*/
	$this->SetFont('Helvetica','',12);
	
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetFontSize(20);
}

?>