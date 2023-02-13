@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class=" container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span>Show Orders</h4>
		<div class="row mb-4 justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<h5 class="card-header">Order Detail</h5>
					<div class="card-body">
						<div class="table-responsive text-nowrap">
							<table class="table table-bordered text-center">
								<thead>
									<th>Product</th>
									<th>Quantity</th>
									<th>Price</th>
								</thead>
								<tbody>
									@foreach($orderdetail as $new)
									<tr>
										<td>{{ $new->prname }}</td>
										<td>{{ $new->quantity }}</td>
										<td>{{ $new->price }}</td>
									</tr>
									@endforeach()
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection()