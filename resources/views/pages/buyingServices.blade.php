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
					<h2>Buying Services</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active">Buying Services</li>
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
						<h3><span>BUYING</span>Services</h3>
					</div><!-- Section Header /- -->

					<div class="row">
						<div class="col-md-12">
							<p>When you’re ready to purchase a home in Las Vegas, look no further than the Jacobs Group Real Estate team. Along with the group’s combined years of experience and achievements, Jonathan has won several prestigious real estate awards during his years in the industry, including ‘Top 40 Under 40 Agents in Las Vegas’ and ‘Top 250 Hispanic Agents in the United States’ in the past year alone. These awards were achieved by working closely with a client base of satisfied, and many times repeat, buyers who value Jonathan’s knowledge, expertise, and aggressive negotiating skills.</p>

							<p>Many realtors will require you to sign a contract stating that you must work with them exclusively. Our team will never do that. We are committed to earning and keeping your business, not forcing it. Our main focus is doing whatever it takes for each of our clients to complete their buying experience feeling satisfied with this notoriously difficult process. Our client’s happiness is, and always will be, the Jacobs Group’s number one priority.</p>

							<p>Please feel free to use our website to look for the new home you’ve been dreaming of. All listings are pulled directly from the MLS for your convenience. We can also send automated lists to your email that meet the criteria of the home you are looking for. We look forward to earning your business as a client.</p>
						</div>
					</div>

					<hr>

					<!-- Search Section -->
					<div id="search-section" class="search-section search-section2 container-fluid p_z">
						<!-- Container -->
						<div class="container">
							@include('forms.homePropertySearch')
						</div><!-- Container /- -->
					</div><!-- Search Section /- -->

				</div><!-- col-md-9 /- -->
			</div><!-- container fluid /- -->
		</div><!-- container /- -->
	</div><!-- Agent Detail Page /- -->
</div><!-- Page Content -->
@endsection
