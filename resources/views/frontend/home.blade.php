@extends('layouts.front')
@section('content')
<div class="row pt120">
    <div class="books-grid">
    
    @php
        $total=count($products);
        $count=0;
    @endphp

    <div class="row mb30">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="max-height: 550px; margin-bottom: 50px;">            
        @php
            $count++;
        @endphp

            <div class="books-item">
                <a href="{{ route('show',['id'=>$product->id]) }}"><img src="{{ asset( $product->image) }}" alt="product" style="min-height: 240px;">
                <div class="books-item-thumb">
                    
                    
                    <div class="new">New</div>
                    <div class="sale">Sale</div>
                    <div class="overlay overlay-books"></div>
                </div>

                </a>

                <div class="books-item-info">
                    <a href="{{ route('show',['id'=>$product->id]) }}"><h5 class="books-title">{{$product->name}}</h5></a>

                    <div class="books-price">${{$product->price}}</div>
                </div>

                

                <form action="{{ route('cart.add') }}" method="post">

                    <input type="text" value="1" name="quantity" hidden>

                    <input type="hidden" name="id" value="{{$product->id}}">

                    @if($product->count>0)

                    <button class="btn btn-small btn--dark add">
                    <span class="text">Add to Cart</span>
                    <i class="seoicon-commerce"></i>
                    </button>

                    @else

                    <button class="btn btn-small btn--gray add" disabled>
                    <span class="text">Out of Stock</span>
                    <i class="seoicon-commerce"></i>
                    </button>

                    @endif

                    @csrf
                </form>

            </div>
        </div>


<script type="text/javascript">
// var row_content= 3;
// var count="<?php echo $count?>";
// var total="<?php echo $total?>";


// if(window.innerWidth<=570)
// {
//     row_content=1;
// }
// else if(window.innerWidth<=768)
// {
//     row_content=2;
// }
// else 
// {
//     row_content=3;
// }
// if(count==total||count%row_content==0)
// {
//     document.getElementById('l_break').setAttribute("hidden","false");
// }
</script>

    {{-- <span id="control_row">
    </span> --}}
{{--         @if($count%3==0||$count==$total)
        </div>
    <div class="row mb30">
                 
        @endif --}}
        @endforeach
    </div>



{{-- pagination --}}
<div class="row pb120">

    <div class="col-lg-12">
        {{$products->links()}}
    </div>

</div>


</div>
</div>

@endsection