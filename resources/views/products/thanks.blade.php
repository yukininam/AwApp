@extends('layouts.frontLayout.front_design')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Thanks Page</li>
				</ol>
			</div>
	
		</div>
	</section>

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>YOUR COD ORDER HAS BEEN PLACES</h3>
				<p>Your order number is {{ Session::get('order_id') }} and total payable about is ₱{{ Session::get('grand_total') }} </p>
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
			</div>
		</div>
	</section>

@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>