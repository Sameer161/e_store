@extends('main.body')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<form>
				<div class="row justify-content-between subscribe">
					<input class="col-md-5" type="name" name="name" placeholder="Enter Name">
					<input class="col-md-5" type="email" name="email" placeholder="Enter Email">
				</div>
				<div class="row justify-content-between subscribe">
					<input class="col-md-5" type="name" name="name" placeholder="Enter Name">
					<input class="col-md-5" type="email" name="email" placeholder="Enter Email">
				</div>
				<div class="row justify-content-between subscribe">
					<input class="col-md-5" type="name" name="name" placeholder="Enter Name">
					<input class="col-md-5" type="email" name="email" placeholder="Enter Email">
				</div>
			</form>
		</div>
		<div class="col-md-5"></div>
	</div>
</div>
@endsection()