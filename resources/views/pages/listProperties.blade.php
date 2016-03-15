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

				@foreach ($properties['all'] as $property)
					<div class="property-listing-box sale-block">
						<!-- Property Main Box -->
						<div class="property-main-box">
							<div class="col-md-4 p_z property-image">
								<a title="Property Image" href="#">
									<img src="{{asset($property['propertyImages'][0]['dataUri'])}}" alt="property1">
								</a>
							</div>
							<div class="col-md-8 p_z">
								<div class="property-details">
									<a title="Property Title" href="#">{{$property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city']}}</a>
									<h4>&dollar;{{$property['listPrice']}} </h4>
									<p>{{strlen($property['customPropertyDescription']) > 150 ? substr($property['customPropertyDescription'],0,150)."..." : $property['customPropertyDescription']}}</p>
									<ul>
										<li><i class="fa fa-expand"></i> {{$property['lotSqft']}} sq </li>
										<li><img src="images/aa-listing/bedroom-icon.png" alt="bedroom-icon"> {{$property['bedrooms']}} </li>
										<li><img src="images/aa-listing/bathroom-icon.png" alt="bathroom-icon">{{$property['totalBaths']}}2 </li>
										<li><i class="fa fa-car"></i>1</li>
									</ul>
								</div>
							</div>
						</div><!-- Property Main Box /- -->
					</div>
				@endforeach

				<!-- Pagination -->
				<div class="listing-pagination">

					{{$properties['all']->links()}}
				</div><!-- Pagination /- -->

			</div>
			<div class="col-md-3 col-sm-6 p_r_z property-sidebar widget-area">
				<aside class="widget widget-search">
					<h2 class="widget-title">search<span>property</span></h2>
					@include('forms.sidebarPropertySearch')
				</aside>
			</div>
		</div>
	</div><!-- Property Listing Section /- -->

</div><!-- Page Content -->
@endsection
