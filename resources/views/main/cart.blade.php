@extends('main.body')
@section('content')
<table class="table table-bordered col-md-6" style="margin: 162px auto 81px !important;">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		@foreach($showcart as $item)
		<tr>
			<td>{{ $item->name }}</td>
			<td class="new-input">{{ $item->description }}</td>
			<td>{{ $item->price }}</td>
		</tr>
		@endforeach()
	</tbody>
</table>
@endsection()