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
					<h2>{{$community['community']}}</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li><a href="{{route('communities')}}">Communities</a></li>
						<li class="active">{{$community['community']}}</li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->

	<!-- Property Detail Page -->
	<div class="property-agent">
		<!-- container -->
		<div class="container">

			@include('pages.includes.statusMessages')

			<!-- container fluid -->
			<div class="container-fluid p_z">
				<!-- col-md-9 -->
				<div class="col-md-9 col-sm-6 p_l_z">
					<!-- Agent Detail Box -->
					<!-- <div class="agent-detail-box">
						<div class="col-md-12">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum, Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
							<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
						</div>
					</div> --><!-- Agent Detail Box -->
					<!-- Other Property -->
					<div class="other-properties row">

						<h3>COMMUNITY LISTINGS</h3>

						@foreach ($properties as $property)
							@include('pages.includes.propertiesLoopGrid')
						@endforeach

						{{$properties->links()}}

					</div><!-- Other Property -->
					<!-- Agent Contatct Form -->
					<div class="contact-feedback-form">
						<h3><span>Send message To</span>View more on Community</h3>
						@include('forms.communityInquire')
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
