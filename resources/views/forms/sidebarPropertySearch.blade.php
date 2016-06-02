{!! Form::open(['route' => 'search', 'method' => 'GET']) !!}
	{!! Form::text('MLSNumber', null, ['placeholder' => 'Listing ID']) !!}
	{!! Form::text('city', null, ['placeholder' => 'City']) !!}
	<!-- {!! Form::select('community', $communitySelect) !!} -->
	{!! Form::text('postalCode', null, ['placeholder' => 'Zip']) !!}
	<div class="col-md-6 col-sm-6 p_l_z">
		{!! Form::select('totalBeds', ['Beds', '1','2','3','4','5+']) !!}
	</div>
	<div class="col-md-6 col-sm-6 p_r_z">
		{!! Form::select('totalBaths', ['Baths', '1','2','3','4','5+']) !!}
	</div>
	{!! Form::text('min_price', null, ['placeholder' => 'Min Price']) !!}
	{!! Form::text('max_price', null, ['placeholder' => 'Max Price']) !!}
	{!! Form::text('min_sqft', null, ['placeholder' => 'Min SqFt']) !!}
	{!! Form::text('max_sqft', null, ['placeholder' => 'Max SqFt']) !!}
	{!! Form::submit('Search Now', ['class' => 'btn']) !!}
{!! Form::close() !!}
