@extends('main.body')
@section('content')
<style type="text/css">
	footer{
		margin-top: 264px
	}
</style>
<div class="new-nav">
	<ul>
		<li>
			<a class="toggle" href="#">
				<span class="icon"><i class="fas fa-bars"></i></span>
				<span class="title">Menu</span>
			</a>
		</li>
		<li>
			<a href="{{ url('userorder') }}">
				<span class="icon"><i class="fas fa-home"></i></span>
				<span class="title">Home</span>
			</a>
		</li>
		<li>
			<a href="{{ url('/userdetail') }}">
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
<div style="margin-top: 81px;">
	<table class="table w-75 table-bordered mx-auto">
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
@endsection()