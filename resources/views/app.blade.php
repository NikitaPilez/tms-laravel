<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ 'img/favicon.png' }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('main_title', ['name' => 'Polo']) }}</title>
    <link href="{{ asset('/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="body-inner">
    <header id="header" @if ($isDarkHeader) data-transparent='true' @endif data-fullwidth="true" @class([
        'submenu-light',
        'dark' => $isDarkHeader
])>
        <div class="header-inner">
            <div class="container">
                <div id="logo">
                    <a href="{{ route('main') }}">
                        <span class="logo-default">POLO</span>
                        <span class="logo-dark">POLO</span>
                    </a>
                </div>
                <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                    <form class="search-form" action="search-results-page.html" method="get">
                        <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                        <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                    </form>
                </div>
                <div class="header-extras">
                    <ul>
                        <li>
                            <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                        </li>
                        <li>
                            <div class="p-dropdown">
                                <a href="#"><i class="icon-globe"></i>
                                    <span>
                                        @if(session()->get('locale') == 'ru')
                                            RU
                                        @else
                                            EN
                                        @endif
                                    </span>
                                </a>
                                <ul class="p-dropdown-content">
                                    <li><a href="{{ route('changeLang', ['lang' => 'en']) }}">English</a></li>
                                    <li><a href="{{ route('changeLang', ['lang' => 'ru']) }}">Русский</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="mainMenu-trigger">
                    <a class="lines-button x"><span class="lines"></span></a>
                </div>
                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('contacts') }}">Contacts</a></li>
                                <li><a href="{{ route('products.index') }}">Catalog</a></li>
                                <li><a href="{{ route('cart.get') }}">Cart</a></li>
                                @auth
                                    <li><a href="{{ route('wishlist.get') }}">Wishlist</a></li>
                                    <li><a href="{{ route('account.show') }}">My account</a></li>
                                    <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                                    @if(Auth::user()->is_admin)
                                        <li class="dropdown"><a href="#">Admin</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                @endauth
                                @guest
                                    <li><a href="{{ route('auth.login') }}">Login</a></li>
                                    <li><a href="{{ route('auth.register') }}">Register</a></li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer id="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="widget">
                            <div class="widget-title">Polo HTML5 Template</div>
                            <p class="mb-5">Built with love in Fort Worth, Texas, USA<br> All rights reserved. Copyright © 2019. INSPIRO.</p>
                            <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-inverted" target="_blank">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="widget">
                                    <div class="widget-title">Discover</div>
                                    <ul class="list">
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Layouts</a></li>
                                        <li><a href="#">Corporate</a></li>
                                        <li><a href="#">Updates</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Customers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget">
                                    <div class="widget-title">Features</div>
                                    <ul class="list">
                                        <li><a href="#">Layouts</a></li>
                                        <li><a href="#">Headers</a></li>
                                        <li><a href="#">Widgets</a></li>
                                        <li><a href="#">Footers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget">
                                    <div class="widget-title">Pages</div>
                                    <ul class="list">
                                        <li><a href="#">Portfolio</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Shop</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget">
                                    <div class="widget-title">Support</div>
                                    <ul class="list">
                                        <li><a href="#">Help Desk</a></li>
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

@if (session('success'))
    <div id="notification-modal" data-notify="container" data-animate="zoomIn" class="bootstrap-notify col-xs-11 col-sm-3 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; top: 30px; right: 30px;">
        <span data-notify="title">{{ session('success') }}</span>
    </div>
@elseif(session('error'))
    <div id="notification-modal" data-notify="container" data-animate="zoomIn" class="bootstrap-notify col-xs-11 col-sm-3 alert alert-danger" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; top: 30px; right: 30px;">
        <span data-notify="icon"></span> <span data-notify="title">{{ session('error') }}</span>
    </div>
@endif
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/functions.js') }}"></script>
<script>
    setTimeout( function() {
        $('#notification-modal').hide('slow');
    }, 3000);
</script>
</body>
</html>
