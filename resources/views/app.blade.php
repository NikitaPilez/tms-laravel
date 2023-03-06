<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Karl - Fashion Ecommerce Template | Cart</title>
    <link rel="icon" href="{{ asset("/img/core-img/favicon.ico") }}">
    <link rel="stylesheet" href="{{ asset("/css/core-style.css") }}">
    <link href="{{ asset("css/responsive.css") }}" rel="stylesheet">
</head>

<body>
    @include('side-menu')
    <div id="wrapper">
        <header class="header_area bg-img background-overlay-white" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="top_header_area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-end">
                    <div class="col-12 col-lg-7">
                        <div class="top_single_area d-flex align-items-center">
                            <div class="top_logo">
                                <a href="{{ route('main') }}"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
                            </div>
                            <div class="header-cart-menu d-flex align-items-center ml-auto">
                                <div class="cart">
                                    <a href="{{ route('cart') }}" id="header-cart-btn" target="_blank"><span class="cart_quantity">2</span> <i class="ti-bag"></i> Your Bag $20</a>
                                    <ul class="cart-list">
                                        <li>
                                            <a href="#" class="image"><img src="img/product-img/product-10.jpg" class="cart-thumb" alt=""></a>
                                            <div class="cart-item-desc">
                                                <h6><a href="#">Women's Fashion</a></h6>
                                                <p>1x - <span class="price">$10</span></p>
                                            </div>
                                            <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                        </li>
                                        <li>
                                            <a href="#" class="image"><img src="img/product-img/product-11.jpg" class="cart-thumb" alt=""></a>
                                            <div class="cart-item-desc">
                                                <h6><a href="#">Women's Fashion</a></h6>
                                                <p>1x - <span class="price">$10</span></p>
                                            </div>
                                            <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                        </li>
                                        <li class="total">
                                            <span class="pull-right">Total: $20.00</span>
                                            <a href="cart.html" class="btn btn-sm btn-cart">Cart</a>
                                            <a href="checkout-1.html" class="btn btn-sm btn-checkout">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-right-side-menu ml-15">
                                    <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_header_area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 d-md-flex justify-content-between">
                        <div class="header-social-area">
                            <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                        <div class="main-menu-area">
                            <nav class="navbar navbar-expand-lg align-items-start">

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                    <ul class="navbar-nav animated" id="nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="{{ route('categories.index') }}" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                            <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                @foreach($categories as $category)
                                                    <a class="dropdown-item" href="{{ route('categories.category', ['category' => $category->id])}}">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('sales') }}"><span class="karl-level">hot</span>Sales</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Contacts</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="help-line">
                            <a href="tel:+375297456323"><i class="ti-headphone-alt"></i> +375297456323</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        @yield('content')
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single_footer_area">
                        <div class="footer-logo">
                            <img src="{{ asset('/img/core-img/logo.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single_footer_area">
                        <ul class="footer_widget_menu">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single_footer_area">
                        <ul class="footer_widget_menu">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Our Policies</a></li>
                            <li><a href="#">Afiliates</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_footer_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe to our newsletter</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="footer_bottom_area">
                <div class="row">
                    <div class="col-12">
                        <div class="footer_social_area text-center">
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
<script src="{{ asset('/js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/active.js') }}"></script>

</body>

</html>
