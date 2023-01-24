@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class=" container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span>Show Orders</h4>
		<div class="card">
			<h5 class="card-header">Orders</h5>
			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Address</th>
								<th>Emial</th>
								<th>City</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							{{-- @dd($showcate) --}}
							@if(@$orderget)

							@foreach($orderget as $view)
							<tr>
								<td>{{ $view->name }}</td>
								<td>{{ $view->email }}</td>
								<td>{{ $view->adress }}</td>
								<td>{{ $view->email }}</td>
								<td>{{ $view->city }}</td>
								<td>
									{{-- <a class="" href="{{ url('deletecategories/'.$view->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
									{{-- <a class="" href="{{ url('updatecategories/'.$view->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a> --}}
									<a href="{{ url('order-detail/'.$view->id) }}" class="btn btn-primary">Order Detail</a>
								</td>
							</tr>
							@endforeach()
							@endif()
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()