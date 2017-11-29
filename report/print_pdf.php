<?php
require('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
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
//$this->SetDrawColor(255, 0, 0);
//$w=array(25,20,30,20,20,55); //header cell size
$w=array(10,20,50,15, 15,15,15,15,15, 15); //header cell size
	
	
	//table Header
	/**/
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'L',true);
	$this->Ln();/**/
	
	//$this->Image('logo.png',10,20,33,0); 	

	//$this->Image(imagecreatefrompng('logo.png'),1,1,20,10, 0, 0, '', false,'');  
	//$this->Image('logo.jpg',1,1,20,10, 0, 0, '', false,'');  
		
	//Image(5,5,0,0,'');
	/**
	//$result = mysqli_query($con, 'SELECT * FROM myTable');
	//while ($property = mysqli_fetch_field($data)) {
	for($i=0;$i<mysqli_num_fields($data)-1;$i++) {
		$property= mysqli_fetch_field($data);
		echo $property -> name;
		
		$this->Cell($w[$i],7,$property->name,1,0,'L',truE);
		
	}
	$this->Ln();*/
	
	//Data
	$tmpcnt=1;
	$this->SetFont('Arial','',10);
	//foreach ($data as $eachResult) 
	while ($eachResult=mysqli_fetch_assoc($data)) 
	{ //width
		$this->Cell(10);
		$this->Cell(10,6,$tmpcnt,1);
		//$this->Cell(20,6,$eachResult["indexno"],1,0,0, true); //width height
		$this->Cell(20,6,$eachResult["indexno"],1); //width height
		$this->Cell(50,6,$eachResult["lname"],1);
		//$this->Cell(10,6,$eachResult["is2001"],1);
		$this->ks_fillcell(15,6,$eachResult["is2001"],1);
		
		//$this->Cell(20,6,$eachResult["is1002"],1);
		//$this->ks_fillcell(10,6,"-",1);
		$this->ks_fillcell(15,6,$eachResult["is2003"],1);
		$this->ks_fillcell(15,6,$eachResult["is2004"],1);
		
		$this->ks_fillcell(15,6,$eachResult["is2005"],1);
		$this->ks_fillcell(15,6,$eachResult["is2006"],1);
		
		$number=$eachResult["gpa"]/12.0;
		$number=number_format((float)$number, 2, '.', '');
		$this->ks_fillGPA(15,6,($number),1);


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
$pdf->SetCreator("ape admin");
$pdf->SetAuthor('testing 29');
$pdf->SetTitle('Dunlop');
$pdf->SetSubject('Sem results');
$pdf->SetKeywords('');
$pdf->AliasNbPages();
	
//table header
//$header=array('Index','name','PRG','CS','ISM', 'APPlab','MGT','maths','econ'); //original place
$header=array();
$header=array('Rank','Index','Full name','SE1','MKT', 'web','stat','BPM','GPA');


//Data loading
//*** Load MySQL Data ***//
$objConnect = mysqli_connect("localhost","root","","kss") or die("Error:Please check your database username & password");

/**		DATABASE QUERY	*/
//$strSQL = "Select * From sem3r;";
$strSQL = "Select * From sem3r order by gpa desc;";


$objQuery = mysqli_query($objConnect,$strSQL); //result set
$i=0;

/*
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
}*/
//************************//


//*** Table 1 ***//
$pdf->AddPage();

	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$pdf->SetFont('Helvetica','',14);
	//$pdf->Cell(68);
	$pdf->Cell(0,10,'UCSC 13th batch IS',0,0,'C');
	//$pdf->Write(10, 'UCSC 13th batch IS');
	$pdf->Ln();
	
	$pdf->SetFont('Helvetica','',8);
	//$pdf->Cell(88);
	$pdf->Cell(0,8, '(sem 3 result)',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(57);
	$result=mysqli_query($objConnect,"select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )
	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	//count total numbers of visitors
	//$result=mysql_query("Select * from sem3r") or die ("Database query failed: $query<hr>" . mysql_error());
	$result=mysqli_query($objConnect,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error());
	
	
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	$pdf->Write(5, 'Total Students: '.$count.'');
	//$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
//$pdf->BasicTable($header,$resultData);
$pdf->BasicTable($header,$objQuery);

//forme();
//$pdf->Output("$d.pdf","F");
//$pdf->Output(); //thibba eka
//$pdf->Output('d','tempfile.pdf'); //chrome eken view karanna hadapu eka
$pdf->Output('tempfile.pdf'); //server eke save venne

//echo "<script>window.history.back();</script>";

//header("Location: chrome-extension://oemmndcbldboiebfnladdacbdfmadadm/file:tempfile.pdf");
//header("Location: chrome-extension://oemmndcbldboiebfnladdacbdfmadadm/tempfile.pdf");

?>