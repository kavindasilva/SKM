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
				<li><a class="smoothscroll"  href="#pricing" title="pricing">Pricing</a></li>
				<li><a class="smoothscroll"  href="#testimonials" title="testimonials">Testimonials</a></li>
				<li><a class="smoothscroll"  href="#download" title="download">Download</a></li>	
			</ul>

            <button  data-toggle="modal" class="btn btn-warning" data-target="#loginModal" >Sign In</button>
		</nav>
   </header>
   <!-- header concludes here-->
    
  
    <div id="carousel1" class="carousel slide" data-ride="carousel">
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
	  </br></br></br></br></br></br>
    <div class="row"> 
    <div id="dunlop" class=" col-md-6">
    	<img src="images/Dunlop_tyres.svg.png" class="tire" data-aos="fade-up">
    </div>
    <div id="kaizen" class="tire col-md-6">
    	<img src="images/kaizen_logo.jpg" class="tire" data-aos="fade-up">
    </div>
    </div> 
    
  </div>
 <div id="pricelist">
    	
    </div>
 
  </body>
  
  <script>
    AOS.init();
  </script>
  
</html>