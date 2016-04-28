<div class="col-md-4 rent-block">
	<!-- Property Main Box -->
	<div class="property-main-box">
		@if (isset($property['propertyImages'][0]))
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['MLSNumber'])}}">
					<img src="{{asset($property['propertyImages'][0]['dataUri'])}}" alt="rent" onerror="this.src='http://placehold.it/350x260?text=No Image Available'"/>
				</a>
				<h4>&dollar; {{$property['CurrentPrice']}}</h4>
			</div>
		@else
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['MLSNumber'])}}">
					<img src="http://placehold.it/350x260?text=No Image Available" alt="rent"/>
				</a>
				<h4>&dollar; {{$property['CurrentPrice']}}</h4>
			</div>
		@endif
		<div class="property-details">
			<a title="Property Title" href="{{route('properties.show', $property['MLSNumber'])}}">{{$property['StreetNumber'] . ' ' . $property['StreetName'] . ' ' . $property['City']}}</a>
			<ul>
				<li><i class="fa fa-expand"></i>{{$property['LotSqft']}} sq</li>
				<li><i><img src="{{asset('images/icon/bed-icon.png')}}" alt="bed-icon" /></i>{{$property['BedsTotal']}}</li>
				<li><i><img src="{{asset('images/icon/bath-icon.png')}}" alt="bath-icon" /></i>{{$property['BathsTotal']}}</li>
			</ul>
		</div>
	</div><!-- Property Main Box /- -->
</div>
