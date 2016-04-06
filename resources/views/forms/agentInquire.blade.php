{!! Form::open(['route' => ['properties.inquire', 'agent=' . $agent->name]]) !!}
	<div class="col-md-6 col-xs-12">
		{!! Form::text('name', null, ['placeholder' => 'Your Name']) !!}
	</div>
	<div class="col-md-6 col-xs-12">
		{!! Form::text('email', null, ['placeholder' => 'Your Email']) !!}
	</div>
	<div class="col-md-12 col-xs-12">
		{!! Form::textarea('message', null, ['placeholder' => 'Message']) !!}
	</div>
	<div class="col-md-12 col-xs-12">
		{!! Form::submit('Submit', ['class' => 'btn']) !!}
	</div>
{!! Form::close() !!}
