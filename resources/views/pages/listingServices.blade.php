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
					<h2>Listing Services</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="#">Home</a></li>
						<li class="active">Listing Services</li>
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
						<h3><span>LISTING</span>Services</h3>
					</div><!-- Section Header /- -->

					<div class="row">
						<div class="col-lg-12">
							<p>When you make the decision to sell your home, you need someone who understands how to market properties efficiently for maximum exposure. The Jacobs Group is experienced in showcasing real estate properties to generate buzz and bring consistent traffic until we have the house under contract. We utilize the most current and tested combinations of online and print marketing, conduct open houses, and reach out to our network of contacts and current/past clients. We also form a team with various lenders and title companies who assist in advertising the property. This combination of marketing expertise assures our sellers that we will work tirelessly to get their property the attention and exposure it deserves.</p>

							<p>If you are thinking of putting your home on the market, contact us so we can sit down together and create a marketing plan for your home. We will discuss your goals and expectations of the selling process, as well as show you all the current market information and recent comparable home sales. (Please note that online valuation models with instant results cannot correctly interpret the market and are often very different from your home’s actual value). Together we will agree on a sale price that will allow you to move happily, and will also get your property sold quickly.</p>

							<p>We look forward to earning your business as a client.</p>

							{!! Form::open(['route' => 'postListing']) !!}
								@include('forms.listingInquire')
							{!! Form::close() !!}
						</div>
					</div>

				</div><!-- col-md-9 /- -->
			</div><!-- container fluid /- -->
		</div><!-- container /- -->
	</div><!-- Agent Detail Page /- -->
</div><!-- Page Content -->
@endsection
