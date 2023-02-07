@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class=" container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span>Show Orders</h4>
		<div class="row mb-4">
			<div class="col-md-6">
				<div class="card">
					<h5 class="card-header">Order Detail</h5>
					<div class="card-body">
						<div class="table-responsive text-nowrap">
							<table class="table table-bordered text-center">
								<tbody>
									{{-- @dd($orderdetail) --}}
									<tr>
										<td>Invoice</td>
										<td>{{ $orderdetail->invoice }}</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>{{ $orderdetail->name }}</td>
									</tr>
									<tr>
										<td>Postal</td>
										<td>{{ $orderdetail->postal }}</td>
									</tr>
									<tr>
										<td>Total Order Price</td>
										<td>{{ $orderdetail->total }}</td>
									</tr>
									<tr>
										<td>Payment Type</td>
										<td>{{ $orderdetail->payment }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<h5 class="card-header">User Detail</h5>
					<div class="card-body">
						<div class="table-responsive text-nowrap">
							<table class="table table-bordered text-center">
								<tbody>
									{{-- @dd($orderdetail) --}}
									<tr>
										<td>Name</td>
										<td>{{ $orderdetail->name }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>{{ $orderdetail->email }}</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>{{ $orderdetail->adress }}</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>{{ $orderdetail->phone }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="table-responsive text-nowrap">
						<table class="table table-bordered text-center">
							<thaed>
								<tr>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Quantity</th>
									<th>Total Price</th>
								</tr>
							</thaed>
							<tbody>
								{{-- @dd($orderdetail) --}}
								<tr>
									<td><img src="{{ url('storage/app/'.$orderdetail->prduct[0]->image) }}" style="max-width: 100px;"></td>
									<td>{{ $orderdetail->prduct[0]->name }}</td>
									<td>{{ $orderdetail->quantity }}</td>
									<td>{{ $orderdetail->prduct[0]->price }}</td>
									<td>{{ $orderdetail->total }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()