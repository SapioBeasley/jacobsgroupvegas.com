{!! Form::open(['route' => ['inquire', 'listingId=' . $property['listingId']]]) !!}
	{!! Form::text('name', null, ['placeholder' => 'Your Name']) !!}
	{!! Form::text('email', null, ['placeholder' => 'Your Email']) !!}
	{!! Form::textarea('message', null, ['placeholder' => 'Message']) !!}
	{!! Form::submit('Submit', ['class' => 'btn']) !!}
{!! Form::close() !!}
