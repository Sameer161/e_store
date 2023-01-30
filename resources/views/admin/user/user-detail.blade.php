@extends('main.body')
@section('content')
<style type="text/css">
	footer{
		margin-top: 313px
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
<div style="margin-top:81px;">
	<table class="table w-75 table-bordered mx-auto">
		<thead>
			<tr class="">
				<th>Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>City</th>
				<th>Postal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody class="">
			{{-- @dd($userorder) --}}
			@foreach($userdetail as $order)
			<tr>
				<td>{{ $order->name }}</td>
				<td>{{ $order->email }}</td>
				<td>{{ $order->adress }}</td>
				<td>{{ $order->city }}</td>
				<td>{{ $order->postal }}</td>
				<td>
					<a href="{{ url('/userupdate/'.$order->id) }}"><i class="fas fa-edit" style="color:#fddb3a;"></i></a>
				</td>
			</tr>
			@endforeach()
		</tbody>
	</table>
</div>
@endsection()