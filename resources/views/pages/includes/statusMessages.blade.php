@if (Session::has('success_message'))
	<div class="shortcodes col-md-12 col-sm-12 col-xs-12 p_z">
		<div class="alert alert-success" role="alert">
			<span>Well done!</span> {{Session::get('success_message')}}
		</div>
	</div>
@elseif (Session::has('info_message'))
	<div class="shortcodes col-md-12 col-sm-12 col-xs-12 p_z">
		<div class="alert alert-info" role="alert">
			<span>Heads Up!</span> {{Session::get('success_message')}}
		</div>
	</div>
@elseif (Session::has('warning_message'))
	<div class="shortcodes col-md-12 col-sm-12 col-xs-12 p_z">
		<div class="alert alert-warning" role="alert">
			<span>Warning!</span> {{Session::get('warning_message')}}
		</div>
	</div>
@elseif (Session::has('error_message'))
	<div class="shortcodes col-md-12 col-sm-12 col-xs-12 p_z">
		<div class="alert alert-danger" role="alert">
			<span>Well Done!</span> {{Session::get('error_message')}}
		</div>
	</div>
@endif
