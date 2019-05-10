@extends('layouts.app')

@section('content')
	<div class="col-xs-12">
		@include('inc.success')
		<div class="card">
			<div class="card-header">
				All Orders
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>Id</th>
						<th>Paid</th>
						<th>Details</th>
						<th>Address</th>
						<th>City</th>
						<th>Country</th>
						<th>Phone</th>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>@if($order->paid==1)
								Yes
								@else
								No
								@endif
							</td>
							<td><a href="{{ route('order.details',['id'=>$order->id]) }}">See more...</a></td>
							<td>{{$order->address}}</td>
							<td>{{$order->city}}</td>
							<td>{{$order->country}}</td>
							<td>{{$order->phone}}</td>



						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection