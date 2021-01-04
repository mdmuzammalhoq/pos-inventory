<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Home page | Kopotakkho Enterprise</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">

	<!-- Font -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="{{asset('public/front-support/css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link href="{{asset('public/front-support/css/magnific-popup.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('public/front-support/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-support/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-support/css/skin-lblue.css')}}">

	<link rel="stylesheet" href="{{asset('public/front-support/css/ecommerce.css')}}">

	<!-- Owl carousel -->
	<link href="{{asset('public/front-support/css/owl.carousel.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('public/front-support/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-support/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-support/css/revolutionslider_settings.css')}}" media="screen" />
	<link rel="stylesheet" href="{{asset('public/front-support/css/responsive.css')}}">
	<script src="{{asset('public/front-support/js/vendor/modernizr-2.6.2.min.js')}}"></script>
</head>
<body class="style-14 index-2">

<!-- Start Loading -->
<!-- <section class="loading-overlay">
	<div class="Loading-Page">
		<h1 class="loader">Loading...</h1>
	</div>
</section> -->
<!-- End Loading  -->

<!-- start header -->
<header>
	<!-- Top bar starts -->
	<div class="top-bar">
		<div class="container">

			<!-- Contact starts -->
			<div class="tb-contact pull-left">
				<!-- Email -->
				<i class="fa fa-envelope color"></i> &nbsp; <a href="mailto:contact@domain.com">   kapotakkho2015@gmail.com </a>
				&nbsp;&nbsp;
				<!-- Phone -->
				<i class="fa fa-phone color"></i> &nbsp; +88 01711 138249
  

			</div>
			<!-- Contact ends -->

			<!-- Search section for responsive design -->
			<div class="tb-search pull-left">
				<a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
				<div class="b-dropdown-block">
					<form action="" method="get">
						
						<!-- Input Group -->
						<div class="input-group">
							<input type="text" name="search" class="form-control" placeholder="Type Something">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-color">Search</button>
									</span>
						</div>
					</form>
				</div>
			</div>
			<!-- Search section ends -->

			<!-- Social media starts -->
			<div class="tb-social pull-right">
				<div class="brand-bg text-right">
					<!-- Brand Icons -->
					<a href="#" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
					<a href="#" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
					<a href="#" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
				</div>
			</div>
			<!-- Social media ends -->

			<div class="clearfix"></div>
		</div>
	</div>

	<!-- Top bar ends -->

	<!-- Header One Starts -->
	<div class="header-1">

		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<!-- Logo section -->
					<div class="logo">
						<h1><a href="{{ URL::to('/') }}"><i class="fa fa-bookmark-o"></i> Kopotakkho Enterprise</a></h1>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
					<!-- Search Form -->
					<div class="header-search">
						<form action="{{ route('search') }}" method="get">
						@csrf
							<!-- Input Group -->
							<div class="input-group">
								<input type="text" name="search" class="form-control" placeholder="Type Something">
										<span class="input-group-btn">
											<button class="btn btn-color" type="submit">Search</button>
										</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Navigation starts -->

		<div class="navi" style="background: #c54900; border: none;">
			<div class="container">
				<div class="navy">
					<ul>
						<!-- Main menu -->
						<li><a href="{{ URL::to('/') }}">Home</a>
						</li>

						<li><a href="{{ URL::to('/sp-products') }}"> SP Products</a>
						</li>

						<li><a href="{{ URL::to('/gp-products') }}"> GP Products</a>
						</li>
						<li><a href="{{ URL::to('/hp-products') }}"> HP Products</a>
						</li>
						<li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Navigation ends -->

	</div>

	<!-- Header one ends -->

</header>
<br>
@yield('content')












<footer class="footer-area-content">

	<div class="container">
		<div class="footer-wrapper style-3">
			<div class="type-1">
				<div class="footer-columns-entry">
					<div class="row">
						<div class="col-md-3">
							<h3 class="column-title">Kopotakkho Enterprise</h3>
							<div class="footer-description"> 123, Kakrail Road , Moubon Super Market(2nd Floor), Shantinagar, Dhaka - 1217</div>
							<div class="footer-address">Telephone: 02 9353647<br>Mobile:  +880 1711138249<br> Mobile: +880 1611161783 <br>Email: <a href="mailto:Support@demo.com">kapotakkho2015@gmail.com</a><br>
							</div>
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
							<h3 class="column-title">Customer Care</h3>
							<ul class="column">
								<li><a href="#">Terms & Condition</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Shipping Charge</a></li>
								<li><a href="#">Shipping Track</a></li>
								<li><a href="#">Payment Method</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Returns</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
							<h3 class="column-title">Your Account</h3>
							<ul class="column">
								<li><a href="#">My Account</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Affiliate Dashboard</a></li>
								<li><a href="#">Billing Address</a></li>
								<li><a href="#">Cancel Order</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Returns</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="col-md-2 col-sm-4">
							<h3 class="column-title">Shop Information</h3>
							<ul class="column">
								<li><a href="#">About Company</a></li>
								<li><a href="#">Become Member</a></li>
								<li><a href="#">License Details</a></li>
								<li><a href="#">Custom Service</a></li>
								<li><a href="#">Tax Information</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Job & Vacancies</a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-3">
							<h3 class="column-title">Company working hours</h3>
							<div class="footer-description"></div>
							<div class="footer-description">
								<b>Monday-Friday:</b> 8.30 a.m. - 5.30 p.m.<br>
								<b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br>
								<b>Sunday:</b> Closed
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="footer-bottom footer-wrapper style-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-bottom-navigation">
						<div class="cell-view">
							
							<div class="copyright">Copyright@ 2021 . All right reserved
								<div class="copyright pull-right">Developed By: <a target="_blank" href="#">Md. Muzammal Hoq</a> </div>
							</div>
							
						</div>
						<div class="cell-view">
							<div class="payment-methods">
								<a href="#"><p>Md. Muzammal Hoq</p></a>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>



</footer>
<!-- footer area end -->


<!-- All script -->
<script src="{{asset('public/front-support/js/vendor/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('public/front-support/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/front-support/js/smoothscroll.js')}}"></script>
<!-- Scroll up js
============================================ -->
<script src="{{asset('public/front-support/js/jquery.scrollUp.js')}}"></script>
<script src="{{asset('public/front-support/js/menu.js')}}"></script>
<!-- new collection section script -->
<script src="{{asset('public/front-support/js/swiper/idangerous.swiper.min.js')}}"></script>
<script src="{{asset('public/front-support/js/swiper/swiper.custom.js')}}"></script>


<script src="{{asset('public/front-support/js/pluginse209.js?v=1.0.0')}}"></script>

<!-- Magnific Popup -->
<script src="{{asset('public/front-support/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('public/front-support/js/jquery.countdown.min.js')}}"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script type="text/javascript" src="{{asset('public/front-support/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front-support/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('public/front-support/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/front-support/js/main.js')}}"></script>

<script type="text/javascript">

	/* ************ */
	/* Owl Carousel */
	/* ************ */

	$(document).ready(function() {
		/* Owl carousel */
		$(".owl-carousel").owlCarousel({
			slideSpeed : 500,
			rewindSpeed : 1000,
			mouseDrag : true,
			stopOnHover : true
		});
		/* Own navigation */
		$(".owl-nav-prev").click(function(){
			$(this).parent().next(".owl-carousel").trigger('owl.prev');
		});
		$(".owl-nav-next").click(function(){
			$(this).parent().next(".owl-carousel").trigger('owl.next');
		});
	});


	/* Main Slider */
	$('.tp-banner0').show().revolution({
		dottedOverlay: "none",
		delay: 5000,
		startWithSlide: 0,
		startwidth: 869,
		startheight: 520,
		hideThumbs: 10,
		hideTimerBar: "on",
		thumbWidth: 50,
		thumbHeight: 50,
		thumbAmount: 4,
		navigationType: "bullet",
		navigationArrows: "solo",
		navigationStyle: "round",
		touchenabled: "on",
		onHoverStop: "on",
		swipe_velocity: 0.7,
		swipe_min_touches: 1,
		swipe_max_touches: 1,
		drag_block_vertical: false,
		parallax: "mouse",
		parallaxBgFreeze: "on",
		parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
		keyboardNavigation: "off",
		navigationHAlign: "right",
		navigationVAlign: "bottom",
		navigationHOffset: 30,
		navigationVOffset: 30,
		soloArrowLeftHalign: "left",
		soloArrowLeftValign: "center",
		soloArrowLeftHOffset: 50,
		soloArrowLeftVOffset: 8,
		soloArrowRightHalign: "right",
		soloArrowRightValign: "center",
		soloArrowRightHOffset: 50,
		soloArrowRightVOffset: 8,
		shadow: 0,
		fullWidth: "on",
		fullScreen: "off",
		spinner: "spinner4",
		stopLoop: "on",
		stopAfterLoops: -1,
		stopAtSlide: -1,
		shuffle: "off",
		autoHeight: "off",
		forceFullWidth: "off",
		hideThumbsOnMobile: "off",
		hideNavDelayOnMobile: 1500,
		hideBulletsOnMobile: "off",
		hideArrowsOnMobile: "off",
		hideThumbsUnderResolution: 0,
		hideSliderAtLimit: 0,
		hideCaptionAtLimit: 500,
		hideAllCaptionAtLilmit: 500,
		videoJsPath: "rs-plugin/videojs/",
		fullScreenOffsetContainer: ""
	});

</script>


</body>


</html>