@extends('layouts.default')

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
					<h2>Communities</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active"><a href="{{route('communities')}}">Communities</a></li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->
	<!-- Search Section -->
	<div id="search-section" class="search-section search-section2 container-fluid p_z">
		<!-- Container -->
		<div class="container">
			@include('forms.homePropertySearch')<!-- col-md-10 /- -->
		</div><!-- Container /- -->
	</div><!-- Search Section /- -->

	<!-- Featured Section -->
	<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
		<!-- container -->
		<div class="container">

			@include('pages.includes.statusMessages')

			<div class="section-header">
				<div class="col-md-8 col-sm-7">
					<p>Select your</p>
					<h3>New Community</h3>
				</div>
			</div>

			@foreach ($communities as $community)
				<!-- Col-md-4 -->
				<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
					<!-- Property Main Box -->
					<div class="property-main-box">
						<div class="property-details">
							<a title="Property Title" href="{{route('communities.show', $community['community'])}}">{{$community['community']}}</a>
							<ul>
								<li><i class="fa fa-home"></i>{{count($community->properties)}} Available Properties</li>
							</ul>
						</div>
					</div>
				</div><!-- Col-md-4 /- -->
			@endforeach

		</div><!-- container -->
	</div><!-- Featured Section /- -->

</div>
@endsection
