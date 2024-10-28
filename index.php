<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>CarVilla</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">carvilla<span></span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="#service">service</a></li>
				                    <li class="scroll"><a href="#featured-cars">featured cars</a></li>
				                    <li class="scroll"><a href="#new-cars">new cars</a></li>
				                    <li class="scroll"><a href="#brand">brands</a></li>
				                    <li class="scroll"><a href="#contact">contact</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<h2>get your desired car in resonable price</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore   magna aliqua. 
					</p>
					<button class="welcome-btn" onclick="window.location.href='#'">contact us</button>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- model-search-content -->
						<div class="model-search-content">
							<div class="row">
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>select year</h2>
										<div class="model-select-icon">
											<select class="form-control" id="yearSelect">

											  	<option value="default">year</option><!-- /.option-->

												<?php 

													include_once __DIR__ . "/config/database.php";
													
													// Fetch distinct years from the database
													$stmt = $con->prepare("SELECT DISTINCT year FROM featured_cars ORDER BY year DESC");
													$stmt->execute();
													$years = $stmt->fetchAll(PDO::FETCH_ASSOC);
												?>

												<?php foreach ($years as $year): ?>
													<option value="<?= $year['year']; ?>">
														<?= $year['year']; ?>
													</option>
												<?php endforeach; ?>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>body style</h2>
										<div class="model-select-icon">
											<select class="form-control" id="styleSelect">

											  	<option value="default">style</option><!-- /.option-->

											  	<?php 
													// Fetch body_style from the database
													$stmt = $con->prepare("SELECT DISTINCT body_style FROM featured_cars");
													$stmt->execute();
													$styles = $stmt->fetchAll(PDO::FETCH_ASSOC);
												?>

												<?php foreach ($styles as $style): ?>
													<option value="<?= $style['body_style']; ?>">
														<?= $style['body_style']; ?>
													</option>
												<?php endforeach; ?>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>select make</h2>
										<div class="model-select-icon">
											<select class="form-control" id="makeSelect">

											  	<option value="default">make</option><!-- /.option-->

											  	<?php 
													$stmt = $con->prepare("SELECT DISTINCT make FROM featured_cars");
													$stmt->execute();
													$makes = $stmt->fetchAll(PDO::FETCH_ASSOC);
												?>

												<?php foreach ($makes as $make): ?>
													<option value="<?= $make['make']; ?>">
														<?= $make['make']; ?>
													</option>
												<?php endforeach; ?>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>car condition</h2>
										<div class="model-select-icon">
											<select class="form-control" id="conditionSelect">

											  	<option value="default">condition</option><!-- /.option-->

											  	<?php 
													$stmt = $con->prepare("SELECT DISTINCT car_condition FROM featured_cars");
													$stmt->execute();
													$conditions = $stmt->fetchAll(PDO::FETCH_ASSOC);
												?>

												<?php foreach ($conditions as $condition): ?>
													<option value="<?= $condition['car_condition']; ?>">
														<?= $condition['car_condition']; ?>
													</option>
												<?php endforeach; ?>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<div class="single-model-search">
										<h2>select model</h2>
										<div class="model-select-icon">
											<select class="form-control" id="modelSelect">

											  	<option value="default">model</option><!-- /.option-->

											  	<?php 
													$stmt = $con->prepare("SELECT DISTINCT model FROM featured_cars");
													$stmt->execute();
													$models = $stmt->fetchAll(PDO::FETCH_ASSOC);
												?>

												<?php foreach ($models as $model): ?>
													<option value="<?= $model['model']; ?>">
														<?= $model['model']; ?>
													</option>
												<?php endforeach; ?>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
									<div class="single-model-search">
										<h2>select price</h2>
										<div class="model-select-icon">
											<select class="form-control" id="priceSelect">

											  	<option value="default">price</option><!-- /.option-->

											  	<option value="under-1000000">Less than 1,000,000</option>
    											<option value="over-1000000">More than 1,000,000</option>

											</select><!-- /.select-->
										</div><!-- /.model-select-icon -->
									</div>
								</div>
								<div class="col-md-2 col-sm-12">
									<div class="single-model-search text-center">
										<button class="welcome-btn model-search-btn" id="searchCarBtn"  data-target="#searchResultModal">
											search
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- model-search-content -->
					</div>
				</div>
			</div>
		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!-- searchResultModal Modal Structure -->
		<div id="searchResultModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				
				<div class="modal-content">
					<div class="modal-body">
						<h3>Search Results</h3>
						<hr>
						<div class="row" id="car-results-wrapper">
							
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- searchResultModal Modal Structure -->

		<!--service start -->
		<section id="service" class="service">
			<div class="container">
				<div class="service-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car"></i>
								</div>
								<h2><a href="#">largest dealership <span> of</span> car</a></h2>
								<p>
									Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.  
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-repair"></i>
								</div>
								<h2><a href="#">unlimited repair warrenty</a></h2>
								<p>
									Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.  
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<i class="flaticon-car-1"></i>
								</div>
								<h2><a href="#">insurence support</a></h2>
								<p>
									Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia. 
								</p>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->

		<!--new-cars start -->
		<section id="new-cars" class="new-cars">
			<div class="container">
				<div class="section-header">
					<p>checkout <span>the</span> latest cars</p>
					<h2>newest cars</h2>
				</div><!--/.section-header-->
				<div class="new-cars-content">
					<div class="owl-carousel owl-theme" id="new-cars-carousel">
						<?php 
							include_once __DIR__ . "/config/database.php";

							// Prepare and execute the SQL query to fetch all car details
							$query = "SELECT * FROM newest_cars";
							$stmt = $con->prepare($query);
							
							// Execute the statement
							$stmt->execute();

							// Fetch all the results as an associative array
							$fetchNewestCars = $stmt->fetchAll(PDO::FETCH_ASSOC);
							
						?>
						<?php if (empty($fetchNewestCars)): ?>
							<p>No cars found!</p>
						<?php else: ?>
						<?php foreach ($fetchNewestCars as $newestCar): ?>
						<div class="new-cars-item">
							<div class="single-new-cars-item">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="new-cars-img">
											<img src="assets/uploads/<?= $newestCar['car_img']; ?>" alt="img"/>
										</div><!--/.new-cars-img-->
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="new-cars-txt">
											<h2><a href="#"><?= $newestCar['car_name']; ?></a></h2>
											<p>
												<?= mb_strimwidth($newestCar['car_desc'], 0, 200, '...'); ?>
											</p>
											
											<button class="welcome-btn new-cars-btn" id="newestCarBtn" data-toggle="modal" data-target="#newestCarModal" data-id="<?= $newestCar['id']; ?>">
												view details
											</button>
										</div><!--/.new-cars-txt-->	
									</div><!--/.col-->
								</div><!--/.row-->
							</div><!--/.single-new-cars-item-->
						</div><!--/.new-cars-item-->
						<?php endforeach; ?>
						<?php endif; ?>
					</div><!--/#new-cars-carousel-->
				</div><!--/.new-cars-content-->
			</div><!--/.container-->

		</section><!--/.new-cars-->
		<!--new-cars end -->

		<!-- newestCarModal Modal Structure -->
		<div id="newestCarModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<h3>Car details</h3>
						<hr>
						<div id="newestCarDetails">

						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- newestCarModal Modal Structure -->

		<!-- featured-cars start -->
		<section id="featured-cars" class="featured-cars">
			<div class="container">
				<div class="section-header">
					<p>checkout <span>the</span> featured cars</p>
					<h2>featured cars</h2>
				</div><!--/.section-header-->
				<div class="featured-cars-content">
					<div class="row">
						<?php 
							include_once __DIR__ . "/config/database.php";

							// Prepare and execute the SQL query to fetch all car details
							$query = "SELECT * FROM featured_cars";
							$stmt = $con->prepare($query);
							
							// Execute the statement
							$stmt->execute();

							// Fetch all the results as an associative array
							$fetchFeaturedCars = $stmt->fetchAll(PDO::FETCH_ASSOC);
						?>
						<?php if (empty($fetchFeaturedCars)): ?>
							<p>No cars found!</p>
						<?php else: ?>
						<?php foreach ($fetchFeaturedCars as $featuredCar): ?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="single-featured-cars">
								<div class="featured-img-box">
									<div class="featured-cars-img">
										<img src="assets/uploads/<?= $featuredCar['image']; ?>" alt="<?= $featuredCar['name']; ?>">
									</div>
									<div class="featured-model-info">
										<p>
											<span><strong>Year:</strong> <?= $featuredCar['year']; ?></span>
											<span><strong>Make:</strong> <?= $featuredCar['make']; ?></span>
											<span><strong>Model:</strong> <?= $featuredCar['model']; ?></span>
											<span><strong>Body Style:</strong> <?= $featuredCar['body_style']; ?></span>
											<span><strong>Car Condition:</strong> <?= $featuredCar['car_condition']; ?></span>
										</p>
									</div>
								</div>
								<div class="featured-cars-txt">
									<h2><a href="#" id="featuredCarBtn" data-toggle="modal" data-target="#featuredCarModal" data-id="<?= $featuredCar['id']; ?>"><?= $featuredCar['name']; ?></a></h2>
									<h3>฿<?= number_format($featuredCar['price']); ?></h3>
									<p>
										<?= mb_strimwidth($featuredCar['short_description'], 0, 100, '...'); ?>
									</p>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
						<!-- col-lg-3 col-md-4 col-sm-6 -->
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->

		<!-- featuredCarModal Modal Structure -->
		<div id="featuredCarModal" class="modal fade" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<h3>Car details</h3>
						<hr>
						<div id="featuredCarDetails">

						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- featuredCarModal Modal Structure -->

		<!-- clients-say strat -->
		<section id="clients-say"  class="clients-say">
			<div class="container">
				<div class="section-header">
					<h2>what our clients say</h2>
				</div><!--/.section-header-->
				<div class="row">
					<div class="owl-carousel testimonial-carousel">
						<?php 
							include_once __DIR__ . "/config/database.php";

							// Prepare and execute the SQL query to fetch all car details
							$query = "SELECT * FROM clients_review";
							$stmt = $con->prepare($query);
							
							// Execute the statement
							$stmt->execute();

							// Fetch all the results as an associative array
							$fetchClients = $stmt->fetchAll(PDO::FETCH_ASSOC);
						?>
						<?php if (empty($fetchClients)): ?>
							<p>No clients found!</p>
						<?php else: ?>
						<?php foreach ($fetchClients as $clients): ?>
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/uploads/<?= $clients['client_img']; ?>" alt="<?= $clients['client_name']; ?>" />
										</div><!--/.testimonial-img-->
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											<?= $clients['client_msg']; ?>
										</p>
									</div><!--/.testimonial-comment-->
									<div class="testimonial-person">
										<h2><a href="#"><?= $clients['client_name']; ?></a></h2>
										<h4><?= $clients['client_city']; ?></h4>
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<?php endforeach; ?>
						<?php endif; ?>
					</div><!--/.testimonial-carousel-->
				</div><!--/.row-->
			</div><!--/.container-->

		</section><!--/.clients-say-->	
		<!-- clients-say end -->

		<!--brand strat -->
		<section id="brand"  class="brand">
			<div class="container">
				<div class="brand-area">
					<div class="owl-carousel owl-theme brand-item">
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br1.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br2.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br3.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br4.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br5.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br6.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.clients-area-->

			</div><!--/.container-->

		</section><!--/brand-->	
		<!--brand end -->

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">carvilla</a>
								</div>
								<p>
									Ased do eiusm tempor incidi ut labore et dolore magnaian aliqua. Ut enim ad minim veniam.
								</p>
								<div class="footer-contact">
									<p>info@themesine.com</p>
									<p>+1 (885) 2563154554</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about devloon</h2>
								<ul>
									<li><a href="#">about us</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">terms <span> of service</span></a></li>
									<li><a href="#">privacy policy</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="single-footer-widget">
								<h2>top brands</h2>
								<div class="row">
									<div class="col-md-7 col-xs-6">
										<ul>
											<li><a href="#">BMW</a></li>
											<li><a href="#">lamborghini</a></li>
											<li><a href="#">camaro</a></li>
											<li><a href="#">audi</a></li>
											<li><a href="#">infiniti</a></li>
											<li><a href="#">nissan</a></li>
										</ul>
									</div>
									<div class="col-md-5 col-xs-6">
										<ul>
											<li><a href="#">ferrari</a></li>
											<li><a href="#">porsche</a></li>
											<li><a href="#">land rover</a></li>
											<li><a href="#">aston martin</a></li>
											<li><a href="#">mersedes</a></li>
											<li><a href="#">opel</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h2>news letter</h2>
								<div class="footer-newsletter">
									<p>
										Subscribe to get latest news  update and informations
									</p>
								</div>
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Add Email">
									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<span><i class="fa fa-arrow-right"></i></span>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy; copyright.designed and developed by <a href="https://www.themesine.com/">themesine</a>.
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>

		<script>
			$(document).ready(function() {

				// searchCarBtn
				$('#searchCarBtn').on('click', function(e) {
					e.preventDefault();
					// Capture selected values
					const year = $('#yearSelect').val();
					const style = $('#styleSelect').val();
					const make = $('#makeSelect').val();
					const condition = $('#conditionSelect').val();
					const model = $('#modelSelect').val();
					const price = $('#priceSelect').val();

					// Check if any of the selections are not made
					// if (year === 'default' || style === 'default' || make === 'default' || condition === 'default' || model === 'default' || price === 'default')
					if (year === 'default') {
						Swal.fire({
							title: 'Error!',
							text: 'Please select at least the year options before proceeding.',
							icon: 'warning',
							confirmButtonText: 'OK'
						});
					} else {
						// Send data via AJAX
						$.ajax({
							url: 'index-search-car.php',
							type: 'POST',
							data: {
								year: year,
								style: style,
								make: make,
								condition: condition,
								model: model,
								price: price
							},
							dataType: 'json',
							success: function(response) {
								console.log(response);
								// Check if response has results
								if (response.length > 0) {
									let data = '';
									response.forEach(car => {
										data += `
											<div class="col-md-4">
												<h4>${car.make} ${car.model}</h4>
												<img src='assets/uploads/${car.image}'/>
												<p>Year: ${car.year}</p>
												<p>Body Style: ${car.body_style}</p>
												<p>Condition: ${car.car_condition}</p>
												<p>Model: ${car.model}</p>
												<p>Price: ${car.price}</p>
											</div>
										`;
									});
									$('#car-results-wrapper').html(data);
								} else {
									$('#car-results-wrapper').html('<div class="col-md-12"><p>No results found.</p></div>');
								}
								$('#searchResultModal').modal('show');
							}
						});
					}
				});


				$(document).on('click', "#newestCarBtn", function (e) { 
					e.preventDefault();

					let id = $(this).data('id');

					// Send an AJAX request to fetch the car data
                    $.ajax({
                        url: 'index-fetch-newest-car.php',  // Your server-side script to fetch car details
                        type: 'GET',
                        data: { id: id },  // Send the car ID to the server
                        dataType: 'json',
                        success: function(response) {
							console.log(response);
                            if (response.status === 'success') {
								let data = '';
									data += `
										<h4>${response.data.car_name}</h4>
										<p>Description: ${response.data.car_desc}</p>
									`;
								$('#newestCarDetails').html(data);
                            } else {
                                console.error('Error fetching car data.');
                            }
                        },
                        error: function(err) {
                            console.error('AJAX error:', err);
                        }
                    });
				});

				$(document).on('click', "#featuredCarBtn", function (e) { 
					e.preventDefault();

					let id = $(this).data('id');

					// Send an AJAX request to fetch the car data
                    $.ajax({
                        url: 'index-fetch-featured-car.php',  // Your server-side script to fetch car details
                        type: 'GET',
                        data: { id: id },  // Send the car ID to the server
                        dataType: 'json',
                        success: function(response) {
							console.log(response);
                            if (response.status === 'success') {
								let data = '';
									data += `
										<h4>${response.data.make} ${response.data.model}</h4>
										<img src='assets/uploads/${response.data.image}'/>
										<p>Year: ${response.data.year}</p>
										<p>Body Style: ${response.data.body_style}</p>
										<p>Condition: ${response.data.car_condition}</p>
										<p>Model: ${response.data.model}</p>
										<p>Price: ${response.data.price}</p>
										<p>Description: ${response.data.long_description}</p>
									`;
								$('#featuredCarDetails').html(data);
                            } else {
                                console.error('Error fetching car data.');
                            }
                        },
                        error: function(err) {
                            console.error('AJAX error:', err);
                        }
                    });
				});
			});



		</script>

        
    </body>
	
</html>