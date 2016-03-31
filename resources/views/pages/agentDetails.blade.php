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
					<h2>{{$agent->name}}</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active">Agent listing page</li>
						<li>{{$agent->name}}</li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->

	<!-- Property Detail Page -->
	<div class="property-agent">
		<!-- container -->
		<div class="container">
			<!-- container fluid -->
			<div class="container-fluid p_z">
				<!-- col-md-9 -->
				<div class="col-md-9 col-sm-6 p_l_z">
					<!-- Agent Detail Box -->
					<div class="agent-detail-box">
						<!-- col-md-4 -->
						<div class="col-md-4">
							<div class="agent-header">
								<div class="agent-name">
									<h5>{{$agent->name}} <span>{{$agent->title}}</span></h5>
								</div>
								@if (isset($agent->title))
									<p><i class="fa fa-phone"></i> {{$agent->phone}}</p>
								@endif
								<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:{{$agent->email}}">{{$agent->email}}</a></p>
							</div>
						</div><!-- col-md-4 /- -->
						<!-- col-md-8 -->
						<div class="col-md-8">
							<div class="about-agent">
								<h5>ABOUT ME</h5>
								<p>{{$agent->description}}</p>
							</div>
						</div><!-- col-md-8 /- -->
					</div><!-- Agent Detail Box -->
					<!-- Other Property -->
					<!-- <div class="other-properties row">
						<h3>MY LISTINGS</h3>
						<div class="col-md-4 rent-block">
							<div class="property-main-box">
								<div class="property-images-box">
									<span>R</span>
									<a title="Property Image" href="#"><img src="images/rent/rent-1.jpg" alt="rent" /></a>
									<h4>&dollar;380 / pm</h4>
								</div>
								<div class="property-details">
									<a title="Property Title" href="#">Southwest 39th Terrace</a>
									<ul>
										<li><i class="fa fa-expand"></i>3326 sq</li>
										<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
										<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
									</ul>
								</div>
							</div>
						</div>
					</div> --><!-- Other Property -->
					<!-- Agent Contatct Form -->
					<div class="contact-feedback-form">
						<h3><span>Send message To</span>John Doe</h3>
						<form>
							<div class="col-md-6 col-xs-12">
								<input type="text" id="name" placeholder="Your Name">
							</div>
							<div class="col-md-6 col-xs-12">
								<input type="email" id="email" placeholder="Your Email ID">
							</div>
							<div class="col-md-12 col-xs-12">
								<textarea rows="3" placeholder="Message"></textarea>
							</div>
							<div class="col-md-12 col-xs-12">
								<input type="submit" value="Submit">
							</div>
						</form>
					</div><!-- Agent Contatct Form -->
				</div><!-- col-md-9 /- -->
				<!-- col-md-3 -->
				<div class="col-md-3 col-sm-6 p_r_z property-sidebar">
					<aside class="widget widget-search">
						<h2 class="widget-title">search<span>property</span></h2>
						@include('forms.sidebarPropertySearch')
					</aside>
				</div><!-- col-md-3 /- -->
			</div><!-- container fluid /- -->
		</div><!-- container /- -->
	</div><!-- Agent Detail Page /- -->
</div><!-- Page Content -->
@endsection
