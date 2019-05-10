<!DOCTYPE html>
<html>
<head>
	<title>Purchase Successfull</title>
</head>
<body>

	<p>Thank you for purchasing from us. Payment Successfull.</p>
	<ul>
	@foreach(Cart::content() as $product)
		<li>{{$product->name}}&nbsp;{{$product->qty}}pieces: ${{$product->price}}</li>
	@endforeach
	</ul>
	Total: ${{Cart::total()}}

</body>
</html>