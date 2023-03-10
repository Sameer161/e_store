@extends('main.body')
@section('content')
<style type="text/css">
	.subscribe{
		margin-top: 0px;
	}
</style>
<div class="container" style="overflow: hidden;">
	<form method="POST" action="{{ url('/order') }}">
		<div class="row" style="margin: 160px 0px 60px 0px;">
			<div class="col-md-7">
				@csrf
				<div class="bg-dark text-white py-3 px-4">Delivery Option</div>
				<div class="mb-3"style="border: 1px solid #7a7a7a;padding: 20px;">
					<div class="row justify-content-between subscribe mb-3">
						<div class="col-md-6">
							<input class="" type="text" name="name" placeholder="Enter Name" value="{{ auth()->user()->name }}" required>
						</div>
						<div class="col-md-6">
							<input class="" type="number" name="phone" placeholder="Enter Phone Number" value="{{ auth()->user()->number }}" required>
						</div>
					</div>
					<div class="row subscribe mb-3">
						<div class="col-md-12">
							<input class="" type="email" name="email" placeholder="Enter Email" value="{{ auth()->user()->email }}" required>
						</div>
					</div>
					<div class="row subscribe mb-3">
						<div class="col-md-12">
							<input class="" type="text" name="adress" placeholder="Enter Address" value="{{ auth()->user()->adress }}" required>
						</div>
					</div>
					<div class="row justify-content-between subscribe mb-3">
						<div class="col-md-6">
							<input class="" type="text" name="city" placeholder="Enter City" value="{{ auth()->user()->city }}" required>
						</div>
						<div class="col-md-6">
							<input class="" type="number" name="postal" placeholder="Enter Postal Code" value="{{ auth()->user()->postal }}" required>
						</div>
					</div>
					<input type="hidden" name="sutotal" value="{{ totalprice() }}">
				</div>
				<div class="bg-dark text-white py-3 px-4">Payment</div>
				<div style="border: 1px solid #7a7a7a;padding: 20px;">
					<div class="form-check mb-2">
						<input class="form-check-input" type="radio" name="payment" id="" value="cash on delivery" required>
						<label class="form-check-label" for="exampleRadios1">
							Cash On Delivery
						</label>
					</div>
					<div class="form-check mb-2">
						<input class="form-check-input" type="radio" name="payment" id="" value="card" required>
						<label class="form-check-label" for="exampleRadios2">
							Credit or Debit Card
						</label>
					</div>
					<div class="text-right">
						<button type="submit" class="new-button" style="border:1px solid #7a7a7a;">Place Order</button>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="bg-secondary text-white py-3 px-4">In Your Bag</div>
				<div class="border border-secondary">
					<div class="row mx-0 border-bottom border-secondary mb-3 pt-3">
						<div class="col-md-6 pb-3">
							<span>Subtotal</span>
						</div>
						<div class="col-md-6 text-right pb-3">
							<span class="h6">${{ totalprice() }}</span>
						</div>
						<div class="col-md-6 pb-3">
							<span>Shipment Fee</span>
						</div>
						<div class="col-md-6 text-right pb-3">
							<span class="h6">$7</span>
						</div>
						<div class="col-md-6 pb-3">
							<span>Grand Total</span>
						</div>
						<div class="col-md-6 text-right pb-3">
							<span class="h6">${{ totalprice()+7 }}</span>
						</div>
					</div>
					@foreach($cart as $chkout)
					{{-- @dd($chkout) --}}
					<div class="row mb-3 mx-0">
						<div class="col-md-3">
							<img src="{{ ('storage/app/'.$chkout->prod->image) }}" style="max-width: 100%;">
						</div>
						<div class="col-md-9">
							<h5>{{ $chkout->prod->name }}</h5>
							<p>{{ $chkout->prod->description }}</p>
						</div>
					</div>
					<input type="hidden" name="userid" value="{{ $chkout->userid }}">
					<input type="hidden" name="prname[]" value="{{ $chkout->prod->name }}">
					<input type="hidden" name="prid[]" value="{{ $chkout->prid }}">
					<input type="hidden" name="quantity[]" value="{{ $chkout->quantity }}">
					<input type="hidden" name="price[]" value="{{ $chkout->price }}">
					@endforeach
				</div>
			</div>
		</div>
	</form>
</div>
@endsection()