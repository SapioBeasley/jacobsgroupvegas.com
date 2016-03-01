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
						<h2>Agent Listing PAge</h2>
					</div>
				</div>
				<div class="pages-breadcrumb">
					<div class="container">
						<!-- Page breadcrumb -->
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><a href="#">Home</a></li>
							<li class="active">Agent listing page</li>
						</ol>
					</div>
				</div>
			</div><!-- Banner Inner /- -->
		</div><!-- Banner Section /- -->

		<!-- Property Detail Page -->
		<div class="agent-listing agent-listing2">
			<!-- container -->
			<div class="container">
				<!-- container fluid -->
				<div class="container-fluid p_z">
					<!-- col-md-9 -->
					<div class="col-md-9 col-sm-6 p_l_z">
						<!-- Section Header -->
						<div class="section-header">
							<h3><span>AGENT</span>Listing</h3>
						</div><!-- Section Header /- -->
						<!-- Agent List -->
						<div class="agent-list row">
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
							<!-- col-md-4 -->
							<div class="col-md-4">
								<div class="agent-list-box">
									<div class="agent-list-image-box">
										<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
									</div>
									<div class="agent-listing-detail row-border">
										<h4><a href="agent-details.html" title="Agent Name">John Doe</a> <span>Real Estate Agent</span></h4>
										<p>Lorem agent info ipsum dolor sit amet, consectetuer adipis...</p>
										<p><i class="fa fa-phone"></i> 305 555 4555</p>
										<p><i class="fa fa-mobile"></i> 305 555 4555</p>
										<p><i class="fa fa-fax"></i> 305 555 4555</p>
										<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a></p>
										<ul class="property-social p_l_z m_b_z">
											<li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a title="linkedin-square" href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a title="instagram" href="#"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<a href="agent-details.html" title="View Profile">View Profile</a>
								</div>
							</div><!-- col-md-4 /- -->
						</div><!-- Agent List /- -->
						<div class="listing-pagination">
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</div>
					</div><!-- col-md-9 /- -->
					<!-- col-md-3 -->
					<div class="col-md-3 col-sm-6 p_r_z property-sidebar">
						<aside class="widget widget-search">
							<h2 class="widget-title">search<span>property</span></h2>
							<form>
								<select>
									<option value="selected">Property ID</option>
									<option value="one">One</option>
									<option value="two">Two</option>
									<option value="three">Three</option>
									<option value="four">Four</option>
									<option value="five">Five</option>
								</select>
								<select>
									<option value="selected">Location</option>
									<option value="one">One</option>
									<option value="two">Two</option>
									<option value="three">Three</option>
									<option value="four">Four</option>
									<option value="five">Five</option>
								</select>
								<select>
									<option value="selected">Type</option>
									<option value="one">One</option>
									<option value="two">Two</option>
									<option value="three">Three</option>
									<option value="four">Four</option>
									<option value="five">Five</option>
								</select>
								<select>
									<option value="selected">Status</option>
									<option value="one">One</option>
									<option value="two">Two</option>
									<option value="three">Three</option>
									<option value="four">Four</option>
									<option value="five">Five</option>
								</select>
								<div class="col-md-6 col-sm-12 p_l_z">
									<select>
										<option value="selected">Beds</option>
										<option value="one">One</option>
										<option value="two">Two</option>
										<option value="three">Three</option>
										<option value="four">Four</option>
										<option value="five">Five</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 p_r_z">
									<select>
										<option value="selected">Baths</option>
										<option value="one">One</option>
										<option value="two">Two</option>
										<option value="three">Three</option>
										<option value="four">Four</option>
										<option value="five">Five</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 p_l_z">
									<select>
										<option value="selected">Min Price</option>
										<option value="one">One</option>
										<option value="two">Two</option>
										<option value="three">Three</option>
										<option value="four">Four</option>
										<option value="five">Five</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 p_r_z">
									<select>
										<option value="selected">Max Price</option>
										<option value="one">$3000</option>
										<option value="two">$30000</option>
										<option value="three">$300000</option>
										<option value="four">$3000000</option>
										<option value="five">$3000000000000000</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 p_l_z">
									<select>
										<option value="selected">Min Sqft</option>
										<option value="one">One</option>
										<option value="two">Two</option>
										<option value="three">Three</option>
										<option value="four">Four</option>
										<option value="five">Five</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 p_r_z">
									<select>
										<option value="selected">Max Sqft</option>
										<option value="one">One</option>
										<option value="two">Two</option>
										<option value="three">Three</option>
										<option value="four">Four</option>
										<option value="five">Five</option>
									</select>
								</div>
								<input type="submit" value="Search Now" class="btn">
							</form>
						</aside>
						<aside class="widget widget-property-featured">
							<h2 class="widget-title">featured<span>property</span></h2>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a title="Fetured Property" href="#"><img src="images/aa-listing/feacture1.jpg" alt="feacture1" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a title="Fetured Property" href="#">Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a title="Fetured Property" href="#"><img src="images/aa-listing/feacture2.jpg" alt="feacture2" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a title="Fetured Property" href="#">Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									<a title="Fetured Property" href="#"><img src="images/aa-listing/feacture3.jpg" alt="feacture3" /></a>
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a title="Fetured Property" href="#">Southwest 39th Terrace</a>
									<h3>&dollar;350000</h3>
								</div>
							</div>
						</aside>
					</div><!-- col-md-3 /- -->
				</div><!-- container fluid /- -->
			</div><!-- container /- -->
		</div><!-- Agent Detail Page /- -->
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
