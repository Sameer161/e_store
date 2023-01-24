@extends('main.body')
@section('content')
<style type="text/css">
	h6{
		font-weight: 400;
	}
	#newpreloader {
		position: unset !important;
		background: transparent;
		overflow: unset;
		margin-top: 83px;
		margin-bottom: 30px;
	}
	#newloader {
		display: block;
		position: relative;
		left: 50%;
		top: 50%;
		width: 150px;
		height: 150px;
		margin: 0px;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: #2a2a2a;
		-webkit-animation: spin 2s linear infinite;
		animation: spin 2s linear infinite;
	}
	#newloader:before {
		content: "";
		position: absolute;
		top: 5px;
		left: 5px;
		right: 5px;
		bottom: 5px;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: #2a2a2a;
		-webkit-animation: spin 3s linear infinite;
		animation: spin 3s linear infinite;
	}
	#newloader:after {
		content: "";
		position: absolute;
		top: 15px;
		left: 15px;
		right: 15px;
		bottom: 15px;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: #2a2a2a;
		-webkit-animation: spin 1.5s linear infinite;
		animation: spin 1.5s linear infinite;
	}
	@-webkit-keyframes spin {
		0%   {
			-webkit-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	@keyframes spin {
		0%   {
			-webkit-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
</style>


<div id="newpreloader">
	<div id="newloader"></div>
</div>
<div class="container new-block" style="margin-top:100px;display: none;">
	<div class="row">
		<div class="col-lg-8">
			<div class="d-flex mb-4">
				<div>
					<i class="fa-regular fa-circle-check fa-2x my-2 text-primary"></i>
				</div>
				<div class="pl-2">	
					<p>Order</p>
					<h6>Thank You</h6>
				</div>
			</div>
			<div class="borderd-dark border mb-3 p-3">
				<h6>Your order is confirmed</h6>
				<p>Buyer Protection-Our Protection Covers Your Purchase From Click To Delivery at Your Doorstep.</p>
			</div>
			<div class="borderd-dark border mb-3 p-3">
				<h6>Order Updates</h6>
				<p>You will get shipping and delivery updates by email.</p>
			</div>
			<div class="borderd-dark border mb-3 p-3">
				<h6>Customer information</h6>
				@foreach($orderget as $comp)
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td>
								<p><b>Contact Information</b></p>
								<p>{{ $comp->email }}</p>
							</td>
							<td>
								<p><b>Payment method</b></p>
								<p>{{ $comp->payment }}-<b>{{ $comp->total }}</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<p><b>Billing Address</b></p>
								<p>{{ $comp->adress }}</p>
							</td>
							<td>
								<p><b>Postal Code</b></p>
								<p>{{ $comp->postal }}</p>
							</td>
						</tr>
						<tr>
							<td>
								<p><b>Shipping Method</b></p>
								<p>Standard Shipping</p>
							</td>
						</tr>
					</tbody>
				</table>
				@endforeach()
			</div>
			<div class="text-right" style="margin-bottom: 20px;">
				<a href="{{ url('/') }}" class="new-button">Continuo Shopping</a>
			</div>
		</div>
	</div>
</div>
@endsection()