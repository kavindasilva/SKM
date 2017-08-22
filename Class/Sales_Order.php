<?php
$host="127.0.0.1";
$uname="root";
$password="";
$dataBase="SKM";

$conn=new mysqli($host,$uname,$password,$dataBase);

//oop
if($conn->connect_error){
	die("<p>Connection failed: " . $conn -> connect_error . "</p>");
}
else{
	//echo "connected to " . $dataBase . "<hr/>";
}
class Sales_Order {
	private $_sOrdNo;
	private $_date;
	private $_totalAmount;
	private $_status;
	private $did;
	private $cusid;
	
	function __construct($tot,$did,$cusid){
		$this->_totalAmount=$tot;
		$this->did=$did;
		$this->cusid=$cusid;
			
	}
	public function addNewOrder($tot,$did,$cusid) {
		//$query="INSERT INTO temporder (tot_amount,status,dealer_d_id,customer_r_id) VALUES(null, '$tot','n','$did','$cusid')";
		$query="INSERT INTO temporder VALUES(null, $tot,'n',$did,$cusid);";
		
		//echo "$query";
		//$query="INSERT INTO temporder VALUES(null, 22, 'k', 44, 4);";
		



		if (mysqli_query( $GLOBALS['conn'], $query)) 
    		echo "New record created successfully";
 		else 
    		echo "Error: " . $query . "<br>" . mysqli_error($GLOBALS['conn']);

		mysqli_close($GLOBALS['conn']);
	}
	/**
	 * @access public
	 */
	public function updateStatus() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function cancleOrder() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function updateOrder() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function getDetails() {
		// Not yet implemented
	}
}
?>