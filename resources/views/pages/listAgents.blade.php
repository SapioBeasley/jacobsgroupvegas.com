@extends('layouts.default')

@section('content')
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
				<div class="col-md-12 col-sm-6 p_l_z">
					<!-- Section Header -->
					<div class="section-header">
						<h3><span>AGENT</span>Listing</h3>
					</div><!-- Section Header /- -->

					<!-- Agent List -->
					<div class="agent-list row">
						@foreach ($agents as $agent)
							@include('pages.includes.agentsSection')
						@endforeach
					</div>
					<!-- Agent List /- -->

					<!-- <div class="listing-pagination">
						<ul class="pagination">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
						</ul>
					</div> -->
				</div><!-- col-md-9 /- -->
				<!-- col-md-3 -->
				<!-- <div class="col-md-3 col-sm-6 p_r_z property-sidebar">
					<aside class="widget widget-search">
						<h2 class="widget-title">search<span>property</span></h2>
						<form>

							{!! Form::checkbox('check', 1) !!}
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
				</div> --><!-- col-md-3 /- -->
			</div><!-- container fluid /- -->
		</div><!-- container /- -->
	</div><!-- Agent Detail Page /- -->
</div><!-- Page Content -->
@endsection
