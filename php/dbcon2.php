
<?php
// me file eke thiyenne mage mysql ekata configure karapu credentials
$host="127.0.0.1";
$uname="root";
$password="1";
$dataBase="skm";

$conn=new mysqli($host,$uname,$password,$dataBase);

//oop
if($conn->connect_error){
	die("<p>Connection failed: " . $conn -> connect_error . "</p>");
}
else{
	//echo "connected to " . $dataBase . "<hr/>";
}

?>