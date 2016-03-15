@extends('layouts.default')

@section('title', $property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state'])

@section('content')
<!-- "id" => 87
    "postalCode" => "89183"
    "approximateAcreage" => 0.08
    "value" => 0.0
    "yearBuilt" => "2004"
    "listingID" => "1578902"
    "state" => "Nevada"
    "listPrice" => "187000"
    "listingStatus" => "Active-Exclusive Right"
    "originalListPrice" => "195000"
    "garageDescription" => ""Attached ","Entry to House""
    "lotDescription" => ""Under 1/4 Acre""
    "interiorDescription" => ""Blinds","Unfinished","Window Coverings Throughout""
    "otherApplianceDescription" => ""None""
    "constructionDescription" => ""Frame & Stucco""
    "flooringDescription" => ""Carpet","Linoleum/Vinyl""
    "builtDescription" => "Resale"
    "heatingDescription" => ""Central""
    "bathDownstairsDescription" => "1/2 Bath Downstairs"
    "coolingFuelDescription" => "Electric"
    "diningRoomDescription" => ""Kitchen/Dining Room Combo""
    "familyRoomDescription" => ""None""
    "kitchenDescription" => ""Laminate Countertops","Linoleum/Vinyl Flooring""
    "livingRoomDescription" => ""Front""
    "masterBedroomDescription" => ""Master Bedroom Upstairs""
    "possessionDescription" => "Close of Escrow"
    "ovenDescription" => ""Cooktop (G)""
    "equestrianDescription" => ""None""
    "miscellaneousDescription" => ""None""
    "exteriorDescription" => ""None""
    "landscapeDescription" => ""Desert Landscaping""
    "heatingFuelDescription" => ""Gas""
    "energyDescription" => ""None""
    "furnishingsDescription" => "No Furniture"
    "images" => 21
    "photoInstructions" => "User will upload by clicking on TOOLS in MLXchange/Fusion"
    "sysId" => 64872778
    "daysOnMarket" => "" -->
<!-- Page Content -->
<div class="page-content">
	<!-- Banner Section -->
	<div id="page-banner-section" class="page-banner-section container-fluid p_z">
		<img src="{{asset('images/aa-listing/banner.jpg')}}" alt="banner">
		<!-- Banner Inner -->
		<div class="page-title">
			<div class="container ">
				<div class="banner-inner">
					<h2>Listing ID# : {{$property['listingID']}}</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="{{route('properties')}}">Properties</a></li>
						<li class="active">{{$property['streetNumber'] .' ' . $property['streetName']}}</li>
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
				<h3>{{$property['streetNumber'] .' ' . $property['streetName']}} - {{$property['city']}}
					<span>{{$property['propertyType']}}</span>
				</h3>
				<ul>
					<li>${{$property['listPrice']}}</li>
					<li>Listing ID# : {{$property['listingID']}}</li>
					<li><i class="fa fa-expand"></i>{{$property['lotSqft']}} sq</li>
					<li><i><img src="{{asset('images/icon/bed-icon.png')}}" alt="bed-icon" /></i>{{$property['bedrooms']}}</li>
					<li><i><img src="{{asset('images/icon/bath-icon.png')}}" alt="bath-icon" /></i>{{$property['totalBaths']}}</li>
					<!-- <li><i class="fa fa-car"></i>1</li> -->
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
							@include('pages.includes.propertiesDetailCarousel')
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
						<p>{{$property['customPropertyDescription']}}</p>
					</div>
					<div class="general-amenities pull-left">
						<h3>General amenities</h3>
						<div class="amenities-list pull-left">
						@include('includes.amentities')
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
					<aside class="widget widget-search">
						<h2 class="widget-title">Send Message to<span>View</span></h2>
						@include('forms.propertyInquire')
					</aside>
					<!-- <aside class="widget widget-property-featured">
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
					</aside> -->
				</div>
			</div>
		</div>
		<!-- container /- -->
	</div><!-- Property Detail Page /- -->

</div><!-- Page Content -->

@endsection
