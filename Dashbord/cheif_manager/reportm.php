<html>
	<head>
		<style>
			.skm-def1{
				height: 50px;
			}
			.nav-tabs li{
				background-color:#DCDCDC;
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
<section class="content">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Stock Status</a></li>
    <li><a data-toggle="tab" href="#menu1">Monthly sales quantity</a></li>
    <li><a data-toggle="tab" href="#menu2">Monthly Sales</a></li>
    <li><a data-toggle="tab" href="#menu3">Low Stock</a></li>
    <li><a data-toggle="tab" href="#menu4">Purchase Requisitions</a></li>
  </ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
		<br/>
		<label>Date &nbsp;:&nbsp;&nbsp;</label><label class="showdate"></label>
		<input type="button" value="Print this report"  class="btn  btn-success btn-sm pull-right" onclick="openTab('../../report/reports2.php')"/> <br/><br/>
		
        <div class="box container">
            <div class="box-body" style="overflow-x:auto;">
				<table class="table table-hover">
  				<?php include('report2.php'); ?>
			</div>
		</div>
    </div>
    <div id="menu1" class="tab-pane fade">
		</br>
  		<label>Date &nbsp;:&nbsp;&nbsp;</label><label class="showdate"></label>
   		<input type="button" style="margin-left: 5px;" id="months3btn2" value="Print report"  class="btn pull-right btn-sm btn-success" onclick="openTabMonth('../../report/reports3.php','months3')" disabled  /> 
   		<input type="button" onclick="viewMonthReport('report3.php','months3')" id="months3btn" value="view report"  class="btn btn-success pull-right btn-sm"  disabled />
    	<div class="pull-right" style="margin-right: 5px;">
    		<label>Pick a date &nbsp;:&nbsp;&nbsp;</label>
			<input type="month" name="months3" id="months3" onchange="checkCur(this.id)"/>
		</div><br/></br>
   		<div class="box container">
            <div class="box-body" style="overflow-x:auto;">
			
<iframe src="" name="frm1" id="frm1" width=800 height=500 style="overflow: scroll; border-color: #00AA00;" frameborder="0" >
</iframe>

			</div>
		</div>
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
</section>

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
	
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  $('.showdate').html(y + "/" + m + "/" + d);
		
</script>

</body>
</html>



