@extends('layouts.frontLayout.front_design')
@section('content')

	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">

			@if(Session::has('flash_message_success'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{!! session('flash_message_success') !!}</strong>
		            </div>
		        @endif
		        @if(Session::has('flash_message_error'))
		            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{!! session('flash_message_error') !!}</strong>
		            </div>
        		@endif   
				
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Update Account</h2>
						<form id="loginForm" name="loginForm" action="{{ url('/account') }}" method="POST">{{ csrf_field() }}
							
							<input  value="{{ $userDetails->name }}" name="name" id="name" type="name" placeholder="Name" />
							<input name="address" id="address" type="address" placeholder="Address" />
							<input name="city" id="city" type="city" placeholder="City" />
							<input name="state" id="state" type="state" placeholder="State" />
							<select name="country" id="country">
								<option value="">Select Country</option>
								@foreach($countries as $country)
								<option value="{{ $country->country_name}}">{{ $country->country_name }}</option>
								@endforeach
							</select>
							<input style="margin-top: 10px;" name="pincode" id="pincode" type="name" placeholder="Pincode" />
							<input name="mobile" id="mobile" type="name" placeholder="Name" />
						
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
 

@endsection