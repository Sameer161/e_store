@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class="container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span>Show Products</h4>
		<div class="card">
			<h5 class="card-header">Products Table</h5>
			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Categorie</th>
								<th>Image</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($showpr as $view)
							<tr>
								<td>{{ $view->name }}</td>
								<td class="new-input">{{ $view->description }}</td>
								<td>${{ $view->price }}</td>
								<td>{{ $view->stock }}</td>
								<td>{{ $view->cateid }}</td>
								<td><img src="{{ ('storage/app/'.$view->image) }}" style="height: 100px;"></td>
								<td>
									<a href="{{ url('delproduct/'.$view->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<a href="{{ url('updateproduct/'.$view->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach()
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()