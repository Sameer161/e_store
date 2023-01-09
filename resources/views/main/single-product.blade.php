@extends('main.body')
@section('content')
<section class="section" id="product">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="left-images">
					<img src="{{ url('storage/app/'.$sinpr->image) }}" alt="">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="right-content">
					<h4>{{ $sinpr->name }}</h4>
					<span class="price">${{ $sinpr->price }}</span>
					<ul class="stars">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
					</ul>
					<span>{{ $sinpr->description }}</span>
					<div class="quote">
						<i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
					</div>
					<div class="quantity-content">
						<div class="left-content">
							<h6>No. of Orders</h6>
						</div>
						<div class="right-content">
							<div class="quantity buttons_added">
								<input type="button" value="-" class="minus" id="moins" onclick="minus()"><input type="number" name="quantity" value="1" class="input-text qty text" id="count"><input type="button" value="+" class="plus" id="plus"
								onclick="plus()">
							</div>
						</div>
					</div>
					<div class="total">
						<form method="POST" action="{{ url('/postcart/'.$sinpr->id) }}">
							@csrf
							<input type="hidden" name="quantity" value="1" id="quantity">
							<input type="hidden" name="prid" value="{{ $sinpr->id }}">
							<input type="hidden" name="userid">
							<button type="submit" class="new-button float-right">Add to Cart</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		
		var count = 1;
		var countEl = document.getElementById("count");
		function plus(){
			count++;
			countEl.value = count;
			console.log(count);
			document.getElementById("quantity").value=count;
		}
		function minus(){
			if (count > 1) {
				count--;
				countEl.value = count;
			}  
			document.getElementById("quantity").value=count;
		}
	</script>
</section>
@endsection()