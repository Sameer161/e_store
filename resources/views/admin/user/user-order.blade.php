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
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Paymant Method</th>
					</tr>
				</thead>
				<tbody class="">
					{{-- @dd($userorder) --}}
					@foreach($userorder as $order)
					<tr>
						<td>{{ $order->name }}</td>
						<td>{{ $order->adress }}</td>
						<td>{{ $order->invoice }}</td>
						<td>{{ $order->quantity }}</td>
						<td>{{ $order->total }}</td>
						<td>{{ $order->payment }}</td>
					</tr>
					@endforeach()
				</tbody>
			</table>
		</div>	
	</div>
</div>

@endsection()