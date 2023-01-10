@extends('main.body')
@section('content')
<div class="container" style="margin-top: 162px;margin-bottom: 81px;">
	<div class="row">
		<div class="col-md-12">
			<table class="table text-center">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($showcart as $item)
					@if(auth()->user()->id=$item->userid)
					<tr>
						<td><img src="{{ ('storage/app/'.$item->prod->image) }}" style="max-width: 100px;"></td>
						<td>{{ $item->prod->name }}</td>
						<td>
							<div class="right-content">
								<div class="quantity buttons_added">
									<input type="button" value="-" class="minus" id="moins" onclick="minus()"><input type="number" name="quantity" value="{{ $item->quantity }}" class="input-text qty text" id="count"><input type="button" value="+" class="plus" id="plus"
									onclick="plus()">
								</div>
							</div>
						</td>
						<td>{{ $item->prod->price*$item->quantity }}</td>
						<td><a href="{{ url('delal/'.$item->id) }}"><i class="fas fa-trash" aria-hidden="true" style="color:#dc3545;"></i></a></td>
					</tr>
					@else
					I don't have any records!
					@endif()
					@endforeach()
				</tbody>
			</table>
			<div class="d-flex justify-content-between">
				<a class="new-button" href="{{ url('/') }}">Continuo Shopping</a>
				<button class="new-button">Update Cart</button>
			</div>	
		</div>
	</div>
	<div class="subscribe">
		<div class="row">
			<div class="col-lg-7">
				<div class="section-heading">
					<h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
					<span>Details to details is what makes Hexashop different from the other themes.</span>
				</div>
				<form id="subscribe" action="" method="get">
					<div class="row">
						<div class="col-lg-5">
							<fieldset>
								<input name="name" type="text" id="name" placeholder="Your Name" required="">
							</fieldset>
						</div>
						<div class="col-lg-5">
							<fieldset><input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Address" required=""></fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset>
								<button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
							</fieldset>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-5">
				<div class="service-item">
					<h5 class="mb-3">Cart Total</h5>
					<div class="d-flex justify-content-between mb-3">
						<span class="h6">Subtotal</span>
						<p>$53</p>
					</div>
					<button class="new-button w-100">Proceed to Checkout</button>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.service-item {
		padding: 20px;
		box-shadow: 0px 0px 15px rgb(0 0 0 / 10%);
	}
	td{
		vertical-align: middle !important;
	}
</style>
<script type="text/javascript">
	document.write=(document.getElementById('count'));
	var count = ;
	var countEl = document.getElementById("count");
	function plus(){
		count++;
		countEl.value = count;
		console.log(count);
	}
	function minus(){
		if (count > 1) {
			count--;
			countEl.value = count;
		}  
	}
</script>
@endsection()