@extends('main.body')
@section('content')
<form class="col-md-8 border py-3 rounded mx-auto" action="{{ url('/updateuser/'.$userupdate->id) }}" method="POST" style="margin-top: 100px; margin-bottom:20px;">
	@csrf
	<div class="form-group">
		<label class="">Name</label>
		<input type="text" name="name" class="form-control" value="{{ $userupdate->name }}">
	</div>
	<div class="form-group">
		<label class="">Email</label>
		<input type="email" name="email" class="form-control" value="{{ $userupdate->email }}">
	</div>
	<div class="form-group">
		<label class="">Address</label>
		<input type="text" name="adress" class="form-control" value="{{ $userupdate->adress }}">
	</div>
	<div class="form-group">
		<label class="">City</label>
		<input type="text" name="city" class="form-control" value="{{ $userupdate->city }}">
	</div>
	<div class="form-group">
		<label class="">Postal</label>
		<input type="number" name="postal" class="form-control" value="{{ $userupdate->postal }}">
	</div>
	<div class="form-check">
		<button class="new-button" type="submit">Update</button>
	</div>
</form>

@endsection()