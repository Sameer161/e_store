@extends('main.body')
@section('content')
<style type="text/css">
	footer{
		margin-top: 313px
	}
	.octive{
		background: #fddb3a;
		color: #343a40 !important;
	}
</style>
<div class="container new-container">
	<div class="row">
		<div class="new-nav col-md-3" style="margin-top: 168px;">
			<ul>
				<li class="">
					<a href="{{ url('userorder') }}" class="">
						<span class="icon"><i class="fas fa-home"></i></span>
						<span class="title">User Orders</span>
					</a>
				</li>
				<li class="">
					<a href="{{ url('/userdetail/'.auth()->user()->id) }}" class="octive">
						<span class="icon"><i class="fas fa-user"></i></span>
						<span class="title">Profile</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fas fa-envelope"></i></span>
						<span class="title">Messages</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fas fa-info"></i></span>
						<span class="title">Help</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fas fa-cog"></i></span>
						<span class="title">Setting</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fas fa-lock"></i></span>
						<span class="title">Password</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="col-md-9" style="margin-top: 168px;">
			<form class="col-md-8 border py-3 rounded mx-auto" action="{{ url('/updateuser/'.auth()->user()->id) }}" method="POST" style="margin-bottom:20px;">
				@csrf
				{{-- @dd($userdetail); --}}
				<div class="form-group">
					<label class="">Name</label>
					<input type="text" name="name" class="form-control" value="{{ $userdetail[0]->name }}">
				</div>
				<div class="form-group">
					<label class="">Email</label>
					<input type="email" name="email" class="form-control" value="{{ $userdetail[0]->email }}">
				</div>
				<div class="form-group">
					<label class="">Address</label>
					<input type="text" name="adress" class="form-control" value="{{ $userdetail[0]->adress }}">
				</div>
				<div class="form-group">
					<label class="">City</label>
					<input type="text" name="city" class="form-control" value="{{ $userdetail[0]->city }}">
				</div>
				<div class="form-group">
					<label class="">Postal</label>
					<input type="number" name="postal" class="form-control" value="{{ $userdetail[0]->postal }}">
				</div>
				<div class="form-check">
					<button class="new-button" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
	{{-- <script type="text/javascript">
		if($('.new-hea').hasClass('background-header')) {
			alert('hello');
		}
	</script> --}}
</div>
@endsection()