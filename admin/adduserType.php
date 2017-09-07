<?php
/**
	Add new user UI
*/

//header
require_once "head.php";
?>

<section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>
	Select an action<br/>
<div class="">

	<!-- kalin dala thibba buttin 4 -->
	<a href="adduser.php?type=cust"><button class="list-group-item" name="" value="">Customer</button></a>
	<a href="adduser.php?type=salex"><button class="list-group-item" name="" value="">Sales Executive</button></a>
	<a href="adduser.php?type=dealer"><button class="list-group-item" name="" value="">Dealer</button></a> 
	<a href="adduser.php?type=suppl"><button class="list-group-item" name="" value="">Supplier</button></a>
	


</div>

    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<?php
//footer
require_once "foot.php";
?>