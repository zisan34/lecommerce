<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Lecommerce</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/styles.css') }}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.css') }}">

    {{-- toastr --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/css/toastr.min.css') }}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">Total: ${{Cart::total()}}</h4>
                            <a href="{{ route('cart.view') }}">
                                <div class="btn btn-small btn--dark">
                                <span class="text">View Cart</span>
                            </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <a href="{{ route('home') }}">
                        <h4 class="h1 heading-title">Lecommerce</h4>
                    </a>
                    <p class="heading-text">Buy products, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    <div class="container">
        @yield('content')
    </div>
</div>

<!-- Footer -->

<footer class="footer">
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{ asset('frontend/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('frontend/js/crum-mega-menu.js') }}"></script>
<script src="{{ asset('frontend/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/theme-plugins.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/js/form-actions.js') }}"></script>

<script src="{{ asset('frontend/js/velocity.min.js') }}"></script>
<script src="{{ asset('frontend/js/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/js/animation.velocity.min.js') }}"></script>

<!-- ...end JS Script -->

{{-- toastr --}}

<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('toastr/js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('success'))
        toastr["success"]("{{Session::get('success')}}");
    @endif


    @if(Session::has('info'))
        toastr.info('{{Session::get('info')}}');
    @endif



    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            toastr.error('{{$error}}');
        @endforeach
    @endif
</script>



</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>