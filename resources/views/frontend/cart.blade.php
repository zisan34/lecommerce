@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row bg-border-color medium-padding120">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="cart">

                        <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary"> {{Cart::content()->count()}}</span></h1>

                    </div>

                    <form action="#" method="post" class="cart-main">

                        <table class="shop_table cart">
                            <thead class="cart-product-wrap-title-main">
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(Cart::content() as $product)

                            {{-- @php
                                var_dump($product->rowId);
                            @endphp
                            <br><br> --}}
                            
                            <tr class="cart_item">

                                <td class="product-remove">
                                    <a href="{{ route('cart.remove',['id'=>$product->rowId]) }}" class="product-del remove" title="Remove this item">
                                        <i class="seoicon-delete-bold"></i>
                                    </a>
                                </td>

                                <td class="product-thumbnail">

                                    <div class="cart-product__item">
                                        <a href="{{ route('show',['id'=>$product->id]) }}">
                                            <img src="{{ asset($product->model->image) }}" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" style="max-height:50px; width: 70px;">
                                        </a>
                                        <div class="cart-product-content">
                                            <p class="cart-author">
                                                <a href="{{ route('show',['id'=>$product->id]) }}">
                                                    {{$product->name}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-price">
                                    <h5 class="price amount">${{$product->price}}</h5>
                                </td>

                                <td class="product-quantity">

                                    <div class="quantity">
                                        <a href="{{ route('cart.decr',['id'=>$product->rowId,'qty'=>$product->qty]) }}" class="quantity-minus">-</a>
                                        <input name="qty" title="Qty" class="email input-text qty text" type="text" placeholder="1" readonly value="{{$product->qty}}" max="{{$product->model->count}}">
                                        <a href="{{ route('cart.incr',['id'=>$product->rowId,'qty'=>$product->qty]) }}" class="quantity-plus">+</a>
                                    </div>

                                </td>

                                <td class="product-subtotal">
                                    <h5 class="total amount">${{$product->subtotal()}}</h5>
                                </td>

                            </tr>


                            @endforeach

                            

                            <tr>
                                <td colspan="5" class="actions">

                                    <div class="coupon">
                                        <input name="coupon_code" class="email input-standard-grey" value="" placeholder="Coupon code" type="text">
                                        <div class="btn btn-medium btn--breez btn-hover-shadow">
                                            <span class="text">Apply Coupon</span>
                                            <span class="semicircle--right"></span>
                                        </div>
                                    </div>

                                    <a href="{{ route('cart.destroy') }}" onclick="return confirm('You really want to clear your Cart?')">
                                    <div class="btn btn-medium btn--rose btn-hover-shadow">
                                        <span class="text">Clear Cart</span>
                                        <span class="semicircle"></span>
                                    </div>
                                    </a>

                                </td>
                            </tr>

                            </tbody>
                        </table>


                    </form>

                    <div class="cart-total">
                        <h3 class="cart-total-title">Cart Totals</h3>
                        <h5 class="cart-total-total">Total: <span class="price">${{Cart::total()}}</span></h5>
                        <form action="{{ route('cart.checkout') }}" method="post">                            
                            @csrf
                            <h5>Shipping Details</h5>
                            <div class="form-group">
                                <label>Address:</label>
                                <div class="form-control">
                                    <input type="text" name="address" value="{{old('address')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control">
                                    <label>Phone Number:</label>                                    
                                    <input type="number" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                    <input type="text" name="city" value="{{old('city')}}">
                                
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" value="{{old('country')}}">
                            </div>

                            <button class="btn btn-medium btn--light-green btn-hover-shadow">
                            <span class="text">Checkout</span>
                            <span class="semicircle"></span>
                            </button>
                        </form>
                        
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection