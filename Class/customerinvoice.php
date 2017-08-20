<?php

class customerinvoice{
	public $Fname;
	public $Lname;
	public $contact;
	public $subtot;
	public $discount;
	public $netamount;
	
	
	function __construct($Fname,$Lname,$contact,$subtot, $discount,$netamount){
		$this->$Fname=$Fname;
		$this->$Lname=$Lname;
		$this->$contact=$contact;
		$this->$subtot=$subtot;
		$this->$discount=$discount;
		$this->$netamount=$netamount;
		
	}
	public function add(){
		$query="INSERT INTO customerinvoice (Fname,Lname,Contact,subtot,discount,netamount) VALUES('$this->Fname','$this->Lname','$this->contact','$this->subtot','$this->discount','$this->netamount')";
		
		if (mysql_query($conn, $query)) 
    		echo "New record created successfully";
 		else 
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);

		mysqli_close($conn);
	}
}
?>