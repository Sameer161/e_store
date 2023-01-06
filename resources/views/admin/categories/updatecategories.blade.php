@extends('admin.body')
@section('content')
<div class="layout-page">
	<div class="container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories /</span>Add Categories</h4>
		<form method="POST" action="{{ url('/updatecategories/'.$updacate->id) }}" class="">
			@csrf
			<div class="row card mb-4">
				<h5 class="card-header">Update Categories</h5>
				<div class="row card-body">
					<div class="col-md-6">
						<label for="" class="form-label">Name</label>
						<input type="text" class="form-control" name="name" value="{{ $updacate->name }}">
					</div>
					<div class="col-md-6">
						<label for="" class="form-label">Description</label>
						<textarea name="description" class="form-control" rows="1">{{ $updacate->description }}</textarea>
					</div>
					<div class="col-md-12">
						<button class="btn btn-primary mt-3" type="submit">Submitt</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection()