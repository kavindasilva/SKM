<?php
include_once "tireDetails.php";

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
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>	
	<link rel="stylesheet" href="fonts/font-awesome.min.css">		
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
  <div class="container">
  <!--header-->
   <header id="header" class="row">   
   		<a href="index.php"><img src="images/skmlogo.jpg" id="hedinicon"></a>
	   	<nav id="header-nav-wrap">
	   	
			<ul class="header-main-nav">
				<li class="skm">SKMunasinghe motors</li>
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                <li ><a class="smoothscroll"  href="#about" title="about">About</a></li>
				<li><a class="smoothscroll"  href="#Other" title="Other">Other</a></li>
				<li><a class="smoothscroll"  href="#Contact" title="Contact">Contact Us</a></li>
			</ul>

            <button  data-toggle="modal" class="btn btn-warning" data-target="#loginModal" >Sign In</button>
		</nav>
   </header>
   <!-- header concludes here-->
    
  
    <div id="carousel1" class="carousel slide" data-ride="carousel" data-aos="fade-up">
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
	  </br></br></br></br></br>
    <div class="row">
    <div class="col-md-5 pull-left" id="abouttext" style="color: aliceblue;" data-aos="fade-right">
    <label > We are sole agents for Dunlop, Kaizen, Malhotra Tyres & Dong-Ah Tubes</label>
    <p>In 1888, John Boyd Dunlop, a Scottish Veterinarian invented the first practical pneumatic tyre.J.B. Dunlop experimented ways to ease the discomfort of his son's tricycle and eventually came up with the air-filled or pneumatic tyre. From there this remarkable new idea has made a great contribution to the development of contemporary automobile society.Since then, Dunlop flourished in the world for more than 123 years. </p>
    
		</div>
    <div id="dunlop" class=" col-md-2" style="padding-top: 20px;">
    	<img src="images/Dunlop_tyres.svg.png" class="tire" data-aos="fade-left">
    </div>
    <div id="kaizen" class="tire col-md-5" style="padding-top: 20px;">
    	<img src="images/kaizen_logo.jpg" class="tire" data-aos="fade-left">
    </div>
    </div> 
    
  </div>
 	<div id="pricelist">
    	<div class="tab">
  			<button class="tablinks" onclick="openCity(event, 'London')">Passenger Car Tyres</button>
 			<button class="tablinks" onclick="openCity(event, 'Paris')">4x4 (RV/4WD) Tyres</button>
  			<button class="tablinks" onclick="openCity(event, 'Tokyo')">Truck Tyres
    & Bus Tyres</button>
		</div>
 		<div id="searchdiv"><i class="fa fa-search" aria-hidden="true" style="width:5%;margin-left: 10px;"></i>
			<input type="text" id="myInput" onkeyup="" placeholder="Search for tire size.."></div></br>
<!-- dunlop tires price list table-->			
			<div class="row">
  		<div class="box dunlopprice col-md-6" style="background-color:aliceblue;" data-aos="fade-up">
            <div class="box-header">
              <h4 class="box-title">Dunlop tires price List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class="table-bordered table-hover" width="620" >
                <thead>
                <tr>
                  <th>Tire Size</th>
                  <th>Japan</th>
                  <th>Thailand</th>
                  <th>Indonesia</th>
                </tr>
                </thead>
                <tbody>
                	<?php viewTire('Dunlop'); ?>                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
<!--google map location of SKM-->          
          <div id="map" class="pull-right col-md-5" data-aos="fade-up"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.346597921569!2d79.87071012246584!3d6.880222420451064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd3e5718eafe129f4!2sS.+K.+Munasinghe+Motors!5e0!3m2!1sen!2s!4v1503665177210" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
          </div>
		</br>
<!-- kaizen tires price list-->          
          <div class="row">
          	<div class="box dunlopprice col-md-6" style="background-color:aliceblue;" data-aos="fade-up">
            <div class="box-header">
              <h4 class="box-title">Kaizen tires price List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class="table-bordered table-hover" width="620" >
                <thead>
                <tr>
                  <th>Tire Size</th>
                  <th>Japan</th>
                  <th>Thailand</th>
                  <th>Indonesia</th>
                </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="col-md-5" style="margin-left: 80px;">
          <img src="images/tires.png" data-aos="fade-up" class="topbotom">
          <img src="images/cars.usnews.com.jpg" data-aos="fade-up" class="middlepic">
          <img src="images/The-Fast-and-the-Furious-modern-renders-Mitsubishi-Eclipse-Cross.jpg" data-aos="fade-up" class="middlepic">
          <img src="images/1379603518.jpg" data-aos="fade-up"  class="topbotom">
			  </div>
          </div>
<!-- kaizen tires price list concludes here-->           
   	
    </div>
<!-- fotter goes here-->    
    <div id="footterskm">
    <div class="col-md-3" id="footerheding">
    	<label><strong>SKM</strong>unasinghe Motors</label>
    </div>
    	
    </div>
<!-- fotter concluds here-->  
  </body>
  
  <script>
    AOS.init();
  </script>
  
</html>