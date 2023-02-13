@extends('main.body')
@section('content')
<style type="text/css">
	.signinBx{
		display: flex;
	}
	.signupBx{
		display: none;
	}
	.formBx {
		position: relative;
		width: 50%;
		height: 100%;
		background: #fff;
		padding: 40px;
		transition: 0.5s;
	}
	.formBx form h2 {
		font-size: 18px;
		font-weight: 600;
		text-transform: uppercase;
		letter-spacing: 2px;
		text-align: center;
		width: 100%;
		margin-bottom: 10px;
		color: #555;
	}

	.formBx form input {
		position: relative;
		width: 100%;
		padding: 10px;
		background: #f5f5f5;
		color: #333;
		border: none;
		outline: none;
		box-shadow: none;
		margin: 19px 0;
		font-size: 14px;
		letter-spacing: 1px;
		font-weight: 300;
	}

	.formBx form button {
		max-width: 100px;
		background: #677eff;
		color: #fff;
		cursor: pointer;
		font-size: 14px;
		font-weight: 500;
		letter-spacing: 1px;
		transition: 0.5s;
		border: none;
		padding: 10px 20px;
		margin-bottom: 10px;
	}
	.nb form button {
		max-width: 100px;
		background: #677eff;
		color: #fff;
		cursor: pointer;
		font-size: 14px;
		font-weight: 500;
		letter-spacing: 1px;
		transition: 0.5s;
		border: none;
		padding: 10px 20px;
		margin-bottom: 10px;
	}
	.wrapper {
		display: flex;
		width: 600px;
	}

	.left,
	.right {
		flex: 1 1 auto;
		/*border: 1px solid dimgray;*/
		max-width: 50%;
	}
	.left > img {
		width: 100%;
		height: auto;
		pointer-events: none;
	}

	.right {
		position: relative;
		overflow: hidden;
		display:none;
		z-index: 99999999;
	}

	.inner {
		position: absolute;
		width: 400%;
		height: 400%;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.inner > img {
		width: 100%;
		height: auto;
	}
	.wrapper:hover .right{
		display: block;
	}
	.alert-warning {
		color: #856404;
		background-color: #fff3cd;
		border-color: #ffeeba;
		top: 99px;
	}
</style>
<section class="section" id="product" style="margin: 0px !important;">
	<div class="container" style="margin-top: 150px;margin-bottom: 45px;">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="wrapper left-images">
					<div class="left">
						<img src="{{ url('storage/app/'.$sinpr->image) }}" alt="">

					</div>
					<div class="right">
						<div class="inner">
							<img src="{{ url('storage/app/'.$sinpr->image) }}" alt="">

						</div>
					</div>
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
					<div class="quote">
						<p>{{ $sinpr->description }}</p>
					</div>

					@if($sinpr->stock>0)
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
							<input type="hidden" name="price" value="{{ $sinpr->price }}">
							<input type="hidden" name="quantity" value="1" id="quantity">
							<input type="hidden" name="prid" value="{{ $sinpr->id }}">
							<input type="hidden" name="userid">
							@if(Auth::check())
							<button type="submit" class="new-button float-right">Add to Cart</button>
							@else()
							<button type="button" class="new-button float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Add to Cart</button>
							@endif
						</form>
					</div>
					@else()
					<span class="badge badge-danger" style="width: fit-content; color: white;">Out of stock</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content container">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="user signinBx">
					<div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
					{{-- <div class="card-header">{{ __('Login') }}</div> --}}
					<div class="formBx cardbody">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<h5>Login In</h5>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
							<button type="submit">Login</button>
							<p class="signup">
								Don't have an account ?
								<a href="#" class="toreg">Sign Up.</a>
							</p>
						</form>
					</div>
				</div>
				<div class="user signupBx">
					<div class="card-body nb">
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="mb-3">
								<label for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>
								<div class="">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="mb-3">
								<label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

								<div class="">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="mb-3">
								<label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>

								<div class="">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="mb-3">
								<label for="password-confirm" class=" col-form-label text-md-end">{{ __('Confirm Password') }}</label>

								<div class="">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="mb-0">
								<div class=" offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
							<p class="signup">
								Already have an account ?
								<a href="#" class="tosign">Sign in.</a>
							</p>
						</form>
					</div>
					<div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
	<script type="text/javascript">

		$(document).ready(function(){
			$(".toreg").click(function(){
				$(".signupBx").css({"display": "flex"});
				$(".signinBx").css({"display": "none"});
			});
			$(".tosign").click(function(){
				$(".signupBx").css({"display": "none"});
				$(".signinBx").css({"display": "flex"});
			});
		});
		const inner = document.querySelector(".inner");
		const left = document.querySelector(".left");
		left.addEventListener("mousemove", handleMousemove, false);
		function handleMousemove(event) {
			let { width, height } = this.getBoundingClientRect();
			let xAxis = event.offsetX / width * 100;
			let yAxis = event.offsetY / height * 100;
			inner.style.transform = `translate(-${xAxis}%, -${yAxis}%)`;
		}

	</script>
</section>
@endsection()