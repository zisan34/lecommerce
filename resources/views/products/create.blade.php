@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
<div class="col-md-8">
	<div class="card">
		<div class="card-header">
			Add New Product
		</div>
		<div class="card-body">
			@include('inc.errors')
			<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" value="{{old('name')}}" >
				</div>
				<div class="form-group">
					<label for="Price">Price:</label>
					<input type="number" name="price" class="form-control" value="{{old('price')}}" >
				</div>

				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" name="image" class="form-control-file">
				</div>

				<div class="form-group">
					<label for="count">Quantity in Stock</label>
					<input type="number" name="count" class="form-control" value="{{old('count')}}" >
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description">{{old('description')}}</textarea>
				</div>
				<input type="submit" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>
</div>

@endsection