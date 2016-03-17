<div class="col-md-4 rent-block">
	<!-- Property Main Box -->
	<div class="property-main-box">
		@if (isset($property['propertyImages'][0]))
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['listingID'])}}">
					<img src="{{asset($property['propertyImages'][0]['dataUri'])}}" alt="rent" />
				</a>
				<h4>&dollar; {{$property['listPrice']}}</h4>
			</div>
		@endif
		<div class="property-details">
			<a title="Property Title" href="{{route('properties.show', $property['listingID'])}}">{{$property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city']}}</a>
			<ul>
				<li><i class="fa fa-expand"></i>3326 sq</li>
				<li><i><img src="{{asset('images/icon/bed-icon.png')}}" alt="bed-icon" /></i>3</li>
				<li><i><img src="{{asset('images/icon/bath-icon.png')}}" alt="bath-icon" /></i>2</li>
			</ul>
		</div>
	</div><!-- Property Main Box /- -->
</div>
