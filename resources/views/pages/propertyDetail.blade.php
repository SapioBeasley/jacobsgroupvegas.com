@extends('layouts.default')

@section('content')
<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">
	<!-- LOADER -->
	<div id="site-loader" class="load-complete">
		<div class="load-position">
			<div class="logo logo-block"><a href="index.html"><img src="images/logo.png" alt="logo" /></a></div>
			<h6>Please wait, loading...</h6>
			<div class="loading">
				<div class="loading-line"></div>
				<div class="loading-break loading-dot-1"></div>
				<div class="loading-break loading-dot-2"></div>
				<div class="loading-break loading-dot-3"></div>
			</div>
		</div>
	</div><!-- Loader /- -->

	<a id="top"></a>
	<!-- Header Section -->
	<header id="header-section" class="header header1 container-fluid p_z">
		<!-- container -->
		<div class="container">
			<!-- Top Header -->
			<div class="top-header">
				<p class="col-md-6 col-sm-9">
					<span><i class="fa fa-phone"></i>  1-200-666-1234</span>
					<span><a title="mail-to" href="mailto:info@propertyexpert.com"><i class="fa fa-envelope-o"></i> info@propertyexpert.com</a></span>
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
					<a title="logo" href="index.html"><img src="images/logo.png" alt="logo" /></a>
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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="index.html">Home 1</a></li>
										<li><a href="index2.html">Home 2</a></li>
										<li><a href="index3.html">Home 3</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Listing</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="aa-listing.html">AA Listing</a></li>
										<li><a href="aa-listing-list.html">AA Listing List</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Property</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="property-detail.html">Detail 1</a></li>
										<li><a href="property-detail-2.html">Detail 2</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="blog.html">Blog</a></li>
										<li><a href="blog-detail.html">Blog Detail</a></li>
									</ul>
								</li>
								<!--li><a href="work.html">Gallery</a></li-->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="profile.html">Profile</a></li>
										<li><a href="agent-listing.html">Agent Listing 1</a></li>
										<li><a href="agent-listing-2.html">Agent Listing 2</a></li>
										<li><a href="agent-details.html">Agent Detail</a></li>
										<li><a href="shortcodes.html">Shortcodes</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact Us</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</nav><!-- nav /- -->
					<a title="Add Property" href="submit-property.html" class="pull-right">Add Property</a>
				</div><!-- Menu Block /- -->
			</div><!-- Navigation Block /- -->
			<div class="pull-right">
				<a title="User" href="#" class="user-icon"><img src="images/icon/user-icon.png" alt="user icon" /></a>
				<div id="sb-search" class="sb-search">
					<form>
						<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
						<button class="sb-search-submit"><i class="fa fa-search"></i></button>
						<span class="sb-icon-search"></span>
					</form>
				</div>
			</div>
		</div><!-- container /- -->
	</header><!-- Header Section /- -->
	<!-- Page Content -->
	<div class="page-content">
		<!-- Banner Section -->
		<div id="page-banner-section" class="page-banner-section container-fluid p_z">
			<img src="images/aa-listing/banner.jpg" alt="banner">
			<!-- Banner Inner -->
			<div class="page-title">
				<div class="container ">
					<div class="banner-inner">
						<h2>EDIT PROFILE</h2>
					</div>
				</div>
				<div class="pages-breadcrumb">
					<div class="container">
						<!-- Page breadcrumb -->
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><a href="#">Home</a></li>
							<li class="active">Detail page</li>
						</ol>
					</div>
				</div>
			</div><!-- Banner Inner /- -->
		</div><!-- Banner Section /- -->

		<!-- Property Detail Page -->
		<div class="property-main-details">
			<!-- container -->
			<div class="container">
				<div class="property-header">
					<h3>15421 Southwest 39th Terrace - Miami <span>For Rent</span></h3>
					<ul>
						<li>$320/mo</li>
						<li>Product ID : 201354</li>
						<li><i class="fa fa-expand"></i>3326 sq</li>
						<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
						<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
						<li><i class="fa fa-car"></i>1</li>
					</ul>
					<a title="print" href="#"><i class="fa fa-print"></i> Print</a>
				</div>
				<div class="property-details-content container-fluid p_z">
					<!-- col-md-9 -->
					<div class="col-md-9 col-sm-6 p_z">
						<!-- Slider Section -->
						<div id="property-detail1-slider" class="carousel slide property-detail1-slider" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="images/details/detail-slide-1.jpg" alt="Slide">
								</div>
								<div class="item">
									<img src="images/details/detail-slide-1.jpg" alt="Slide">
								</div>
								<div class="item">
									<img src="images/details/detail-slide-1.jpg" alt="Slide">
								</div>
								<div class="item">
									<img src="images/details/detail-slide-1.jpg" alt="Slide">
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#property-detail1-slider" role="button" data-slide="prev">
								<span class="fa fa-long-arrow-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#property-detail1-slider" role="button" data-slide="next">
								<span class="fa fa-long-arrow-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div><!-- Slider Section /- -->
						<div class="single-property-details">
							<h3>Description</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis.dis parturient montes, nascetur ridiculus mus.</p>
						</div>
						<div class="general-amenities pull-left">
							<h3>General amenities</h3>
							<div class="amenities-list pull-left">
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-1" checked>
										<label for="checkbox-1">Air conditioning</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-2" checked>
										<label for="checkbox-2">Balcony</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-3" checked>
										<label for="checkbox-3">Bedding</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-4" checked>
										<label for="checkbox-4">Cable TV</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-5" checked>
										<label for="checkbox-5">Cleaning after exit</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-6">
										<label for="checkbox-6">Cofee pot</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-7" checked>
										<label for="checkbox-7">Computer</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-8">
										<label for="checkbox-8">Cot</label>
									</div>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-9">
										<label for="checkbox-9">Dishwasher</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-10" checked>
										<label for="checkbox-10">DVD</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-11" checked>
										<label for="checkbox-11">Fan</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-12" checked>
										<label for="checkbox-12">Fridge</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-13" checked>
										<label for="checkbox-13">Grill</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-14">
										<label for="checkbox-14">Hairdryer</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-15" checked>
										<label for="checkbox-15">Heating</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-16">
										<label for="checkbox-16">Hi-fi</label>
									</div>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-17">
										<label for="checkbox-17">Internet</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-18" checked>
										<label for="checkbox-18">Iron</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-19" checked>
										<label for="checkbox-19">Juicer</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-20" checked>
										<label for="checkbox-20">Lift</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-21" checked>
										<label for="checkbox-21">Microwave</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-22">
										<label for="checkbox-22">Oven</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-23" checked>
										<label for="checkbox-23">Parking</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-24">
										<label for="checkbox-24">Parquet</label>
									</div>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-25">
										<label for="checkbox-25">Radio</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-26" checked>
										<label for="checkbox-26">Roof terrace</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-27" checked>
										<label for="checkbox-27">Smoking allowed</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-28" checked>
										<label for="checkbox-28">Terrace</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-29" checked>
										<label for="checkbox-29">Toaster</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-30">
										<label for="checkbox-30">Towelwes</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-31" checked>
										<label for="checkbox-31">Use of pool</label>
									</div>
									<div class="amenities-checkbox">
										<input type="checkbox" id="checkbox-32">
										<label for="checkbox-32">Video</label>
									</div>
								</div>
							</div>
						</div>
						<div class="property-direction pull-left">
							<h3>Get Direction</h3>
							<div class="property-map">
								<div id="gmap" class="mapping"></div>
							</div>
							<div class="property-map">
								<h3>Share This Property :</h3>
								<ul>
									<li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" title="linkedin-square"><i class="fa fa-linkedin-square"></i></a></li>
									<li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- col-md-9 /- -->
					<div class="col-md-3 col-sm-6 p_z property-sidebar single-property-sidebar">
						<div class="agent-details">
							<div class="agent-header">
								<div class="agent-img"><img src="images/single-property/agent.jpg" alt="agent" /></div>
								<div class="agent-name">
									<h5>agent John Doe</h5>
									<ul class="property-social p_l_z m_b_z">
										<li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<p>Our Latest listed properties and check out the facilities on them test listed properties.</p>
							</div>
							<p><i class="fa fa-phone"></i>0123 456 7890</p>
							<p><i class="fa fa-envelope-o"></i><a href="mailto:info@johndoe.com" title="mail">info@johndoe.com</a></p>
							<a title="View More" href="#" class="view-more">View Profile</a>
						</div>
						<aside class="widget widget-search">
							<h2 class="widget-title">Send Message to<span>John Doe</span></h2>
							<form>
								<input type="text" placeholder="Your Name" />
								<input type="text" placeholder="Your Email ID" />
								<textarea placeholder="Message"></textarea>
								<input type="submit" value="Submit" class="btn">
							</form>
						</aside>
						<aside class="widget widget-property-featured">
							<h2 class="widget-title">Most<span>Recent</span></h2>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a href="#" title="Fetured Property"><img src="images/aa-listing/feacture1.jpg" alt="feacture1" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a href="#" title="Fetured Property">Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a href="#" title="Fetured Property"><img src="images/aa-listing/feacture2.jpg" alt="feacture2" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a href="#" title="Fetured Property">>Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a href="#" title="Fetured Property"><img src="images/aa-listing/feacture3.jpg" alt="feacture3" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a href="#" title="Fetured Property">Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
			<!-- container /- -->
		</div><!-- Property Detail Page /- -->

		<!-- Partner Section -->
		<div id="partner-section" class="partner-section">
			<div class="container">
				<div id="business-partner" class="business-partner">
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client1.jpg" alt="client1"></a></div>
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client2.jpg" alt="client2"></a></div>
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client3.jpg" alt="client3"></a></div>
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client1.jpg" alt="client1"></a></div>
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client4.jpg" alt="client4"></a></div>
					<div class="item"><a title="Gallery Image" href="#"><img src="images/aa-listing/client2.jpg" alt="client1"></a></div>
				</div>
			</div>
		</div><!-- Partner Section /- -->
	</div><!-- Page Content -->

	<!-- Footer Section -->
	<div id="footer-section" class="footer-section">
		<!-- container -->
		<div class="container">
			<!-- col-md-3 -->
			<div class="col-md-3 col-sm-6">
				<!-- About Widget -->
				<aside class="widget widget_about">
					<h3 class="widget-title">About Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
				</aside>
				<!-- About Widget /- -->
			</div><!-- col-md-3 -->

			<!-- col-md-3 -->
			<div class="col-md-3 col-sm-6">
				<!-- Quick Link Widget -->
				<aside class="widget widget_quick_links">
					<h3 class="widget-title">Quick Links</h3>
					<ul class="p_l_z">
						<li><a title="Quick Links" href="#">Listing</a></li>
						<li><a title="Quick Links" href="#">Property</a></li>
						<li><a title="Quick Links" href="#">News</a></li>
						<li><a title="Quick Links" href="#">Gallery</a></li>
						<li><a title="Quick Links" href="#">Pages</a></li>
						<li><a title="Quick Links" href="#">Types</a></li>
						<li><a title="Quick Links" href="#">Contact Us</a></li>
					</ul>
				</aside>
				<!-- Quick Link Widget /- -->
			</div><!-- col-md-3 -->

			<!-- col-md-3 -->
			<div class="col-md-3 col-sm-6">
				<!-- Address Widget -->
				<aside class="widget widget_address">
					<h3 class="widget-title">Address</h3>
					<p>108 Villa Precy Subdivision Kumintang Ilaya Batangas, Philippines</p>
					<span>1200 666 12345</span>
					<a title="mailto" href="mailto:info@propertyexpert.com ">info@propertyexpert.com </a>
				</aside>
				<!-- Address Widget /- -->
			</div><!-- col-md-3 -->

			<!-- col-md-3 -->
			<div class="col-md-3 col-sm-6">
				<!-- Address Widget -->
				<aside class="widget widget_newsletter">
					<h3 class="widget-title">NewsLetter</h3>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Enter Your ID">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go</button>
						</span>
					</div><!-- /input-group -->
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
				</aside>
				<!-- Address Widget /- -->
			</div><!-- col-md-3 -->
		</div><!-- container /- -->
		<!-- Footer Bottom -->
		<div id="footer-bottom" class="footer-bottom">
			<!-- container -->
			<div class="container">
				<p class="col-md-4 col-sm-6 col-xs-12">&copy; 2015 property expert ‐ All Rights Reserved</p>
				<div class="col-md-4 col-sm-6 col-xs-12 pull-right social">
					<ul class="footer_social m_b_z">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
					<a href="#" title="back-to-top" id="back-to-top" class="back-to-top"><i class="fa fa-long-arrow-up"></i> Top</a>
				</div>
			</div><!-- container /- -->
		</div><!-- Footer Bottom /- -->
	</diV><!-- Footer Section -->

	<!-- jQuery Include -->
	<script src="libraries/jquery.min.js"></script>
	<script src="libraries/jquery.easing.min.js"></script><!-- Easing Animation Effect -->
	<script src="libraries/bootstrap/bootstrap.min.js"></script> <!-- Core Bootstrap v3.2.0 -->
	<script src="libraries/modernizr/modernizr.custom.37829.js"></script> <!-- Modernizer -->
	<script src="libraries/jquery.appear.js"></script> <!-- It Loads jQuery when element is appears -->
	<script src="libraries/owl-carousel/owl.carousel.min.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="libraries/checkbox/icheck.min.js"></script> <!-- Check box -->
	<script src="libraries/drag-drop/jquery.tmpl.min.js"></script> <!-- Drag Drop file -->
	<script src="libraries/drag-drop/drag-drop.js"></script> <!-- Drag Drop File -->
	<script src="libraries/drag-drop/modernizr.custom.js"></script> <!-- Drag Drop File -->
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false'></script>
	<script src="libraries/gmap/jquery.gmap.min.js"></script> <!-- map -->
	<script src="libraries/expanding-search/classie.js"></script>
	<script src="libraries/expanding-search/uisearch.js"></script>
	<!-- Customized Scripts -->
	<script src="js/functions.js"></script>
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
