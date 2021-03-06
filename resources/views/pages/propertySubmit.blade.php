@extends('layouts.default')

@section('content')
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
					<h2>SUBMIT PROPERTY</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active">Submit Property</li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->

	<!-- submit-property-1 -->
	<div class="submit-property">
		<div class="container">

			@include('pages.includes.statusMessages')

			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#property_information" aria-controls="property_information" role="tab" data-toggle="tab">Property Information</a></li>
					<li role="presentation"><a href="#property_images" aria-controls="property_images" role="tab" data-toggle="tab">Property Images</a></li>
					<li role="presentation"><a href="#features" aria-controls="features" role="tab" data-toggle="tab">Features</a></li>
					<li role="presentation"><a href="#add_location" aria-controls="add_location" role="tab" data-toggle="tab">Add Location</a></li>
					<li role="presentation"><a href="#additional_details" aria-controls="additional_details" role="tab" data-toggle="tab">Additional Details</a></li>
					<li role="presentation"><a href="#agent" aria-controls="agent" role="tab" data-toggle="tab">Agent / Owner Info</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="property_information">
						<div class="contact-feedback-form">
							<form>
								<div class="col-md-12">
									<input type="text" id="property-title" placeholder="Property Title">
								</div>
								<div class="col-md-12">
									<textarea  rows="4" placeholder="Property Description"></textarea>
								</div>
								<div class="col-md-6">
									<select>
										<option>Type (select)</option>
										<option>Luxurious</option>
										<option>bungalow</option>
										<option>House</option>
									</select>
								</div>
								<div class="col-md-6">
									<select>
										<option>City (select)</option>
										<option>New York</option>
										<option>Illinois</option>
										<option>Texas</option>
									</select>
								</div>
								<div class="col-md-6">
									<select>
										<option>Status (select)</option>
										<option>Buy</option>
										<option>Sale</option>
										<option>Rent</option>
									</select>
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Bedrooms">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Bathrooms">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Garages">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Sale or Rent Price">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Price Postfix Text">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Area">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Area Postfix Text">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Property Id">
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="VirtualTour Video URL">
								</div>
								<div class="col-md-12">
									<a href="#" title="Next Step" class="next-step">Next Step</a>
								</div>
							</form>
						</div>
					</div><!-- submit-property-1/- -->

					<div role="tabpanel" class="tab-pane" id="property_images">
						<div class="contact-feedback-form">
							<!-- Drop Zone -->
							<div id="droparea" class="col-md-6 droparea">
								<div class="dropareainner">
									<p class="dropfiletext">Drag and drop images here</p>
									<p>or</p>
									<p><input id="uploadbtn" class="uploadbtn" type="button" value="Select images"/></p>

								</div>
								<input id="upload" type="file" multiple />
							</div>
							<div id="result" class="result">
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
								</div>

								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
									<img src="images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
								</div>
								<div class="col-md-12">
									<a href="#" title="Next Step" class="next-step">Next Step</a>
								</div>
							</div><!-- Drop Zone/- -->
						</div>
					</div><!-- submit-property-2/- -->

					<div role="tabpanel" class="tab-pane" id="features">
						<div class="contact-feedback-form">
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-1" checked>
									<label for="checkbox-1">Pound</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-2">
									<label for="checkbox-2">Back Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-3">
									<label for="checkbox-3">Back Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-4">
									<label for="checkbox-4">Back Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-5" checked>
									<label for="checkbox-5">Attic</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-6">
									<label for="checkbox-6">Sprinklers</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-7">
									<label for="checkbox-7">Sprinklers</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-8">
									<label for="checkbox-8">Sprinklers</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-9" checked>
									<label for="checkbox-9">Pool</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-10">
									<label for="checkbox-10">Doorman</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-11">
									<label for="checkbox-11">Doorman</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-12">
									<label for="checkbox-12">Doorman</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-13" checked>
									<label for="checkbox-13">Fenced Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-14">
									<label for="checkbox-14">Basketball Court</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-15">
									<label for="checkbox-15">Basketball Court</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-16">
									<label for="checkbox-16">Basketball Court</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-17" checked>
									<label for="checkbox-17">Balcony</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-18">
									<label for="checkbox-18">Lake View</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-19">
									<label for="checkbox-19">Lake View</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-20">
									<label for="checkbox-20">Lake View</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-21" checked>
									<label for="checkbox-21">Wine Cellar</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-22">
									<label for="checkbox-22">Front Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-23">
									<label for="checkbox-23">Front Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-24">
									<label for="checkbox-24">Front Yard</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-25" checked>
									<label for="checkbox-25">Fire Place</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-26">
									<label for="checkbox-26">Washer and Dryer</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-27">
									<label for="checkbox-27">Washer and Dryer</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="amenities-checkbox">
									<input type="checkbox" id="checkbox-28">
									<label for="checkbox-28">Washer and Dryer</label>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<a href="#" title="Next Step" class="next-step">Next Step</a>
							</div>
						</div>
					</div><!-- submit-property-3/- -->

					<div role="tabpanel" class="tab-pane" id="add_location">
						<div class="contact-feedback-form">
							<form>
								<div class="col-md-10 col-sm-9 col-xs-12 p_z">
									<input type="text" id="address" placeholder="Address">
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12 p_r_z">
									<button class="btn">Find Address</button>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 p_z">
									<div id="gmap2" class="mapping"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 p_z"><a href="#" title="Next Step" class="next-step">Next Step</a></div>
							</form>
						</div>
					</div><!-- submit-property-4/- -->
					<div role="tabpanel" class="tab-pane" id="additional_details">
						<div class="contact-feedback-form">
							<form>
								<div class="input-group">
									<div class="col-md-4 col-sm-4">
										<input type="text" name="add-title1" placeholder="Title">
									</div>
									<div class="col-md-7 col-sm-7">
										<input type="text" name="add-value1" placeholder="Value">
									</div>
									<a href="#"><i class="fa fa-times-circle"></i></a>
								</div>

								<div class="input-group">
									<div class="col-md-4 col-sm-4">
										<input type="text" name="add-title2" placeholder="Title">
									</div>
									<div class="col-md-7 col-sm-7">
										<input type="text" name="add-value2" placeholder="Value">
									</div>
									<a href="#"><i class="fa fa-times-circle"></i></a>
								</div>

								<div class="input-group">
									<div class="col-md-4 col-sm-4">
										<input type="text" name="add-title3" placeholder="Title">
									</div>
									<div class="col-md-7 col-sm-7">
										<input type="text" name="add-value3" placeholder="Value">
									</div>
									<a href="#"><i class="fa fa-times-circle"></i></a>
								</div>

								<div class="input-group">
									<div class="col-md-4 col-sm-4">
										<input type="text" name="add-title4" placeholder="Title">
									</div>
									<div class="col-md-7 col-sm-7">
										<input type="text" name="add-value4" placeholder="Value">
									</div>
									<a href="#"><i class="fa fa-times-circle"></i></a>
								</div>
							</form>
							<div class="col-md-12 col-sm-12">
								<a href="#" title="Next Step" id="add-item" class="next-step">Add More</a>
							</div>
							<div class="col-md-12 col-sm-12">
								<a href="#" title="Next Step" class="next-step">Next Step</a>
							</div>
						</div>
					</div><!-- submit-property-5/- -->
					<div role="tabpanel" class="tab-pane" id="agent">
						<div class="contact-feedback-form owner-form">
							<h4>What to display in agent information box ?</h4>
							<form>
								<div class="col-md-12 p_l_z">
									<input type="radio" name="optionsRadios" id="radio1" value="option1" checked>
									<label for="radio1">None <span>(Agent information box will not be	displayed)</span></label>
								</div>
								<div class="col-md-12 p_l_z">
									<input type="radio" name="optionsRadios" id="radio2" value="option2">
									<label for="radio2">My profile information <span>(You can add your profile information)</span></label>
								</div>
								<div class="col-md-3 p_l_z">
									<input type="radio" name="optionsRadios" id="radio3" value="option3">
									<label for="radio3">Display an agent's information</label>
								</div>
								<div class="col-md-3">
									<div class="agent-select">
										<select>
											<option>Type (select)</option>
											<option>Luxurious</option>
											<option>bungalow</option>
											<option>House</option>
										</select>
									</div>
								</div>
								<div class="col-md-12 p_l_z">
									<input type="text" id="agent-msg-riview" placeholder="Message to the Reviewer">
								</div>
								<div class="col-md-12">
									<input type="checkbox" value="" id="checkbox1" checked>
									<label for="checkbox1">Mark this property as featured property</label>
								</div>
								<div class="col-md-12">
									<input type="submit" value="Submit Property" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false'></script>
<script src="libraries/gmap/jquery.gmap.min.js"></script> <!-- map -->
<script src="libraries/jquery.appear.js"></script> <!-- It Loads jQuery when element is appears -->
<script src="libraries/owl-carousel/owl.carousel.min.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
<script src="libraries/checkbox/icheck.min.js"></script> <!-- Check box -->
<script src="libraries/drag-drop/jquery.tmpl.min.js"></script> <!-- Drag Drop file -->
<script src="libraries/drag-drop/drag-drop.js"></script> <!-- Drag Drop File -->
<script src="libraries/drag-drop/modernizr.custom.js"></script> <!-- Drag Drop File -->

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
@endsection
