<?php

require_once '../../../php/dbcon.php';
require_once('../../../Class/customerinvoice.php');
$newinvoice= new customerinvoice($_POST['fname'],$_POST['lname'],$_POST['contact'],$_POST['total'],$_POST['discount'],$_POST['netamount']);
$newinvoice->add();

?>