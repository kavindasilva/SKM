
<?php
/**
	This is the chief managers normal reports(without date limits) generation control class
*/

echo "file called";




?>
<html>
	
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
	<a href="report3.php" target="frm1"><input type="button" id="monthsbtn" name="" onclick="testAlert()" value="Monthly sales report"  class="btn btn-sm btn-info" /> </a>
	<input type="button" id="monthsbtn2" name="" value="Monthly sales report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports3.php')" /> 	<br/>


<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>


<iframe src="" name="frm1" id="frm1" width=800 height=500 style="" >
</iframe>

</body>
</html>



