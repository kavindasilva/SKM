<?php
include_once "php/tireDetails.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SKMM.Home</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--SKM file-->
	<link href="css/home.css" rel="stylesheet">
	<link href="css/aos.css" rel="stylesheet">
     <link href="css/footer.css" rel="stylesheet">
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>	
	<script src="js/tableFilter.js"></script>	
	<link rel="stylesheet" href="fonts/font-awesome.min.css">	
	<!-- tab icon-->
	<link rel="icon" href="images/skmlogo.jpg">	
  </head>	
  
  <div class="modal fade" id="loginModal">
         <div class="modal-dialog">
         <div class="modal-content">   
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 style="color: black;font-style: italic;font-weight:500"><img  src="images/skmlogo.jpg" id="loginicon"> Login</h3>
          </div>
          <div class="modal-body">
            <form method="post" action="php/user.php" name="login_form">
             <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="UserName" name="euname" id="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
             <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback" name="passwd" required></span>
      </div>
              
              
              <p><button type="submit" class="btn btn-primary">Sign in</button>
                <a  style="color: black;font-style: italic;font-weight:500" href="#">Forgot Password?</a>
              </p>
            </form>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Close</button>
                
              </div>
			 </div>
	  </div>
	  </div>
  <body id="mainbackground">	
  <div class="">
  <!--header-->
   <header id="header" class="row">   
   		<a href="index.php"><img src="images/skmlogo.jpg" id="hedinicon"></a>
	   	<nav id="header-nav-wrap">
	   	
			<ul class="header-main-nav">
				<li class="skm">SKMunasinghe Motors</li>
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                <li ><a class="smoothscroll"  href="#about" title="about">About</a></li>
				<li><a class="smoothscroll"  href="#Other" title="Other">Other</a></li>
				<li><a class="smoothscroll"  href="#Contact" title="Contact">Contact Us</a></li>
			</ul>

            <button  data-toggle="modal" class="btn btn-warning" data-target="#loginModal" >Sign In</button>
		</nav>
   </header>
   <!-- header concludes here-->
    
  
<!--
    <div id="carousel1" class="carousel slide col-md-12" data-ride="carousel" data-aos="fade-up">
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
        <li data-target="#carousel1" data-slide-to="3"></li>
        <li data-target="#carousel1" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item"><img src="images/inside.PNG" alt="First slide image" class="center-block">
          <div class="carousel-caption">
          
          </div>
        </div>
        <div class="item active "><img src="images/front_view.PNG" alt="Second slide image" class="center-block">
          <div class="carousel-caption">
          
          </div>
        </div>
        <div class="item"><img src="images/PDFX3_PosterA1-sls1.jpg" alt="Third slide image" class="center-block">
          <div class="carousel-caption">
           
          </div>
        </div>
         <div class="item"><img src="images/ee89fd5530e893a8b70273a5e779bef4.jpg" alt="Third slide image" class="center-block img-responsive">
          <div class="carousel-caption">
          
          </div>
        </div>
         <div class="item"><img src="images/we-are-dunlop_tcm2094-151479.jpg" alt="Third slide image" class="center-block">
          <div class="carousel-caption">
            
          </div>
        </div>
      </div>
 
      <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
-->
	<img id="bannervideo" src="images/bannervideo.gif" style="margin-top: 70px;" width="100%">
	<img id="banner" src="images/banner.jpg" style="margin-top: 70px;" data-aos="zoom-out-up"> 
 	<div id="pricelist" data-aos="flip-up">
    	<div class="tab col-md-8" >
    		<div class="box-header">
              <h4 class="box-title">Tires price List</h3>
            </div>
  			<button class="tablinks" onclick="searchRows2(4,'car','orderitems');">Passenger Car Tyres</button>
 			<button class="tablinks" onclick="searchRows2(4,'4wd','orderitems')">4x4 (RV/4WD) Tyres</button>
  			<button class="tablinks" onclick="searchRows2(4,'bus','orderitems')">Truck Tyres & Bus Tyres</button>
  			<button class="tablinks" onclick="searchRows2(4,'','orderitems')">All</button>
  			<button class="tablinks" onclick="document.getElementById('myInput').value=''; searchRows2(4,'','orderitems');">Clear</button>
		
 		
			<input type="text" id="myInput" class="form-control" onkeyup="searchRows(0,this.id,'orderitems');" placeholder="Type to search tire size.."/>
			</br>
			</div>
			<!--google map location of SKM-->          
          
          <div id="map" class="pull-right col-md-5"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.346597921569!2d79.87071012246584!3d6.880222420451064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd3e5718eafe129f4!2sS.+K.+Munasinghe+Motors!5e0!3m2!1sen!2s!4v1503665177210" width="550" height="500" frameborder="0" style="margin-top: 20px;" allowfullscreen></iframe></div>
			
<!-- dunlop tires price list table-->			
			<div class="row">
  		<div class="box col-md-6 box-success" id="pricetable">
            
            <!-- /.box-header -->
            <div class="box-body scrollbar" id="style-1">
            
              <table id="orderitems" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Tire Size</th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Vehicle type</th>
				  <th>Price</th>
                </tr>
                </thead>
                <tbody>
                	     
                	<?php viewTire(); ?>                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		  

          </div>
		</br>
<!-- kaizen tires price list-->          
        
<!-- kaizen tires price list concludes here-->           
   	
    </div>
<!-- fotter goes here-->    
    <div id="footterskm" style="font-family: 'Lobster', cursive;">

    <div class="col-md-3 col-sm-3" id="footerheding">
    	<label><strong>SKM</strong>unasinghe Motors <br>
            <p style="color:gray;font-size: medium;margin-top: 10px;">sales@skmmlk.com
            sales2@skmmlk.com
            sktm@skmmlk.com
            </p>
        </label>
    </div>
    <div class="col-md-3 col-sm-3">
        <h4 style="color: gray;margin-top: 30px;"><strong> call us on: <br>011 2589432 <br> 011 2590313 <br> 011 5231913
            </strong>
            <h4>
    </div>

    <div class="col-md-3 col-sm-3">
        <h4 style="color: gray;margin-top: 30px;">
            <strong>S.K.Munasinghe Motors,<br>
                436,<br> Havelock Road,<br>
                Colombo 06.<br>
                Sri Lanka.
            </strong>

        </h4>
    </div>
    <div class="col-md-3 col-sm-3">
        <ul class="list-unstyled" style="margin-top: 10px; font-size: medium;margin-top: 30px">
            <li>
                <a class="white-text" href="#">
                    <i class="small fa fa-facebook-square white-text"></i> Facebook
                </a>
            </li>
            <li>
                <a class="white-text" href="#">
                    <i class="small fa fa-google-plus-square white-text"></i> Google+
                </a>
            </li>

            <li>
                <a class="white-text" href="#">
                    <i class="small fa fa-twitter-square white-text"></i> Twitter
                </a>
            </li>
            <li>
                <a class="white-text" href="#">
                    <i class="small fa fa-linkedin-square white-text"></i> Linkedin
                </a>
            </li>
        </ul>
    </div>



    </div>
</div>
<!-- fotter concluds here-->
  </body>
  
  <script>
	  $('#bannervideo').hide();
	  var time=8000;
	  var flag=1;
	  function bannerchange(){
		  if(flag){
			   $('#banner').hide();
		  	   $('#bannervideo').show();
			   flag=0;
			   
		  }
		  else{
			   $('#bannervideo').hide();
		  	   $('#banner').show();
			   flag=1;
			  
		  }
		 
	  }
	 
	  setInterval(bannerchange, time);
    AOS.init();
  </script>
  
</html>