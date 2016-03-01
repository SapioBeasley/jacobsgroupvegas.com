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
    <header id="header-section" class="header header2 container-fluid p_z">
        <!-- Top Header -->
        <div class="top-header">
            <!-- container -->
            <div class="container">
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
            </div><!-- container /- -->
        </div><!-- Top Header -->
        <!-- Navigation Block -->
        <div class="navigation-block">
            <!-- container -->
            <div class="container">
                <div class="row">
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
                                        <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home</a>
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
                                    <li><a href="blog.html">Blog</a></li>
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
                </div>
            </div><!-- container /- -->
        </div><!-- Navigation Block /- -->
        <div class="container">
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
        </div>
    </header><!-- Header Section /- -->

    <!-- Page content -->
    <div class="page-content">
        <!-- Slider block -->
        <div class="slider-block container-fluid p_z">
            <!-- Slider Section -->
            <div id="property-slider" class="carousel slide slider-section slider-section2" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/slider/slide-3.jpg" alt="Slide 1">
                        <div class="carousel-caption">
                            <h4>$480,000 </h4>
                            <h3>Florida 5, Pinecrest, FL</h3>
                            <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                            <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/slider/slide-2.jpg" alt="Slide 2">
                        <div class="carousel-caption">
                            <h4>$480,000 </h4>
                            <h3>Florida 5, Pinecrest, FL</h3>
                            <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                            <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/slider/slide-1.jpg" alt="Slide 1">
                        <div class="carousel-caption">
                            <h4>$480,000 </h4>
                            <h3>Florida 5, Pinecrest, FL</h3>
                            <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                            <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/slider/slide-2.jpg" alt="Slide 2">
                        <div class="carousel-caption">
                            <h4>$480,000 </h4>
                            <h3>Florida 5, Pinecrest, FL</h3>
                            <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                            <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#property-slider" role="button" data-slide="prev">
                    <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#property-slider" role="button" data-slide="next">
                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Slider Section /- -->
        </div><!-- Slider Block /- -->

       <!-- Search Section -->
		<div id="search-section" class="search-section search-section2 container-fluid p_z">
			<!-- Container -->
			<div class="container">
				<!-- col-md-10 -->
				<div class="col-md-10 p_l_z">
					<select>
						<option>Property ID</option>
						<option>Property ID</option>
						<option>Property ID</option>
						<option>Property ID</option>
						<option>Property ID</option>
					</select>

					<select>
						<option>Location</option>
						<option>Location</option>
						<option>Location</option>
						<option>Location</option>
						<option>Location</option>
					</select>

					<select>
						<option>Type</option>
						<option>Type</option>
						<option>Type</option>
						<option>Type</option>
						<option>Type</option>
					</select>

					<select>
						<option>Status</option>
						<option>Status</option>
						<option>Status</option>
						<option>Status</option>
						<option>Status</option>
					</select>

					<select>
						<option>Bedrooms</option>
						<option>Bedrooms</option>
						<option>Bedrooms</option>
						<option>Bedrooms</option>
						<option>Bedrooms</option>
					</select>

					<select>
						<option>Bathrooms</option>
						<option>Bathrooms</option>
						<option>Bathrooms</option>
						<option>Bathrooms</option>
						<option>Bathrooms</option>
					</select>

					<select>
						<option>Min Price</option>
						<option>Min Price</option>
						<option>Min Price</option>
						<option>Min Price</option>
						<option>Min Price</option>
					</select>

					<select>
						<option>Max Price</option>
						<option>Max Price</option>
						<option>Max Price</option>
						<option>Max Price</option>
						<option>Max Price</option>
					</select>

					<select>
						<option>Min Sqft</option>
						<option>Min Sqft</option>
						<option>Min Sqft</option>
						<option>Min Sqft</option>
						<option>Min Sqft</option>
					</select>

					<select>
						<option>Max Sqft</option>
						<option>Max Sqft</option>
						<option>Max Sqft</option>
						<option>Max Sqft</option>
						<option>Max Sqft</option>
					</select>
				</div><!-- col-md-10 /- -->
				<!-- col-md-2 -->
				<div class="col-md-2">
					<div class="section-header">
						<h3><span>Search</span>Property</h3>
						<a title="search" class="btn" href="#">Search</a>
					</div>
				</div>
				<!-- col-md-2 /- -->
			</div><!-- Container /- -->
		</div><!-- Search Section /- -->

		<!-- Featured Section -->
		<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
			<!-- container -->
			<div class="container">
				<div class="section-header">
					<div class="col-md-8 col-sm-7">
						<p>Trending</p>
						<h3>Featured Property</h3>
					</div>
					<div class="col-md-4 col-sm-5">
						<h4 class="property-type-rent"><span>R</span>For Rent</h4>
						<h4 class="property-type-sale"><Span>S</span>For Sale</h4>
					</div>
				</div>
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>s</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-5.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div>
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 rent-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>R</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-6.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div><!-- Property Main Box -->
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>S</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-7.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div><!-- Property Main Box -->
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>S</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-8.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div><!-- Property Main Box /- -->
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 rent-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>R</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-9.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div><!-- Property Main Box -->
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-images-box">
							<span>s</span>
							<a title="Property Image" href="#"><img src="images/featured/featured-10.jpg" alt="featured" /></a>
						</div>
						<div class="clearfix"></div>
						<div class="property-details">
							<a title="Property Title" href="#">Southwest 39th Terrace</a>
							<h4>&dollar;380000</h4>
							<p>Lorem ipsum our Latest listed properties and check out the facilities on them, We have...<a title="more" href="#">more</a></p>
							<ul>
								<li><i class="fa fa-expand"></i>3326 sq</li>
								<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
								<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
							</ul>
						</div>
					</div><!-- Property Main Box -->
				</div><!-- Col-md-4 /- -->
				<!-- Col-md-12 -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a title="load more" href="#" class="">Load More</a>
				</div><!-- Col-md-12 -->
			</div><!-- container -->
		</div><!-- Featured Section /- -->

		<!-- Property Guide Section -->
		<div id="property-guide-section" class="property-guide-section">
			<!-- container -->
			<div class="container">
				<!-- col-md-4 -->
				<div class="col-md-4 col-sm-4">
					<div class="section-header">
						<p>In simple three step</p>
						<h3>Add Property</h3>
					</div>
					<div class="add-property">
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_z">
								<span class="guide-icon icon-green"><i class="fa fa-laptop"></i></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>1. Register</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_z">
								<span class="guide-icon icon-yellow"><i class="fa fa-laptop"></i></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>2. Add Property Detail</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_z">
								<span class="guide-icon icon-blue"><i class="fa fa-laptop"></i></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>3. You are Done</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<a title="Add Now" href="#">Add Now</a>
					</div>
				</div><!-- col-md-4 /- -->

				<!-- col-md-4 -->
				<div class="col-md-4 col-sm-4">
					<div class="section-header">
						<p>Lookout</p>
						<h3>Agents</h3>
					</div>
					<div class="agent-property">
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/agent-1.jpg" alt="agent-1" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>John Doe</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/agent-2.jpg" alt="agent-2" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>John Doe</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/agent-3.jpg" alt="agent-3" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3>John Doe</h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
					</div>
				</div><!-- col-md-4 /- -->

				<!-- col-md-4 -->
				<div class="col-md-4 col-sm-4">
					<div class="section-header">
						<p>Checkout some</p>
						<h3>LAtest News</h3>
					</div>
					<div class="news-property">
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/news-1.jpg" alt="news-1" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/news-2.jpg" alt="news-2" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
						<div class="property-guide">
							<div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
								<span class="guide-icon"><img src="images/guide/news-3.jpg" alt="news-3" /></span>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-10">
								<h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
								<p>Our Latest listed properties and check out the facilities on them.</p>
							</div>
						</div>
					</div>
				</div><!-- col-md-4 /- -->
			</div><!-- container /- -->
		</div><!-- Property Guide Section /- -->

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
	</div>

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
@endsection
