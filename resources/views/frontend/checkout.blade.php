@extends('layouts.front')

@section('content')

<div class="container">
	<div class="row medium-padding120 bg-border-color">
		<div class="container" >

			<div class="row">

				<div class="col-lg-12">
			<div class="order">
				<h2 class="h1 order-title text-center">Your Order</h2>
				<form action="{{ route('cart.pay') }}" method="post" class="cart-main">
					<table class="shop_table cart">
						<thead class="cart-product-wrap-title-main">
						<tr>
							<th class="product-thumbnail">Product</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Total</th>
						</tr>
						</thead>
						<tbody>

						@foreach(Cart::content() as $product)
						<tr class="cart_item">

							<td class="product-thumbnail">

								<div class="cart-product__item">
									<div class="cart-product-content">
										<h5 class="cart-product-title">{{$product->name}}</h5>
									</div>
								</div>
							</td>
							<br>

							<td class="product-quantity">

								<div class="quantity">
									x {{$product->qty}}
								</div>

							</td>

							<td class="product-subtotal">
								<h5 class="total amount">${{$product->subtotal()}}</h5>
							</td>

						</tr>
						@endforeach

						<tr class="cart_item subtotal">

							<td class="product-thumbnail">


								<div class="cart-product-content">
									<h5 class="cart-product-title">	Subtotal:</h5>
								</div>


							</td>

							<td class="product-quantity">

							</td>

							<td class="product-subtotal">
								<h5 class="total amount">${{Cart::subtotal()}}</h5>
							</td>
						</tr>

						<tr class="cart_item total">

							<td class="product-thumbnail">


								<div class="cart-product-content">
									<h5 class="cart-product-title">Total:</h5>
								</div>


							</td>

							<td class="product-quantity">

							</td>

							<td class="product-subtotal">
								<h5 class="total amount">${{Cart::total()}}</h5>
							</td>
						</tr>

						</tbody>
					</table>

					<div class="cheque">

						<div class="logos">
							<a href="#" class="logos-item">
								<img src="{{ asset('frontend/img/visa.png') }}" alt="Visa">
							</a>
							<a href="#" class="logos-item">
								<img src="{{ asset('frontend/img/mastercard.png') }}" alt="MasterCard">
							</a>
							<a href="#" class="logos-item">
								<img src="{{ asset('frontend/img/discover.png') }}" alt="DISCOVER">
							</a>
							<a href="#" class="logos-item">
								<img src="{{ asset('frontend/img/amex.png') }}" alt="Amex">
							</a>
							
							<span style="float: right;">
								<form action="{{ route('cart.pay') }}" method="POST">

									@csrf
									<script
									src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									data-key="pk_test_x2QLSyIRj01MqoqeLFcxbv3800E4dmmE1T"
									data-amount={{Cart::total()*100}}
									data-name="Lecommerce"
									data-description="Complete the process and we ship to you"
									data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
									data-locale="auto"
									data-currency="usd">
									</script>
								</form>
							</span>
						</div>
					</div>

				</form>
			</div>
		</div>

			</div>
		</div>
	</div>
</div>

@endsection