{!! Form::open(['route' => 'search', 'method' => 'GET']) !!}
	<div class="col-md-12 home-search">
		{!! Form::text('address', null, ['placeholder' => 'Enter Address', 'class' => 'form-control']) !!}
	</div>
	<!-- col-md-10 -->
	<div class="col-md-10 p_l_z">
		{!! Form::text('MLSNumber', null, ['placeholder' => 'Listing ID']) !!}
		{!! Form::text('city', null, ['placeholder' => 'City']) !!}
		<!-- {!! Form::select('community', $communitySelect) !!} -->
		{!! Form::text('postalCode', null, ['placeholder' => 'Zip']) !!}
		{!! Form::select('totalBeds', ['Beds', '1','2','3','4','5+']) !!}
		{!! Form::select('totalBaths', ['Baths', '1','2','3','4','5+']) !!}
		{!! Form::text('min_price', null, ['placeholder' => 'Min Price']) !!}
		{!! Form::text('max_price', null, ['placeholder' => 'Max Price']) !!}
		{!! Form::text('min_sqft', null, ['placeholder' => 'Min SqFt']) !!}
		{!! Form::text('max_sqft', null, ['placeholder' => 'Max SqFt']) !!}
	</div>
	<!-- col-md-10 /- -->

	<!-- col-md-2 -->
	<div class="col-md-2">
		<div class="section-header">
			<h3><span>Search</span>Property</h3>
			<!-- <a title="search" class="btn" href="#">Search</a> -->
			{!! Form::submit('Search', ['class' => 'btn search-btn']) !!}
		</div>
	</div>
	<!-- col-md-2 /- -->

{!! Form::close() !!}
