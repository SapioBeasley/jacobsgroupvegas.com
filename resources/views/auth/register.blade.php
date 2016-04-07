@extends('layouts.default')

@section('content')
<!-- Page Content -->
<div class="page-content">
	<!-- Banner Section -->
	<div id="page-banner-section" class="page-banner-section container-fluid p_z">
		<img src="{{asset('images/aa-listing/banner.jpg')}}" alt="banner">
		<!-- Banner Inner -->
		<div class="page-title">
			<div class="container ">
				<div class="banner-inner">
					<h2>Register</h2>
				</div>
			</div>
			<div class="pages-breadcrumb">
				<div class="container">
					<!-- Page breadcrumb -->
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a class="active" href="{{url('/register')}}">Register</a></li>
					</ol>
				</div>
			</div>
		</div><!-- Banner Inner /- -->
	</div><!-- Banner Section /- -->

	<!-- Property Detail Page -->
	<div class="property-main-details">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Register</div>
						<div class="panel-body">

							{!! Form::open(['url' => 'register', 'class' => 'form-horizontal', 'role' => 'form']) !!}

								<div class="form-group">
									<div class="col-md-6">
										{!! Form::text('first_name', old('name'), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}

										@if ($errors->has('first_name'))
											<span class="help-block">
												<strong>{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										{!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

										@if ($errors->has('last_name'))
											<span class="help-block">
												<strong>{{ $errors->first('last_name') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group">

									<div class="col-md-12">
										{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email (Will also be used to log you in)']) !!}

										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group">

									<div class="col-md-12">
										{!! Form::text('email_confirm', null, ['class' => 'form-control', 'placeholder' => 'Confirm Email']) !!}

										@if ($errors->has('email_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('email_confirmation') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group">

									<div class="col-md-12">
										{!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Phone']) !!}

										@if ($errors->has('phone'))
											<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-btn fa-user"></i>Register
										</button>
									</div>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
