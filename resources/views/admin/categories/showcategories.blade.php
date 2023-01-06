@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class=" container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories /</span>Show Categories</h4>
		<div class="card">
			<h5 class="card-header">Categories Table</h5>
			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							{{-- @dd($showcate) --}}
							@if(@$showcate)

							@foreach($showcate as $view)
							<tr>
								<td>{{ $view->name }}</td>
								<td>{{ $view->description }}</td>
								<td>
									<a class="" href="{{ url('deletecategories/'.$view->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<a class="" href="{{ url('updatecategories/'.$view->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
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