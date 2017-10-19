<?php
require_once('../../../php/dbcon.php');
session_start();
$query="UPDATE quotation SET status='replied' WHERE q_no='".$_SESSION['qno']."';";
echo(mysqli_query($conn,$query));

?>