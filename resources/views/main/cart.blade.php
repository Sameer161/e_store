@extends('main.body')
@section('content')
<style type="text/css">
	td input{
		border: none !important;
		text-align: center;
	}
</style>
<div class="container" style="margin-top: 162px;margin-bottom: 81px;">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="{{ url('updatecart') }}">
				@csrf
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
						{{-- @dd($item->prid) --}}
						<tr>
							<td><img src="{{ ('storage/app/'.$item->prod->image) }}" style="max-width: 100px;"></td>
							<td>{{ $item->prod->name }}</td>
							<td>
								<div class="right-content">
									<div class="quantity buttons_added">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity[]" value="{{ $item->quantity }}" class="input-text qty text" id="count">
										<input type="button" value="+" class="plus">
										<input type="hidden" class="baseprice" value="{{ $item->prod->price }}">
									</div>
								</div>
							</td>
							{{-- <td name="nprice" class="newprice">{{ $item->prod->price*$item->quantity }}</td> --}}
							<td>
								<input type="number" name="nprice[]" class="newprice" value="{{ $item->prod->price*$item->quantity }}">
							</td>
							<input type="hidden" name="cartid[]" value="{{ $item->id }}">
							<td><a href="{{ url('delal/'.$item->id) }}"><i class="fas fa-trash" aria-hidden="true" style="color:#dc3545;"></i></a></td>
						</tr>
						@endforeach()
					</tbody>
				</table>
				<div class="d-flex justify-content-between">
					<a class="new-button" href="{{ url('/') }}">Continuo Shopping</a>
					<button class="new-button" type="submitt">Update Cart</button>
				</div>	
			</form>
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
						<p>${{ totalprice() }}</p>
					</div>
					<a href="{{ url('/checkout') }}" class="new-button w-100">Proceed to Checkout</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".plus").click(function()
		{
			var currentVal = parseInt($(this).prev(".qty").val());
			if (currentVal != NaN)
			{
				$(this).prev(".qty").val(currentVal + 1);
			}
			
			var newqty=currentVal + 1;
			// $(this).('#newquan').val(newq ty);
			var pri=$(this).next('.baseprice').val();
			var newprice=newqty*pri;
			// $(this).parents('td').next().text(newprice);
			$(this).parents('td').next().children().val(newprice);
		});

		$(".minus").click(function()
		{
			var currentVal = parseInt($(this).next(".qty").val());
			if (currentVal != NaN)
			{
				if(currentVal > 0){
					$(this).next(".qty").val(currentVal - 1);
				}
				var newqty=currentVal - 1;
				console.log(currentVal - 1);
				var pri=$(this).nextAll('.baseprice').val();
				var newprice=newqty*pri;
				// $(this).parents('td').next().text(newprice);
				$(this).parents('td').next().children().val(newprice);
			}
		});
	});
</script>
@endsection()