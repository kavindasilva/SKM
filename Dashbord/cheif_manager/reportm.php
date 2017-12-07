
<?php
/**
	This is the chief managers normal reports(without date limits) generation control class
*/

echo "file called";




?>

<script type="text/javascript" src="chiefmgr.js">
	function openTab(url){
		window.open(url, '_blank');
	}
</script>


<a href="report2.php" target="frm1"><input type="button" name="" value="Current stock status report"  class="btn btn-sm btn-info"> </a>
<input type="button" name="" value="Current stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<form>
	<input type="month" name="months" id="months" onchange="checkCur(this.id)"/>
	<a href="report3.php" id="monthsbtn" target="frm1"><input type="button" name="" value="Monthly sales report"  class="btn btn-sm btn-info" disabled/> </a>
	<input type="button" id="monthsbtn" name="" value="Monthly sales report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports3.php')" /> 	<br/>
</form>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>

<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>


<iframe src="" name="frm1" id="frm1" width=800 height=500 style="" >
</iframe>





