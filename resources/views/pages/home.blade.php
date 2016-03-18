@extends('layouts.default')

@section('content')
<!-- Page content -->
<div class="page-content">
	<!-- Slider block -->
	<div class="slider-block container-fluid p_z">
		<!-- Slider Section -->
		<div id="property-slider" class="carousel slide slider-section slider-section2" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="images/slider/slide-1.jpg" alt="Slide 1">
				</div>
				<div class="item">
					<img src="images/slider/slide-3.jpg" alt="Slide 1">
				</div>
				<div class="item">
					<img src="images/slider/slide-2.jpg" alt="Slide 2">
				</div>
				<div class="item">
					<img src="images/slider/slide-2.jpg" alt="Slide 2">
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
			@include('forms.homePropertySearch')
		</div><!-- Container /- -->
	</div><!-- Search Section /- -->

	<!-- Featured Section -->
	<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
		<!-- container -->
		<div class="container">

			<div class="section-header">
				<div class="col-md-8 col-sm-7">
					<p id="las-vegas-properties">New Properties in</p>
					<h3>Las Vegas</h3>
				</div>
			</div>

			@if(isset($properties['lasVegas'][0]))

				@foreach ($properties['lasVegas']->take(6) as $property)
					@include('pages.includes.homesSection')
				@endforeach

				<!-- Col-md-12 -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a title="view in area" href="{{route('search', 'city=las vegas')}}" class="">View in Area</a>
				</div><!-- Col-md-12 -->

			@else

				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4>No Properties Currently Available</h4>
				</div>

			@endif

		</div><!-- container -->
	</div><!-- Featured Section /- -->

	<!-- Featured Section -->
	<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
		<!-- container -->
		<div class="container">

			<div class="section-header">
				<div class="col-md-8 col-sm-7">
					<p id="henderson-properties">New Properties in</p>
					<h3>Henderson</h3>
				</div>
			</div>

			@if(isset($properties['henderson'][0]))

				@foreach ($properties['henderson']->take(6) as $property)
					@include('pages.includes.homesSection')
				@endforeach

				<!-- Col-md-12 -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a title="view in area" href="{{route('search', 'city=henderson')}}" class="">View in Area</a>
				</div><!-- Col-md-12 -->

			@else
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4>No Properties Currently Available</h4>
				</div>
			@endif

		</div><!-- container -->
	</div><!-- Featured Section /- -->

	<!-- Featured Section -->
	<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
		<!-- container -->
		<div class="container">

			<div class="section-header">
				<div class="col-md-8 col-sm-7">
					<p id="north-las-vegas-properties">New Properties in</p>
					<h3>North Las Vegas</h3>
				</div>
			</div>

			@if(isset($properties['northLasVegas'][0]))

				@foreach ($properties['northLasVegas']->take(6) as $property)
					@include('pages.includes.homesSection')
				@endforeach

				<!-- Col-md-12 -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a title="view in area" href="{{route('search', 'city=north las vegas')}}" class="">View in Area</a>
				</div><!-- Col-md-12 -->

			@else
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4>No Properties Currently Available</h4>
				</div>
			@endif

		</div><!-- container -->
	</div><!-- Featured Section /- -->

	<!-- Featured Section -->
	<div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
		<!-- container -->
		<div class="container">

			<div class="section-header">
				<div class="col-md-8 col-sm-7">
					<p id="boulder-city-properties">New Properties in</p>
					<h3>Boulder City</h3>
				</div>
			</div>

			@if(isset($properties['boulderCity'][0]))

				@foreach ($properties['boulderCity']->take(6) as $property)
					@include('pages.includes.homesSection')
				@endforeach

				<!-- Col-md-12 -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a title="view in area" href="{{route('search', 'city=boulder city')}}" class="">View in Area</a>
				</div><!-- Col-md-12 -->

			@else
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4>No Properties Currently Available</h4>
				</div>
			@endif

		</div><!-- container -->
	</div><!-- Featured Section /- -->

</div>
@endsection
