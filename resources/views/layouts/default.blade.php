<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""> <!--<![endif]-->

<head>
	@include('includes.head')
</head>
	<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">

		<!-- LOADER -->
	    	<div id="site-loader" class="load-complete">
	       	<div class="load-position">
		           	<div class="logo logo-block"><a href="{{route('home')}}"><img src="{{asset('images/logo-preload.png')}}" alt="logo" /></a></div>
		            	<h6>Please wait, loading...</h6>
		            	<div class="loading">
	                		<div class="loading-line"></div>
					<div class="loading-break loading-dot-1"></div>
					<div class="loading-break loading-dot-2"></div>
					<div class="loading-break loading-dot-3"></div>
	            		</div>
	        	</div>
	    	</div>
	    	<!-- Loader /- -->

	    	<a id="top"></a>

		<!-- Header Section -->
	    	<header id="header-section" class="header header1 container-fluid p_z">
			<div class="container">
				<!-- Top Header -->
				<div class="top-header">
					<p class="col-md-6 col-sm-9">
						<span><i class="fa fa-phone"></i> 702-442-0055</span>
						<span><a title="mail-to" href="mailto:jonathan@jacobsgroupvegas.com"><i class="fa fa-envelope-o"></i> jonathan@jacobsgroupvegas.com</a></span>
					</p>
					<div class="col-md-6 col-sm-3 p_r_z">
						<ul class="property-social p_l_z m_b_z">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div><!-- Top Header -->
				<!-- Navigation Block -->
				<div class="navigation-block">
					<!-- Logo Block -->
					<div class="col-md-2 logo-block no-padding">
						<a title="logo" href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
					</div><!-- Logo Block /- -->
					<!-- Menu Block -->
					<div class="col-md-10 menu-block">
						<!-- nav -->
						<nav class="navbar navbar-default primary-navigation">
							<div class="navbar-header">
								<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse" id="navbar">
								<ul class="nav navbar-nav">
									<!-- <li><a href="{{route('home')}}">Home</a></li> -->
									<li><a href="{{route('agents')}}">The Team</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services</a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="{{route('services.buying')}}">Buying Services</a></li>
											<li><a href="{{route('services.listing')}}">Listing Services</a></li>
											<li><a href="{{route('useful.links')}}">Useful Links</a></li>
										</ul>
									</li>
									<li><a href="{{route('home')}}#las-vegas-properties">LAS VEGAS</a>
									<li><a href="{{route('home')}}#henderson-properties">HENDERSON</a>
									<li><a href="{{route('home')}}#north-las-vegas-properties">N. LAS VEGAS</a>
									<li><a href="{{route('home')}}#boulder-city-properties">BOULDER CITY</a>
								</ul>
							</div><!--/.nav-collapse -->
						</nav><!-- nav /- -->
						<a title="Add Property" href="{{route('properties')}}" class="pull-right">View Properties</a>
					</div><!-- Menu Block /- -->
				</div><!-- Navigation Block /- -->
			</div>
		</header>
		<!-- Header Section /- -->

		@yield('content')

		<!-- Footer Section -->
		<div id="footer-section" class="footer-section">
			@include('includes.footer')
		</div>
		<!-- Footer Section -->

		<!-- jQuery Include -->
		<script src="{{asset('libraries/jquery.min.js')}}"></script>
		<script src="{{asset('libraries/jquery.easing.min.js')}}"></script><!-- Easing Animation Effect -->
		<script src="{{asset('libraries/bootstrap/bootstrap.min.js')}}"></script> <!-- Core Bootstrap v3.2.0 -->
		<script src="{{asset('libraries/modernizr/modernizr.custom.37829.js')}}"></script> <!-- Modernizer -->
		<script src="{{asset('libraries/jquery.appear.js')}}"></script> <!-- It Loads jQuery when element is appears -->
		<script src="{{asset('libraries/owl-carousel/owl.carousel.min.js')}}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
		<script src="{{asset('libraries/checkbox/icheck.min.js')}}"></script> <!-- Check box -->
		<script src="{{asset('libraries/drag-drop/jquery.tmpl.min.js')}}"></script> <!-- Drag Drop file -->
		<script src="{{asset('libraries/drag-drop/drag-drop.js')}}"></script> <!-- Drag Drop File -->
		<script src="{{asset('libraries/drag-drop/modernizr.custom.js')}}"></script> <!-- Drag Drop File -->
		<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
		<script src="{{asset('libraries/gmap/gmap.js')}}"></script> <!-- map -->
		<script src="{{asset('libraries/expanding-search/classie.js')}}"></script>
		<script src="{{asset('libraries/expanding-search/uisearch.js')}}"></script>
		<!-- Customized Scripts -->
		<script src="{{asset('js/functions.js')}}"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/js/lightslider.min.js"></script>
		<script type="text/javascript">
			$('#lightSlider').lightSlider({
			    gallery: true,
			    item: 1,
			    loop: true,
			    slideMargin: 0,
			    thumbItem: 9
			});
		</script>

		@yield('mapCoords')
		@yield('modal')

		<script id="imageTemplate" type="text/x-jquery-tmpl">
			<div class="col-md-3 col-sm-3 col-xs-6">
				<div class="imageholder">
					<figure>
						<img src="${filePath}" alt="${fileName}"/>
					</figure>
				</div>
			</div>
		</script>
	</body>
</html>
