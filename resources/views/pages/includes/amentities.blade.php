<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="amenities-checkbox">
		<label for="checkbox-1">Property Type: </label>
		{{! empty($property['propertyType']) ? $property['propertyType'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-2">Age Restricted: </label>
		{{! empty($property['ageRestricted']) ? $property['ageRestricted'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-3">Master Bed Dimensions: </label>
		{{! empty($property['masterBedroomDimensions']) ? $property['masterBedroomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-4">2nd Bed Dimensions: </label>
		{{! empty($property['2ndBedroomDimensions']) ? $property['2ndBedroomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-5">3rd Bed Dimensions: </label>
		{{! empty($property['3rdBedroomDimensions']) ? $property['3rdBedroomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-6">4th Bed Dimensions: </label>
		{{! empty($property['4thBedroomDimensions']) ? $property['4thBedroomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-7">5th Bed Dimensions: </label>
		{{! empty($property['5thBedroomDimensions']) ? $property['5thBedroomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-8">Family Room Dimensions: </label>
		{{! empty($property['familyRoomDimensions']) ? $property['familyRoomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-29">Year Built: </label>
		{{! empty($property['yearBuilt']) ? $property['yearBuilt'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-30">Association Fee: </label>
		{{! empty($property['associationFee1']) ? $property['associationFee1'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-31">Garage: </label>
		{{! empty($property['garage']) ? $property['garage'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-26">Misc: </label>
		{{! empty($property['miscellaneousDescription']) ? $property['miscellaneousDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-26">Furnishing: </label>
		{{! empty($property['furnishingsDescription']) ? $property['furnishingsDescription'] : 'N/A'}}
	</div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="amenities-checkbox">
		<label for="checkbox-9">Bedrooms: </label>
		{{! empty($property['bedrooms']) ? $property['bedrooms'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-10">Baths: </label>
		{{! empty($property['totalBaths']) ? $property['totalBaths'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-11">SqFt: </label>
		{{! empty($property['lotSqft']) ? $property['lotSqft'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-12">Dining Dimensions: </label>
		{{! empty($property['diningRoomDimensions']) ? $property['diningRoomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-13">Living Room Dimensions: </label>
		{{! empty($property['livingRoomDimensions']) ? $property['livingRoomDimensions'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-14">Internet: </label>
		{{! empty($property['internet']) ? $property['internet'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-15">Model: </label>
		{{! empty($property['model']) ? $property['model'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-16">pvPool: </label>
		{{! empty($property['pvPool']) ? $property['pvPool'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-27">Energy Desc: </label>
		{{! empty($property['energyDescription']) ? $property['energyDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-28">Lanscape: </label>
		{{! empty($property['landscapeDescription']) ? $property['landscapeDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-32">Solar</label>
		{{! empty($property['solarElectric']) ? $property['solarElectric'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-26">Ext: </label>
		{{! empty($property['exteriorDescription']) ? $property['exteriorDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-26">Unit: </label>
		{{! empty($property['unitDescription']) ? $property['unitDescription'] : 'N/A'}}
	</div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="amenities-checkbox">
		<label for="checkbox-17">Roof Desc.</label>
		{{! empty($property['roofDescription']) ? $property['roofDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-18">Lot Desc</label>
		{{! empty($property['lotDescription']) ? $property['lotDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-19">Downstairs Bath: </label>
		{{! empty($property['bathDownstairsDescription']) ? $property['bathDownstairsDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-20">Heating Desc.</label>
		{{! empty($property['heatingDescription']) ? $property['heatingDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-21">Cooling Fuel: </label>
		{{! empty($property['coolingFuelDescription']) ? $property['coolingFuelDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-22">Oven: </label>
		{{! empty($property['ovenDescription']) ? $property['ovenDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-23">Family Room: </label>
		{{! empty($property['familyRoomDescription']) ? $property['familyRoomDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-24">Living Room</label>
		{{! empty($property['livingRoomDescription']) ? $property['livingRoomDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-25">Equestrian</label>
		{{! empty($property['equestrianDescription']) ? $property['equestrianDescription'] : 'N/A'}}
	</div>
	<div class="amenities-checkbox">
		<label for="checkbox-26">Sewer: </label>
		{{! empty($property['sewer']) ? $property['sewer'] : 'N/A'}}
	</div>
</div>
