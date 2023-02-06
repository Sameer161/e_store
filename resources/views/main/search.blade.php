@extends('main.body')
@section('content')


<section class="section" id="men">
	<div class="container" style="overflow: hidden;">
		<div class="row" style="margin-top: 150px;">
			@foreach($products as $search)
			<div class="owl-item active" style="width: 350px; margin-right: 30px;"><div class="item">
				<div class="thumb">
					<div class="hover-content">
						<ul>
							<li><a href="{{ url('singleproduct/'.$search->id) }}">Select</a></li>

						</ul>
					</div>
					<img src="{{ ('storage/app/'.$search->image) }}">
				</div>
				<div class="down-content">
					<h4>{{ $search->name }}</h4>
					<span>{{ $search->price }}</span>
					<ul class="stars">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
					</ul>
				</div>
			</div></div>
			@endforeach()
		</div>
	</div>
</section>
@endsection