<?php
    include 'admin/config/koneksi.php';
    //query profile untuk menganmbil data dari database
    $queryAbout = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
    $rowAbout = mysqli_fetch_assoc($queryAbout);

    $queryService = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
    $rowService = mysqli_fetch_all($queryService, MYSQLI_ASSOC);

    $queryBlog = mysqli_query($config, "SELECT * FROM blogs ORDER BY id DESC");
    $rowBlog = mysqli_fetch_all($queryBlog, MYSQLI_ASSOC);

    $queryPorto = mysqli_query($config, "SELECT * FROM portos ORDER BY id DESC");
    $rowPorto = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Website Title -->
    <title>John Doe - Professional web designer and photographer</title>
    <!-- Bootstrap -->
    <link href="depan/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font-Awesome -->
    <link href="depan/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Lightbox -->
	<link href="depan/assets/lightbox/css/lightbox.css" rel="stylesheet">
    <!-- Text Rotator-->
	<link href="depan/assets/textrotator/simpletextrotator.css" rel="stylesheet">
	<!-- FlexSlider -->
    <link href="depan/assets/flexslider/flexslider.css" rel="stylesheet">
	<!-- Theme Style -->
    <link href="depan/css/style.css" rel="stylesheet">
	<!-- Animations -->
    <link href="depan/css/animate.css" rel="stylesheet">
	<!-- Custom Favicon -->
	<link href="depan/img/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="assets/html5shiv/html5shiv.js"></script>
    <script src="assets/respond/respond.min.js"></script>
    <![endif]-->
  </head>
    <body id="top">

      <!-- ****************************** Preloader ************************** -->
      <div id="preloader"></div>


	  	<!-- ==========================
        HEADER SECTION 
        =========================== -->
        <header id="home">
		    <!-- creative menu -->
            <div class="container-fluid">
              <div class="row">
                <div class="menu-wrap">
				<nav class="menu">
				    <!-- Menu Links -->
					<div class="icon-list">
						<a href="#home"><i class="fa fa-fw fa-home"></i><span>Home</span></a>
						<a href="#about"><i class="fa fa-fw fa-quote-left"></i><span>About</span></a>
						<a href="#service"><i class="fa fa-fw fa-globe"></i><span>Service</span></a>
						<a href="#portfolio"><i class="fa fa-fw fa-picture-o"></i><span>Portfolio</span></a>
						<a href="#blog"><i class="fa fa-fw fa-rss"></i><span>Blog</span></a>
						<a href="#contact"><i class="fa fa-fw fa-envelope-o"></i><span>Contact</span></a>
					</div>
				</nav>
			    </div>
			    <button class="menu-button" id="open-button"></button><!-- menu button -->
              </div><!--/row-->
            </div><!--/container-->
		  <!-- Header Image -->
          <section class="hero" id="hero">
            <!-- <?php if (isset($rowAbout['photo']) && !empty($rowAbout['photo'])): ?>
                <img src="admin/uploads/<?php echo ($rowAbout['photo']); ?>" alt="Profile Photo" class="img-fluid" style="width: 20000px;">
            <?php else: ?>
                <p>Tidak ada foto yang tersedia.</p>
            <?php endif; ?> -->
            <div class="container">
			  <!-- Slider Button (don't edit!)-->
              <div class="row">
                <div class="col-md-12 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="index.html#"><span></span></a>
                </div>
              </div>
			  <!-- HEADER HEADLINE -->
              <div class="row">
                <div class="col-md-8 col-md-offset-1 inner">
                  <h1 class="animated fadeInDown">
                    <?php echo isset($rowAbout['name']) ? $rowAbout['name'] : '' ?>
                  </h1><!-- Title -->
                  <h3 class="animated fadeInUp delay-05s"><span class="rotate"><?php echo isset($rowAbout['position']) ? $rowAbout['position'] : '' ?></span></h3><!-- Text Rotator -->
                </div>
              </div>
			  <!-- Learn More Button -->
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="index.html#about" class="scrollto wow fadeInUp delay-5s ">
			            <p>SEE MORE</p>
			            <p class="scrollto--arrow"><img src="depan/img/scroll-down.png" alt="scroll down arrow"></p>
			        </a>
                </div>
              </div>
            </div>
          </section>
		  <!-- Header Image End -->
        </header>
		<!-- ==========================
        HEADER SECTION END  
        =========================== -->
		
		
		
		
		<!-- ==========================
        ABOUT SECTION  
        =========================== -->
        <section class="intro text-center section-padding color-bg" id="about">
          <div class="container">
		    <!-- WELCOME TEXT -->
            <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
                <h1 class="arrow">A littleeee <span>about</span> me</h1><!-- Headline -->
				<!-- about / welcome text -->
                <p><?php echo isset($rowAbout['content']) ? $rowAbout['content'] : ''?></p>
              </div>
            </div>
          </div>
        </section>




<!-- ==========================
        SERVICE SECTION 
        =========================== -->
        <section class="features text-center section-padding" id="service">
          <div class="container">
        <!-- Headline -->
            <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">I do amazing things for clients</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
          <div class="services">
            <?php foreach ($rowService as $key => $data): ?>
          <!-- Service Box 1 -->
                  <div class="col-md-4 wp2 item">
                    <div class="icon">
                      <i class="fa fa-camera"></i><!-- Icon -->
                    </div>
                    <h2><?= $data['skill'] ?></h2>
                    <p><?= $data['description'] ?></p><!-- Description -->
                  </div>
              <?php endforeach ?>
          </div>
                  <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </section>





		<div class="container-fluid">
		    <!-- About 1 -->
			<div class="row color-bg">
				<div class="col-md-6 nopadding features-intro-img">
					<div class="about-image" style="background-image:url(img/about1.png)"></div><!-- about image 1 -->
				</div>
				<div class="col-md-6 about-text">
					<h6>High quality webdesign</h6><!-- headline-->
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p><br><!-- About Text 1 -->
					<a href="index.html#team" class="weight-outline-btn">Read more</a><!-- read more button  -->			
				</div>
			</div>
			<!-- About 2 -->
			<div class="row">
				<div class="col-md-6 about-text">
					<h6>Professional Photography</h6><!-- Headline -->
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p><br><!-- About Text 2 -->
					<a href="index.html#team" class="weight-outline-btn">Read more</a>	<!-- read more button  -->				
				</div>
				<div class="col-md-6 nopadding features-intro-img">
					<div class="about-image" style="background-image:url(img/about2.png)"></div><!-- about image 2 -->
				</div>
			</div>
			<!-- About 3 -->
			<div class="row color-bg">
				<div class="col-md-6 nopadding features-intro-img">
					<div class="about-image" style="background-image:url(img/about3.png)"></div><!-- about image 3 -->
				</div>
				<div class="col-md-6 about-text">
					<h6>3d modeling and animations</h6><!-- Headline-->
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p><br><!-- About Text 3 -->
					<a href="index.html#team" class="weight-outline-btn">Read more</a><!-- read more button  -->					
				</div>
			</div>
		</div>
		<!-- ==========================
        ABOUT SECTION END
        =========================== -->	

		
		
		
		<!-- ==========================
        PORTFOLIO SECTION
    =========================== -->
        <section class="swag text-center" id="portfolio">
          <div class="container">
		    <!-- Headline -->
            <div class="row">
              <h1 class="arrow">
                Recent <span>Projects</span>
              </h1>
            </div>
          </div>
        </section>

        <div class="container">
          <div class="row row-offset-0">
  				 
          <!-- PORTFOLIO ITEM 1 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-01-large.jpg" data-lightbox="roadtrip" title="Project One - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-01-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  	
  	    <!-- PORTFOLIO ITEM 2 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-02-large.jpg" data-lightbox="roadtrip" title="Project Two - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-02-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  					
  		<!-- PORTFOLIO ITEM 3 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-03-large.jpg" data-lightbox="roadtrip" title="Project Three - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-03-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  					
  		<!-- PORTFOLIO ITEM 4 -->
          <div class="col-md-3 col-sm-6 ">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-04-large.jpg" data-lightbox="roadtrip" title="Project Four - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-04-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  	             
          <!-- PORTFOLIO ITEM 5 -->
          <div class="col-md-3 col-sm-6 ">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-05-large.jpg" data-lightbox="roadtrip" title="Project Five - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-05-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  	
  	    <!-- PORTFOLIO ITEM 6 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-06-large.jpg" data-lightbox="roadtrip" title="Project Six - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-06-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  					
  		<!-- PORTFOLIO ITEM 7 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="img/portfolio/portfolio-07-large.jpg" data-lightbox="roadtrip" title="Project Seven - Lorem Ipsum"><img class="grayscale" src="img/portfolio/portfolio-07-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
  					
  		<!-- PORTFOLIO ITEM 8 -->
          <div class="col-md-3 col-sm-6">
              <div class="overlay-effect effects clearfix">
                  <div class="img">
                      <a href="depan/img/portfolio/portfolio-08-large.jpg" data-lightbox="roadtrip" title="Project Eight - Lorem Ipsum"><img class="grayscale" src="depan/img/portfolio/portfolio-08-thumbnail.jpg" alt="Portfolio Item"></a>
                  </div>
              </div>
          </div>
  	    <!-- PORTFOLIO ITEM END -->
        </div><!--/row-->
      </div><!--/.container-->
		<!-- ==========================
        PORTFOLIO SECTION END
        =========================== -->
			


			
		<!-- ==========================
        CUSTOM SPACER
        =========================== -->
		<div class="spacer-cta text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="index.html#contact" class="outline-btn">hire john doe</a>
              </div>
            </div>
          </div>
        </div>
		<!-- ==========================
        CUSTOM SPACER END
        =========================== -->
		
		

    <!-- ==========================
        BLOG SECTION 
        =========================== -->
    <section class="text-center section-padding" id="blog">
          <div class="container">
        <!-- Headline -->
        <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">My <span>little</span> blog</h1>
              </div>
            </div><br><br>
      
      <!-- Blog Slider -->
            <div class="row">
              <div id="blogSlider">
                <ul class="slides">
                  <li>
                    <?php foreach ($rowBlog as $key => $data): ?>
                    <!-- Blog Entry 1 -->
                      <div class="col-md-4 wp4">
                        <div class="overlay-effect effects clearfix">
                          <div class="img">
                            <?php if (isset($rowBlog['photo']) && !empty($rowBlog['photo'])): ?>
                              <img src="admin/uploads/<?php echo ($data['photo']); ?>" alt="Profile Photo" class="img-fluid" style="width: 20000px;">
                            <?php else: ?>
                              <p>Tidak ada foto yang tersedia.</p>
                            <?php endif; ?>
                          </div>
                        </div>
                        <br>
                        <h2><?= $data['title'] ?></h2><!-- Headline -->
                        <p><?= $data['description'] ?></p><!-- Description-->
                      </div>
                    <?php endforeach ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
    <!-- ==========================
        BLOG SECTION END
        =========================== -->
    
        
		
		<!-- ==========================
        CLIENT SECTION 
        =========================== -->
		<div class="container-fluid">
			<div class="row color-bg">
				<!-- Left Image -->
				<div class="col-md-6 nopadding features-intro-img wow fadeInLeft">
					<div class="about-image" style="background-image:url(img/clients.png)"></div>
				</div>
				<!-- Clients / Testimonials -->
				<div class="col-md-6 nopadding about-text">
				<h6>What our clients said</h6>
					<div id="clientSlider">
					   <ul class="slides">
					       <li><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. <br>	<small>- Pete Rock, A New Tomorrow</small></p></li>
						   <li><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. <br>	<small>- Michael Snowden, Creativeland CEO</small></p></li>
						  <li><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. <br>	<small>- Tom Davis, GreenWonder</small></p>	</li>
					   </ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ==========================
        CLIENTS SECTION END
        =========================== -->
		
		
		
		
		
		<!-- ==========================
        NEWSLETTER SECTION 
        =========================== -->
        <section>
		<div class="container-fluid">
				<div class="row color-bg">
				    <div class="col-md-6 nopadding subscribe text-center">
					 <h1><i class="fa fa-paper-plane"></i><span>Subscribe our Newsletter</span></h1><!-- Heading -->
                     <form action="index.html#">
                       <input type="text" name="" value="" placeholder="" required><!-- E-Mail -->
                       <input type="submit" name="" value="Send"><!-- Submit Button -->
                    </form>   
					</div>
					<div class="col-md-6 nopadding features-intro-img">
						 <div class="about-image" style="background-image:url(img/newsletter.png)"></div><!-- Right Image -->
					</div>
				</div>
			</div>
        </section>
		<!-- ==========================
        NEWSLETTER SECTION END
        =========================== -->

		
		
		<!-- ==========================
        CONTACT SECTION
        =========================== -->
        <section class="text-center section-padding contact-wrap" id="contact">
		  <!-- To Top Button -->
          <a href="index.html#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
          <div class="container">
		    <!-- Headline -->
            <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">Drop <span>me</span> a line</h1>
              </div>
            </div>
            <div class="row contact-details">
			  <!-- Adress Box -->
              <div class="col-md-4">
                <div class="dark-box box-hover">
                  <h2><i class="fa fa-map-marker"></i><span>Address</span></h2>
                  <p>Tenabang, Jakarta Pusat</p>
                </div>
              </div>
			  <!-- Phone Number Box -->
              <div class="col-md-4">
                <div class="dark-box box-hover">
                  <h2><i class="fa fa-mobile"></i><span>Phone</span></h2>
                  <p>+62 86969696969</p>
                </div>
              </div>
			  <!-- E-Mail Box -->
              <div class="col-md-4">
                <div class="dark-box box-hover">
                  <h2><i class="fa fa-paper-plane"></i><span>Email</span></h2>
                  <p><a href="index.html#">luthianda17@gmail.com</a></p>
                </div>
              </div>
            </div>
			<div class="row">
			  <!-- Google Maps (Change your Settings below) -->
			  <div class="col-md-6">
			    <div id="googlemaps"></div>
			  </div>
			  <!-- Contact Form -->
			  <div class="col-md-6 contact">
			     <form role="form" method="post">
				            <!-- Name -->
                            <div class="row">
                                <div class="col-md-6">
								    <!-- E-Mail -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
								    <!-- Phone Number -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email address" name="email">
                                    </div>
                                </div>
                            </div>
							<!-- Message Area -->
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write you message here..." style="height:232px;" name="message"></textarea>
                            </div>
							<!-- Subtmit Button -->
                            <button type="submit" class="btn btn-send" name="simpan">
                                Send message
                            </button>
                        </form>
                        <?php
                            include 'admin/config/koneksi.php';
                            if(isset($_POST['simpan'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $message = $_POST['message'];
                                $query = mysqli_query($config, "INSERT INTO contacts(name, email, message) VALUES ('$name','$email','$message')");
                            }
                        ?>
			  </div>
			</div>
			<br>
			<!-- Social Buttons - use font-awesome, past in what you want -->
            <div class="row">
              <div class="col-md-12">
                <ul class="social-buttons">
                  <li><a href="index.html#" class="social-btn"><i class="fa fa-dribbble"></i></a></li><!-- dribble -->
                  <li><a href="index.html#" class="social-btn"><i class="fa fa-twitter"></i></a></li><!-- twitter -->
                  <li><a href="index.html#" class="social-btn"><i class="fa fa-facebook"></i></a></li><!-- facebook -->
				  <li><a href="index.html#" class="social-btn"><i class="fa fa-deviantart"></i></a></li><!-- deviantart -->
				  <li><a href="index.html#" class="social-btn"><i class="fa fa-youtube"></i></a></li><!-- youtube -->
                </ul>
              </div>
            </div>
          </div>
        </section>
		<!-- ==========================
        CONTACT SECTION END
        =========================== -->
		
		
		
		<!-- ==========================
        FOOTER SECTION
        =========================== -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <p>All Rights Reserved. &copy; 2015 <a href="http://www.themewagon.com">ThemeWagon</a>
              </div>
            </div>
          </div>
        </footer>
		<!-- ==========================
        FOOTER SECTION END
        =========================== -->		
		
		
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- SmoothScroll -->           
    <script type="text/javascript" src="depan/assets/smoothscroll/smoothscroll.js"></script>
    <!-- Bootstrap -->
    <script src="depan/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="depan/js/waypoints.min.js"></script>
    <!-- classie.js -->
	<script src="depan/js/classie.js"></script>
    <!-- FlexSlider -->
    <script src="depan/assets/flexslider/jquery.flexslider.js"></script>
	<!-- Modernizr -->
    <script src="depan/js/modernizr.js"></script>
	<!-- Text Rotator -->
	<script src="depan/assets/textrotator/jquery.simple-text-rotator.js"></script>
	<!-- Lightbox.js -->
    <script src="depan/assets/lightbox/js/lightbox.min.js"></script>
    <!-- Google Maps --> 
    <script type="depan/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeKBBPJTG3v5w3cNPAgM6ZsJiPyL1mP_o&amp;sensor=false"></script>
	<!-- Theme JavaScript Core -->
	<script src="depan/js/main.js"></script>
	<script src="depan/js/script.js"></script>

	<!-- GOOGLE MAPS DATA -->
    <script type="text/javascript">
    // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);
    
        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,
                
                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.68961985411178, -74.01618003845215), // New York 

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [	{		featureType:'water',		stylers:[{color:'#F2F2F2'},{visibility:'on'}]	},{		featureType:'landscape',		stylers:[{color:'#FFFFFF'}]	},{		featureType:'road',		stylers:[{saturation:-100},{lightness:45}]	},{		featureType:'road.highway',		stylers:[{visibility:'simplified'}]	},{		featureType:'road.arterial',		elementType:'labels.icon',		stylers:[{visibility:'off'}]	},{		featureType:'administrative',		elementType:'labels.text.fill',		stylers:[{color:'#ADADAD'}]	},{		featureType:'transit',		stylers:[{visibility:'off'}]	},{		featureType:'poi',		stylers:[{visibility:'off'}]	}]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('googlemaps');

            // Create the Google Map using out element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
        }
	
    </script>
	
	<!-- TEXT ROTATOR SETTINGS -->
    <script type="text/javascript">
    $(".rotate").textrotator({
      animation: "fade", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
      separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
      speed: 2000 // How many milliseconds until the next word show.
    });
    </script>
	
    </body>
</html>