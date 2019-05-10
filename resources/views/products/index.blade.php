@extends('layouts.app')

@section('content')
	<div class="col-xs-12">
		@include('inc.success')
		<div class="card">
			<div class="card-header">
				All Products
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th width="50%">Name</th>
						<th>Price</th>
						<th>In Stock</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td><img src="{{ asset($product->image) }}" width="70px">&nbsp;{{$product->name}}</td>
							<td>{{$product->price}}$</td>
							<td
								@if($product->count<5)
								style="color: red;"
								@else
								style="color: green;"
								@endif
								>

								

								{{$product->count}}</td>
							<td><a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">Edit</a></td>

							<td>
								<form action="{{route('products.destroy',['id'=>$product->id])}}" method="post">
									@csrf
									{{method_field('DELETE')}}
									<input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
									
								</form>
							</td>

						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection