<div class="col-md-4 col-sm-6 col-xs-6 sale-block">
	<div class="property-main-box">

		@if (isset($property['_source']['mainImage']))
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['_source']['listingId'])}}">
					<img src="{{asset($property['_source']['mainImage'])}}" onerror="this.src='http://placehold.it/350x260?text=No Image Available'"/>
				</a>
			</div>
		@else
			<div class="property-images-box">
				<a title="Property Image" href="{{route('properties.show', $property['_source']['listingId'])}}">
					<img src="http://placehold.it/350x260?text=No Image Available"/>
				</a>
			</div>
		@endif

		<div class="clearfix"></div>
		<div class="property-details">
			<a title="Property Title" href="{{route('properties.show', $property['_source']['listingId'])}}">{{$property['_source']['streetNumber'] . ' ' . $property['_source']['streetName']}}</a>
			<h4>&dollar;{{$property['_source']['listPrice']}}</h4>
			<p>{{strlen($property['_source']['description']) > 130 ? substr($property['_source']['description'],0,130)."..." : $property['_source']['description']}} <a title="more" href="{{route('properties.show', $property['_source']['listingId'])}}">more</a></p>
			<ul>
				<li><i class="fa fa-expand"></i>{{$property['_source']['lotSqft']}} sq</li>
				<li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>{{$property['_source']['bedrooms']}}</li>
				<li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>{{$property['_source']['totalBaths']}}</li>
			</ul>
		</div>
	</div>
</div>

