<div class="property-listing-box sale-block">
	<!-- Property Main Box -->
	<div class="property-main-box">
		@if (isset($property['propertyImages'][0]))
			<div class="col-md-4 p_z property-image">
				<a title="Property Image" href="{{route('properties.show', $property['listingID'])}}">
					<img src="{{asset($property['propertyImages'][0]['dataUri'])}}" alt="property1" onerror="this.src='http://placehold.it/350x260?text=No Image Available'">
				</a>
			</div>
		@endif
		<div class="col-md-8 p_z">
			<div class="property-details">
				<a title="Property Title" href="{{route('properties.show', $property['listingID'])}}">{{$property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city']}}</a>
				<h4>&dollar;{{$property['listPrice']}} </h4>
				<p>{{strlen($property['customPropertyDescription']) > 150 ? substr($property['customPropertyDescription'],0,150)."..." : $property['customPropertyDescription']}}</p>
				<ul>
					<li><i class="fa fa-expand"></i> {{$property['lotSqft']}} sq </li>
					<li><img src="images/aa-listing/bedroom-icon.png" alt="bedroom-icon"> {{$property['bedrooms']}} </li>
					<li><img src="images/aa-listing/bathroom-icon.png" alt="bathroom-icon">{{$property['totalBaths']}} </li>
				</ul>
			</div>
		</div>
	</div><!-- Property Main Box /- -->
</div>
