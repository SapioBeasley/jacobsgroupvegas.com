@foreach ($amentities as $amentityKey => $amentityValue)
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="amenities-checkbox">
			<label for="checkbox-1">
				<h4>{{implode(' ', preg_split('/(?=[A-Z])/',$amentityKey))}}:</h4>
				<small>{{! empty($amentityValue) ? $amentityValue : 'N/A'}}</small>
			</label>
		</div>
	</div>
@endforeach
