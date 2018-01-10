
<?php
/**
	This is the chief managers normal reports generation control class
	Reports Main page
*/

//echo "file called";




?>
<html>
	<head>
		<style>
			.skm-def1{
				height: 50px;
			}
		</style>
	</head>
	
<body>

<section class="content-header">
   <h1>
       Reports
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Reports</a></li>
          <li class="active"><a href="#"><i class="fa"></i>Charts</a></li>       
      </ol>
    </section>
    <div class="box">   		
    	</div>
<div class="container">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Stock Status</a></li>
    <li><a data-toggle="tab" href="#menu1">Monthly sales quantity</a></li>
    <li><a data-toggle="tab" href="#menu2">Monthly Sales</a></li>
    <li><a data-toggle="tab" href="#menu3">Low Stock</a></li>
    <li><a data-toggle="tab" href="#menu4">Purchase Requisitions</a></li>
  </ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
		<a href="report2.php" target="frm1"><input type="button" value="view Current stock status report"  class="btn   btn-success"> </a>
		<input type="button" value="print Current stock status report"  class="btn  btn-success" onclick="openTab('../../report/reports2.php')"/> 	<br/>
    </div>
    <div id="menu1" class="tab-pane fade">
		<input type="month" name="months3" id="months3" onchange="checkCur(this.id)"/>

		<input type="button" onclick="viewMonthReport('report3.php','months3')" id="months3btn" value="view Monthly sales quantity"  class="btn   btn-success"  disabled /> 
		<input type="button" id="months3btn2" value="print Monthly sales quantity"  class="btn   btn-success" onclick="openTabMonth('../../report/reports3.php','months3')" disabled  /> 	<br/>
    </div>
    <div id="menu2" class="tab-pane fade">
		  <!--month sales report = report4.php -->
		<input type="month" name="months2" id="months4" onchange="checkCur(this.id)"/>

		<input type="button" id="months4btn" onclick="viewMonthReport('report4.php','months4')" value="view Monthly sales report"  class="btn   btn-success"  disabled  /> 
		<input type="button" id="months4btn2" value="print Monthly sales report"  class="btn   btn-success" onclick="openTabMonth('../../report/reports4.php','months4')" disabled   /> 	<br/>
    </div>
    <div id="menu3" class="tab-pane fade">
		<a href="report5.php" target="frm1"><input type="button" value="view low stock report"  class="btn   btn-success"> </a>
		<input type="button" value="print low stock report"  class="btn   btn-success" onclick="openTab('../../report/reports5.php')"/> 	<br/>
    </div>
    <div id="menu4" class="tab-pane fade">
		  <!--month sales report = report6.php -->
		<input type="month" name="months6" id="months6" onchange="checkCur(this.id)"/>

		<input type="button" id="months6btn" onclick="viewMonthReport('report6.php','months6')" value="view purchase requisitions report"  class="btn   btn-success"  disabled  /> 
		<input type="button" id="months6btn2" value="print purchase requisitions report"  class="btn   btn-success" onclick="openTabMonth('../../report/reports6.php','months6')" disabled   /> 	<br/>
    </div>
  </div>
</div>

<script type="text/javascript" src="chiefmgr.js"></script>

<script type="text/javascript" >
	function openTab(url){
		window.open(url, '_blank');
	}
	
	function openTabMonth(url, ele){ //url and element id
		var datm=document.getElementById(ele).value;
		var datmsplit=datm.split('-');
		var phpM = datmsplit[1]; // month
		var phpY = datmsplit[0]; // year
		
		url=url+"?yr="+phpY+"&mnth="+phpM;
		//alert(url);
		
		window.open(url, '_blank');
	}
	
	function viewMonthReport(url, ele){ //url and element id
		var datm=document.getElementById(ele).value;
		var datmsplit=datm.split('-');
		var phpM = datmsplit[1]; // month
		var phpY = datmsplit[0]; // year
		
		url=url+"?yr="+phpY+"&mnth="+phpM;
		//alert(url);
		document.getElementsByName('frm1')[0].src = url;
		//return url;
		//window.open(url, '_blank');
	}
</script>

<div class="skm-def1">
</div>

<center>
<iframe src="" name="frm1" id="frm1" width=800 height=500 style="overflow: scroll; border-color: #00AA00;" >
</iframe>
</center>

</body>
</html>



