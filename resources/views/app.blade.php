<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ 'images/favicon.png' }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POLO | The Multi-Purpose HTML5 Template</title>
    <link href="{{ asset('/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="body-inner">
    <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
        <div class="header-inner">
            <div class="container">
                <div id="logo">
                    <a href="index.html">
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
                                <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                                <ul class="p-dropdown-content">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">English</a></li>
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
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('contacts') }}">Contacts</a></li>
                                <li class="dropdown"><a href="#">Layout</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu"><a href="#">Topbar</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="header-topbar.html">Light</a></li>
                                                <li><a href="header-topbar-dark.html">Dark</a></li>
                                                <li><a href="header-topbar-transparent.html">Transparent</a></li>
                                                <li><a href="header-topbar-colored.html">Colored</a></li>
                                                <li><a href="header-topbar-fullwidth.html">Fullwidth</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Header</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="header.html">Light</a></li>
                                                <li><a href="header-dark.html">Dark</a></li>
                                                <li><a href="header-transparent.html">Transparent</a></li>
                                                <li><a href="header-fullwidth.html">Fullwidth</a></li>
                                                <li class="dropdown-submenu"><a href="#">Modern</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="header-modern.html">Light</a></li>
                                                        <li><a href="header-modern-dark.html">Dark</a></li>
                                                        <li><a href="header-modern-transparent.html">Transparent</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="header-mini.html">Mini</a></li>
                                                <li><a href="header-alternative.html">Alternative</a></li>
                                                <li><a href="header-always-fixed.html">Always Fixed</a></li>
                                                <li><a href="header-disable-fixed.html">Disable Fixed</a></li>
                                                <li><a href="header-responsive-fixed.html">Responsive Fixed</a></li>
                                                <li class="dropdown-submenu"><a href="#">Logo</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="header-logo.html">Left</a></li>
                                                        <li><a href="header-logo-right.html">Right</a></li>
                                                        <li><a href="header-logo-center.html">Center</a></li>
                                                        <li><a href="header-logo-fixed-header.html">Header Fixed Logo</a></li>
                                                        <li><a href="header-logo-responsive.html">Header Responsive Logo</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu"><a href="#">Menu Positions</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="header-menu-left.html">Left</a></li>
                                                        <li><a href="header-menu-right.html">Right</a></li>
                                                        <li><a href="header-menu-center.html">Center</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Main Menu<span class="badge badge-danger">NEW</span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="menu.html">Default</a></li>
                                                <li><a href="menu-lowercase.html">Lowercase</a></li>
                                                <li><a href="menu-split.html">Split Menu</a></li>
                                                <li><a href="menu-sub-title.html">Sub Title Menu</a></li>
                                                <li><a href="menu-overlay.html">Overlay Menu</a></li>
                                                <li><a href="menu-creative.html">Creative Menu</a></li>
                                                <li><a href="menu-lines.html">Lines Menu</a></li>
                                                <li class="dropdown-submenu"><a href="#">Outline</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="menu-outline.html">Default</a></li>
                                                        <li><a href="menu-outline-dark.html">Dark</a></li>
                                                        <li><a href="menu-outline-light.html">Light</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu"><a href="#">Rounded</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="menu-rounded.html">Default</a></li>
                                                        <li><a href="menu-rounded-dark.html">Dark</a></li>
                                                        <li><a href="menu-rounded-light.html">Light</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu"><a href="#">Positions</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="menu-left.html">Left Aligned</a></li>
                                                        <li><a href="menu-center.html">Center Aligned</a></li>
                                                        <li><a href="menu-right.html">Right Aligned</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="menu-dots.html">Dots Menu</a></li>
                                                <li><a href="menu-one-page.html">One Page Menu</a></li>
                                                <li><a href="menu-hover-background.html">Hover Background</a></li>
                                                <li><a href="menu-button.html">Button Version</a></li>
                                                <li><a href="menu-social-icons.html">Social Icons Version</a></li>
                                                <li><a href="menu-onclick.html">OnClick Open</a></li>
                                                <li><a href="menu-rounded-dropdown.html">Rounded Dropdown</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Page Title</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="page-title.html">Default</a></li>
                                                <li><a href="page-title-image.html">Image background</a></li>
                                                <li><a href="page-title-video.html">Video background</a></li>
                                                <li><a href="page-title-pattern.html">Pattern background</a></li>
                                                <li><a href="page-title-background-color.html">Colored background</a></li>
                                                <li><a href="page-title-parallax.html">Parallax</a></li>
                                                <li><a href="page-title-animated.html">Animated</a></li>
                                                <li><a href="page-title-right.html">Right Aligned</a></li>
                                                <li><a href="page-title-left.html">Left Aligned</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Page Menu<span class="badge badge-danger">NEW</span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="page-menu.html">Default</a></li>
                                                <li><a href="page-menu-rounded.html">Rounded</a></li>
                                                <li><a href="page-menu-outline.html">Outline</a></li>
                                                <li><a href="page-menu-lines.html">Lines</a></li>
                                                <li><a href="page-menu-solid.html">Solid</a></li>
                                                <li><a href="page-menu-light.html">Light</a></li>
                                                <li><a href="page-menu-dark.html">Dark</a></li>
                                                <li><a href="page-menu-creative.html">Creative</a></li>
                                                <li><a href="page-menu.html">Dropdown</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Sidebars</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="sidebar-sticky.html">Sticky version</a></li>
                                                <li><a href="sidebar.html">Left aligned</a></li>
                                                <li><a href="sidebar-right.html">Right aligned</a></li>
                                                <li><a href="sidebar-both.html">Both Sidebars</a></li>
                                                <li><a href="sidebar-modern.html">Modern</a></li>
                                                <li><a href="sidebar-modern-right.html">Modern Right</a></li>
                                                <li><a href="sidebar-modern-both.html">Modern Both Sidebars</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Footers</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="footer.html#footer">Default</a></li>
                                                <li><a href="footer-dark.html#footer">Dark</a></li>
                                                <li><a href="footer-1.html#footer">Footer 1</a></li>
                                                <li><a href="footer-2.html#footer">Footer 2</a></li>
                                                <li><a href="footer-3.html#footer">Footer 3</a></li>
                                                <li><a href="footer-4.html#footer">Footer 4</a></li>
                                                <li><a href="footer-5.html#footer">Footer 5</a></li>
                                                <li><a href="footer-6.html#footer">Footer 6</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a href="#">Options</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="layout-boxed.html">Boxed</a></li>
                                                <li><a href="layout-modern.html">Modern</a></li>
                                                <li><a href="layout-frame.html">Frame</a></li>
                                                <li><a href="layout-wide.html">Wide (default)</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
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
        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; 2019 POLO - Responsive Multi-Purpose HTML5 Template. All Rights Reserved.<a href="//www.inspiro-media.com" target="_blank" rel="noopener"> INSPIRO</a> </div>
            </div>
        </div>
    </footer>
</div>
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/functions.js') }}"></script>
</body>
</html>
