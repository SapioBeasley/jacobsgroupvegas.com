<div class="property-listing-box sale-block">
	<!-- Property Main Box -->
	<div class="property-main-box">
		@if (isset($property['_source']['mainImage']) && ! is_array($property['_source']['mainImage']))
			<div class="col-md-4 p_z property-image">
				<a title="Property Image" href="{{route('properties.show', $property['_source']['listingId'])}}">
					<img src="{{asset($property['_source']['mainImage'])}}" alt="property1" onerror="this.src='http://placehold.it/350x260?text=No Image Available'">
				</a>
			</div>
		@endif
		<div class="col-md-8 p_z">
			<div class="property-details">
				<a title="Property Title" href="{{route('properties.show', $property['_source']['listingId'])}}">{{$property['_source']['address']}}</a>
				<h4>&dollar;{{$property['_source']['listPrice']}} </h4>
				<p>{{strlen($property['_source']['description']) > 150 ? substr($property['_source']['description'],0,150)."..." : $property['_source']['description']}}</p>
				<ul>
					<li><i class="fa fa-expand"></i> {{$property['_source']['lotSqft']}} sq </li>
					<li><img src="images/aa-listing/bedroom-icon.png" alt="bedroom-icon"> {{$property['_source']['bedrooms']}} </li>
					<li><img src="images/aa-listing/bathroom-icon.png" alt="bathroom-icon">{{$property['_source']['totalBaths']}} </li>
				</ul>
			</div>
		</div>
	</div><!-- Property Main Box /- -->
</div>
