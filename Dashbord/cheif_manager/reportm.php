
<?php
/**
	This is the chief managers normal reports generation control class
*/

//echo "file called";




?>
<html>
	<head>
		<!--bootstrap-->
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
 		<link rel="stylesheet" href="../../fonts/font-awesome.min.css">
		<link rel="stylesheet" href="../../icon/ionicons.min.css">
		<link rel="stylesheet" href="../../css/AdminLTE.min.css">
		<link rel="stylesheet" href="../../css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../../css/mystyle.css">
		<link rel="icon" href="../../images/skmlogo.jpg">
		<script src="../../js/jquery-3.1.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/fastclick.js"></script>	
	</head>
	
<body>

<script type="text/javascript" src="chiefmgr.js"></script>

<script type="text/javascript" >
	function openTab(url){
		window.open(url, '_blank');
	}
</script>


<a href="report2.php" target="frm1"><input type="button" name="" value="Current stock status report"  class="btn btn-sm btn-info"> </a>
<input type="button" name="" value="Current stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>


	<input type="month" name="months" id="months" onchange="checkCur('months')"/>
	<a href="report3.php" target="frm1"><input type="button" id="monthsbtn" name="" onclick="testAlert()" value="Monthly sales quantity"  class="btn btn-sm btn-info" /> </a>
	<input type="button" id="monthsbtn2" name="" value="Monthly sales quantity"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports3.php')" /> 	<br/>


	<input type="month" name="months2" id="months" onchange="checkCur('months')"/>
	<a href="report3.php" target="frm1"><input type="button" id="months2btn" name="" onclick="testAlert()" value="Monthly sales report"  class="btn btn-sm btn-info" /> </a>
	<input type="button" id="months2btn2" name="" value="Monthly sales report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports3.php')" /> 	<br/>


<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>


<iframe src="" name="frm1" id="frm1" width=800 height=500 style="" >
</iframe>

</body>
</html>



