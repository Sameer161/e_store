@extends('main.body')
@section('content')
<style type="text/css">
	footer{
		margin-top: 264px
	}
	.octive{
		background: #fddb3a;
		color: #343a40 !important;
	}s
</style>
<div class="container">
	<div class="row">
		{{-- @dd($userorder) --}}
		<div class="new-nav col-md-3" style="margin-top: 168px;">
			<ul>
				<li class="octive" class="">
					<a href="{{ url('userorder') }}">
						<span class="icon"><i class="fas fa-home"></i></span>
						<span class="title">User Orders</span>
					</a>
				</li>
				<li>
					<a href="{{ url('/userdetail/'.auth()->user()->id) }}">
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
			<table class="table table-bordered">
				<thead>
					<tr class="">
						<th>Name</th>
						<th>Address</th>
						<th>Invoice</th>
						<th>Total Price</th>
						<th>Paymant Method</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>{{ $userorder['0']['orderdetail']['name'] }}</td>
						<td>{{ $userorder['0']['orderdetail']['adress'] }}</td>
						<td>{{ $userorder['0']['orderdetail']['invoice'] }}</td>
						<td>{{ $userorder['0']['orderdetail']['total'] }}</td>
						<td>{{ $userorder['0']['payment'] }}</td>
					</tr>
				</tbody>
			</table>

			<table class="table table-bordered">
				<thead>
					<tr class="">
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody class="">
					@foreach($userorder as $order)
					<tr>
						<td>{{ $order->prname }}</td>
						<td>{{ $order->quantity }}</td>
						<td>{{ $order->price }}</td>
					</tr>
					@endforeach()
				</tbody>
			</table>
		</div>	
	</div>
</div>

@endsection()