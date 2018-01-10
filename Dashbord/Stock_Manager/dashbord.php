  <div style="padding: 7px;">
  <section class="content-header">
   <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
          <li class="active"><a href="#"><i class="fa"></i>Dashbord</a></li>
      </ol>
    </section>
     <div class="box">
      	</div>
   
<!--main menu item goes here-->    
   <div class="row col-md-10 col-md-offset-1">
        <div class="col-md-6 col-sm-12 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
            
              <span class="info-box-text">Stock</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" onClick="dashbordcontrol('viewstock');">Manage Stock</button>
		
        </div>
       
        <!-- /.col -->
        <div class="col-md-6 col-sm-12 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Notifications</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" name="lowstock" onClick="dashbordcontrol('lowstock');">Low Stock Levels</button>
          <button class="form-control dashbordbtn" name="outofstockorders" onClick="dashbordcontrol('outofstockorders');">Out of Stock Orders</button>
        </div>
        
        <!-- /.col -->
      </div>
<!--main menu item concludes here-->  
<div class="row col-md-6 col-md-offset-3">
 <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Stock Status Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
</div>
	
</div>
<script src="../../js/Chart.min.js"></script>	
<script>
  $(function () {

    // Get context with jQuery - using jQuery's .get() method.
   var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Dunlop','Japan'); ?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "Dunlop-Japan"
      },
      {
        value: <?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Dunlop','Thaiwan'); ?>,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Dunlop-Thaiwan"
      },
      {
        value: <?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Dunlop','indunesia'); ?>,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "Dunlop-Indunesia"
      },
      {
        value:<?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Kaizen','Japan'); ?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Kaizen-Japan"
      },
      {
        value: <?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Kaizen','Thaiwan'); ?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Kaizen-Thaiwan"
      },
      {
        value: <?php require_once('../../charts/Stockstatuschart.php'); 
		  getstockamount('Kaizen','indunesia'); ?>,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Kaizen-Indunesia"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

  });
</script>