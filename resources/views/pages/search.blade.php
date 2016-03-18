@extends('layouts.default')

@section('content')
<!-- Page content -->
<div class="page-content">
	<!-- Banner Section -->
	<div id="page-banner-section" class="page-banner-section container-fluid p_z">
		<img src="images/aa-listing/banner.jpg" alt="banner">
		<!-- Banner Inner -->
		<div class="page-title">
			<div class="container ">
				<div class="banner-inner">
					<h2>Listings</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active">Listings</li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->

	<!-- Property Listing Section -->
	<div id="property-listing" class="property-listing">
		<div class="container">
			<div class="property-left col-md-9 col-sm-6 p_l_z content-area">
				<div class="section-header p_l_z">
					<div class="col-md-12 col-sm-12 p_l_z">
						<p>property</p>
						<h3>listing</h3>
					</div>
				</div>

				@if (is_null($properties))
					<h3>No Properties found. Please update your search </h3>
				@else
					@foreach ($properties as $property)
						@include('pages.includes.propertiesLoopList')
					@endforeach

					<!-- Pagination -->
					<div class="listing-pagination">
						{{$properties->links()}}
					</div><!-- Pagination /- -->
				@endif

			</div>
			<div class="col-md-3 col-sm-6 p_r_z property-sidebar widget-area">
				<aside class="widget widget-search">
					<h2 class="widget-title">search<span>property</span></h2>
					@include('forms.sidebarPropertySearch')
				</aside>
				<aside class="widget widget-property-featured">
					<h2 class="widget-title">Search by<span>Community</span></h2>

					@foreach ($communities as $community)
						<div class="property-featured-inner">
							<div class="featured-content">
								<a title="Fetured Property" href="{{route('communities.show', $community['community'])}}">{{$community['community']}}</a>
							</div>
						</div>
					@endforeach
				</aside>
			</div>
		</div>
	</div><!-- Property Listing Section /- -->

</div><!-- Page Content -->
@endsection
