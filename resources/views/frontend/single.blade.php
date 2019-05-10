@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row medium-padding120">
        <div class="product-details">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="product-details-thumb">
                    <div class="swiper-container" data-effect="fade">
                        <!-- Additional required wrapper -->
                        {{-- <div class="swiper-wrapper"> --}}
                            <!-- Slides -->
                            <div class="product-details-img-wrap swiper-slide">
                                <img src="{{ asset($product->image) }}" alt="product" data-swiper-parallax="-10">
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 col-xs-offset-0">
                <div class="product-details-info">
                    <div class="product-details-info-price">${{$product->price}}</div>
                    <h3 class="product-details-info-title">{{$product->name}}</h3>
                    <p class="product-details-info-text">{{$product->description}}
                    </p>

                    <form action="{{ route('cart.add') }}" method="post">

                        <input type="number" id="max" value="{{$product->count}}" hidden>

                        <div class="quantity">
                        <a href="#" class="quantity-minus quantity-minus-s">-</a>
                        <input title="Qty" class="email input-text qty text" type="text" value="1" name="quantity" max="{{$product->count}}">
                        <a href="#" class="quantity-plus quantity-plus-s">+</a>
                        </div>

                    <input type="hidden" name="id" value="{{$product->id}}">
                    
                    @if($product->count>0)

                    <button class="btn btn-medium btn--primary">
                        <span class="text">Add to Cart</span>
                        <i class="seoicon-commerce"></i>
                        <span class="semicircle"></span>
                    </button>

                    @else
                    <button class="btn btn-medium btn--gray" disabled>
                        <span class="text">Out of stock</span>
                        <i class="seoicon-commerce"></i>
                        <span class="semicircle"></span>
                    </button>

                    @endif

                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection