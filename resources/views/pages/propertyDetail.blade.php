@extends('layouts.default')

@section('title', $property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state'])

@section('content')
<!-- Page Content -->
<div class="page-content">
	<!-- Banner Section -->
	<div id="page-banner-section" class="page-banner-section container-fluid p_z">
		<img src="{{asset('images/aa-listing/banner.jpg')}}" alt="banner">
		<!-- Banner Inner -->
		<div class="page-title">
			<div class="container ">
				<div class="banner-inner">
					<h2>Listing ID# : {{$property['listingId']}}</h2>
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

			<div class="shortcodes col-md-12 col-sm-12 col-xs-12 p_z">
				@if (Session::has('success_message'))
					<div class="alert alert-success" role="alert">
						<span>Well done!</span> {{Session::get('success_message')}}
					</div>
				@elseif (Session::has('info_message'))
					<div class="alert alert-info" role="alert">
						<span>Heads Up!</span> {{Session::get('success_message')}}
					</div>
				@elseif (Session::has('warning_message'))
					<div class="alert alert-warning" role="alert">
						<span>Warning!</span> {{Session::get('warning_message')}}
					</div>
				@elseif (Session::has('error_message'))
					<div class="alert alert-danger" role="alert">
						<span>Well Done!</span> {{Session::get('error_message')}}
					</div>
				@endif
			</div>

			<div class="property-header">
				<h3>{{$property['streetNumber'] .' ' . $property['streetName']}} - {{$property['city']}}
					<span>{{$property['propertyType']}}</span>
				</h3>
				<ul>
					<li>${{$property['listPrice']}}</li>
					<li>Listing ID# : {{$property['listingId']}}</li>
					<li><i class="fa fa-expand"></i>{{$property['lotSqft']}} sq</li>
					<li><i><img src="{{asset('images/icon/bed-icon.png')}}" alt="bed-icon" /></i>{{$property['bedrooms']}}</li>
					<li><i><img src="{{asset('images/icon/bath-icon.png')}}" alt="bath-icon" /></i>{{$property['totalBaths']}}</li>
					<li><i class="fa fa-video-camera"></i><a target="_blank" title="virtual tour" href="{{$property['virtualTourLink']}}">Virtual Tour</a></li>
					<!-- <li><i class="fa fa-car"></i>1</li> -->
				</ul>
			</div>
			<div class="property-details-content container-fluid p_z">
				<!-- col-md-9 -->
				<div class="col-md-9 col-sm-6 p_z">

					<!-- Slider Section -->
					<div  class="carousel slide property-detail1-slider" >
							@include('pages.includes.propertiesDetailCarousel')
					</div><!-- Slider Section /- -->

					<div class="single-property-details">
						<h3>Description</h3>
						<p>{{$property['customPropertyDescription']}}</p>
					</div>
					<div class="general-amenities pull-left">
						<h3>General amenities</h3>
						<div class="amenities-list pull-left">
						@include('pages.includes.amentities')
						</div>
					</div>
					<div class="property-direction pull-left">
						<h3>Get Direction</h3>
						<div class="property-map">
							<div id="map" class="mapping"></div>
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
					<aside class="widget widget-property-featured">
						<h2 class="widget-title">Most<span>Recent</span></h2>

						@foreach ($recent as $newProp)
							<div class="property-featured-inner">
								<div class="col-md-4 col-sm-3 col-xs-2 p_z">
									@if (isset($newProp['propertyImages'][0]))
										<a href="{{route('properties.show', $newProp['listingId'])}}" title="Fetured Property"><img src="{{asset($newProp['propertyImages'][0]['dataUri'])}}" alt="feacture1"></a>
									@else
										<a href="{{route('properties.show', $newProp['listingId'])}}" title="Fetured Property"><img src="http://placehold.it/73x55?text=No Image" alt="feacture1"></a>
									@endif
								</div>
								<div class="col-md-8 col-sm-9 col-xs-10 featured-content">
									<a href="{{route('properties.show', $newProp['listingId'])}}" title="Fetured Property">{{$newProp['streetNumber'] . ' ' . $newProp['streetName']}}</a>
									<h3>&dollar;{{$newProp['listPrice']}}</h3>
								</div>
							</div>
						@endforeach

					</aside>
				</div>
			</div>
		</div>
		<!-- container /- -->
	</div><!-- Property Detail Page /- -->

</div><!-- Page Content -->
@endsection

@section('mapCoords')
<script>
	var map = new GMaps({
		el: '#map',
		lat: {{$geoLocation['lat']}},
		lng: {{$geoLocation['lng']}},
		zoom: 13,
		zoomControl : true,
		zoomControlOpt: {
			style : 'SMALL',
			position: 'TOP_LEFT'
		},
		panControl : false,
	});
	map.addMarker({
		lat: {{$geoLocation['lat']}},
		lng: {{$geoLocation['lng']}},
		title: 'London Eye',
		infoWindow: {
			content: 'The London Eye is a giant Ferris wheel situated on the banks of the River Thames in London, England. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).'
		},
	});
</script>
@endsection
