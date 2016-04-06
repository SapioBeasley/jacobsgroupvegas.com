<hr>

<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			{!! Form::text('address1', null, ['class' => 'form-control', 'placeholder' => 'Adress 1']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('address2', null, ['class' => 'form-control', 'placeholder' => 'Adress 2']) !!}
		</div>
	</div>

	<div class="col-md-7">
		<div class="row">
			<div class="col-md-4 form-group">
				{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
			</div>
			<div class="col-md-4 form-group">
				{!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
			</div>
			<div class="col-md-4 form-group">
				{!! Form::text('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				{!! Form::select('property_type', ['Select Type', 'Single Family Residential', 'Multifamily Residential', 'Rentals', 'Farms', 'Commercial', 'Lots and Land', 'Business Opportunity', 'Rental Income', 'Lease'], null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4">
				{!! Form::select('condition', ['Select Condition', 'Excellent', 'Good', 'Fair', 'Needs Work', 'Poor'], null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::select('beds', ['Beds', '1', '2', '3', '4', '5+'], null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::select('baths', ['Baths', '1', '2', '3', '4', '5+'], null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>









<h5>Additional Rooms/Features</h5>

<p>Please list additional rooms and describe any special features and recent upgrades. For example: new roof, new carpet, custom kitchen cabinets, etc</p>

<div class="form-group">
	{!! Form::textarea('additional_rooms', null, ['class' => 'form-control']) !!}
</div>

<h5>Approx. Size</h5>

<div class="form-group">
	{!! Form::textarea('approx_size', null, ['class' => 'form-control']) !!}
</div>

<p>Approx. Age of Kitchen<br>

<div class="form-group">
	{!! Form::textarea('approx_age_of_kitchen', null, ['class' => 'form-control']) !!}
</div>

<p>Approx. Age of Baths<br>

<div class="form-group">
	{!! Form::textarea('approx_age_of_baths', null, ['class' => 'form-control']) !!}
</div>

<p>Message<br>

<div class="form-group">
	{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<hr>

<p>Please provide the following information so we can contact you with your home valuation report.</p>

<div class="form-group">
	{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
</div>
<div class="form-group">
	{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
</div>
<div class="form-group">
	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>
<div class="form-group">
	{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Submit', ['class' => 'btn']) !!}
</div>

<p>By submitting this form with your telephone number, you are consenting for Jonathan Jacobs and authorized representatives to contact you even if your name is on the Federal "Do-not-call List."</p>
