@extends('admin.body')
@section('content')

<div class="layout-page">
	<div class=" container-xxl">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span>Update Product</h4>
		<form method="POST" action="{{ url('/updateproduct/'.$editpr->id) }}" class="" enctype="multipart/form-data">
			@csrf
			<div class="row card mb-4">
				<h5 class="card-header">Update Product</h5>
				<div class="row card-body">
					<div class="col-md-6 mb-3">
						<label for="" class="form-label">Name</label>
						<input type="text" class="form-control" name="name" value="{{ $editpr->name }}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="" class="form-label">Description</label>
						<textarea name="description" class="form-control" rows="1">{{ $editpr->description }}</textarea>
					</div>
					<div class="col-md-6 mb-3">
						<label for="" class="form-label">Price</label>
						<input type="number" class="form-control" name="price" value="{{ $editpr->price }}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="" class="form-label">Stock</label>
						<input type="number" class="form-control" name="stock" value="{{ $editpr->stock }}">
					</div>
					<div class="col-md-6 mb-3">
						<label for="" class="form-label">Image</label>
						<input type="file" class="form-control" name="image">
						
					</div>
					<div class="col-md-6 mb-3">
						<label class="form-label">Select Categorie</label>
						<select class="form-control" name="cate_id">
							@foreach($cateid as $newid)
							<option value="{{ $newid->id }}">{{ $newid->name }}</option>
							@endforeach()
						</select>
					</div>
					<div class="col-md-12">
						<button class="btn btn-primary" type="submit">Submitt</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection