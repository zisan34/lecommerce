@extends('layouts.app')

@section('content')
	<div class="col-xs-12">
		@include('inc.success')
		<div class="card">
			<div class="card-header">
				All Products of the Order {{$order->id}}
				<span class="float-right"><a class="btn btn-sm btn-info" href="{{ route('order.index') }}">Back</a></span>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>Product</th>
						<th>Quantity</th>
						<th>In Stock</th>
					</thead>
					<tbody>
						@foreach($order->orderDetails as $orderDetail)
						<tr>
							<td>{{$orderDetail->product->name}}</td>
							<td>{{$orderDetail->quantity}}</td>
							<td>{{$orderDetail->product->count}}</td>

						</tr>

						@endforeach
					</tbody>
				</table>
				@if($order->paid==1)
				<a class="btn btn-success">Confirm Order</a>
				@endif
			</div>
		</div>
	</div>
@endsection