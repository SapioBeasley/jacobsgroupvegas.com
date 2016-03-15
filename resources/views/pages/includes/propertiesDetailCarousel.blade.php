@foreach($property->propertyImages as $imageKey => $image)
	@if ($imageKey == 0)
		<div class="item active">
			<img src="{{asset($image['dataUri'])}}" alt="{{$property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state']}}">
		</div>
	@else
		<div class="item">
			<img src="{{asset($image['dataUri'])}}" alt="{{$property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state']}}">
		</div>
	@endif
@endforeach
