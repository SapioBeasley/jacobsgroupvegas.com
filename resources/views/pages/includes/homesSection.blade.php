<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
	<div class="property-main-box">

		@if (isset($property['propertyImages'][0]))
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['listingID'])}}">
					<img src="{{asset($property['propertyImages'][0]['dataUri'])}}" onerror="this.src='http://placehold.it/350x260?text=No Image Available'"/>
				</a>
			</div>
		@endif

		<div class="clearfix"></div>
		<div class="property-details">
			<a title="Property Title" href="{{route('properties.show', $property['listingID'])}}">{{$property['streetNumber'] . ' ' . $property['streetName']}}</a>
			<h4>&dollar;{{$property['listPrice']}}</h4>
			<p>{{strlen($property['customPropertyDescription']) > 130 ? substr($property['customPropertyDescription'],0,130)."..." : $property['customPropertyDescription']}} <a title="more" href="{{route('properties.show', $property['listingID'])}}">more</a></p>
			<ul>
				<li><i class="fa fa-expand"></i>{{$property['lotSqft']}} sq</li>
				<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>{{$property['bedrooms']}}</li>
				<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>{{$property['totalBaths']}}</li>
			</ul>
		</div>
	</div>
</div>

