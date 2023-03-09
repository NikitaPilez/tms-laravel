@extends('app')
@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Shop</h1>
                <span>Sticky Sidebar</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('main') }}">Home</a>
                    </li>
                    <li class="active"><a href="{{ route('products.index') }}">Shop</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="row">
                <div class="content col-lg-9">
                    <div class="row m-b-20">
                        <div class="col-lg-6 p-t-10 m-b-20">
                            <h3 class="m-b-20">A Monochromatic Spring ’15</h3>
                            <p>Lorem ipsum dolor sit amet. Accusamus, sit, exercitationem, consequuntur, assumenda iusto eos commodi alias.</p>
                        </div>
                        <div class="col-lg-3">
                            <div class="order-select">
                                <h6>Sort by</h6>
                                <p>Showing 1&ndash;12 of 25 results</p>
                                <form method="get">
                                    <select class="form-control">
                                        <option selected="selected" value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="order-select">
                                <h6>Sort by Price</h6>
                                <p>From 0 - 190$</p>
                                <form method="get">
                                    <select class="form-control">
                                        <option selected="selected" value="">0$ - 50$</option>
                                        <option value="">51$ - 90$</option>
                                        <option value="">91$ - 120$</option>
                                        <option value="">121$ - 200$</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="shop">
                        <div class="grid-layout grid-3-columns" data-item="grid-item">
                            @foreach($products as $product)
                                <div class="grid-item">
                                    <div class="product">
                                        <div class="product-image">
                                            <a href="{{ route('products.show', ['product' => $product->id]) }}"><img alt="{{ $product->title }}" src="{{ $product->image }}">
                                            </a>
                                            @if(Carbon\Carbon::parse($product->created_at)->diffInDays(now()) > 3)
                                                <span class="product-new">NEW</span>
                                            @endif
                                            <span class="product-wishlist">
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                            </span>
                                        </div>
                                        <div class="product-description">
                                            <div class="product-category">{{ $product->category?->name }}</div>
                                            <div class="product-title">
                                                <h3><a href="#">{{ $product->title }}</a></h3>
                                            </div>
                                            <div class="product-price"><ins>$15.00</ins>
                                            </div>
                                            <div class="product-rate">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
{{--                                            <div class="product-reviews"><a href="#">6 customer reviews</a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <hr>
                        <!-- Pagination -->
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <!-- end: Pagination -->
                    </div>
                    <!--End: Product list-->
                </div>
                <!-- end: Content-->
                <!-- Sidebar-->
                <div class="sidebar sticky-sidebar col-lg-3">
                    <!--widget newsletter-->
                    <div class="widget widget-archive">
                        <h4 class="widget-title">Product categories</h4>
                        <ul class="list list-lines">
                            @foreach($categories as $category)
                                <li><a href="{{ route('products.category', ['category' => $category->id]) }}">{{ $category->name }}</a> <span class="count">( {{ $category->count }} )</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-shop">
                        <h4 class="widget-title">Latest Products</h4>
                        @foreach($latestProducts as $product)
                            <div class="product">
                                <div class="product-image">
                                    <a href="{{ route('products.show', ['product' => $product->id]) }}"><img src="{{ $product->image }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">{{ $product->category->name }}</div>
                                    <div class="product-title">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                    </div>
                                    <div class="product-price"><del>$30.00</del><ins>$15.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="widget widget-tags">
                        <h4 class="widget-title">Tags</h4>
                        <div class="tags">
                            <a href="#">Design</a>
                            <a href="#">Portfolio</a>
                            <a href="#">Digital</a>
                            <a href="#">Branding</a>
                            <a href="#">HTML</a>
                            <a href="#">Clean</a>
                            <a href="#">Peace</a>
                            <a href="#">Love</a>
                            <a href="#">CSS3</a>
                            <a href="#">jQuery</a>
                        </div>
                    </div>
                    <div class="widget widget-newsletter">
                        <form class="form-inline" method="get" action="#">
                            <h4 class="widget-title">Subscribe for Latest Offers</h4>
                            <small>Subscribe to our Newsletter to get Sales Offers &amp; Coupon Codes etc.</small>
                            <div class="input-group">
                                <input type="email" placeholder="Enter your Email" class="form-control required email" name="widget-subscribe-form-email" aria-required="true">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                                    </span>
                            </div>
                        </form>
                    </div>
                    <!-- end: Sidebar-->
                </div>
            </div>
    </section>
    <!-- end: Shop products -->
    <!-- DELIVERY INFO -->
    <section class="background-grey p-t-40 p-b-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="icon-box effect small clean">
                        <div class="icon">
                            <a href="#"><i class="fa fa-gift"></i></a>
                        </div>
                        <h3>Free shipping on orders $60+</h3>
                        <p>Order more than 60$ and you will get free shippining Worldwide. More info.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box effect small clean">
                        <div class="icon">
                            <a href="#"><i class="fa fa-plane"></i></a>
                        </div>
                        <h3>Worldwide delivery</h3>
                        <p>We deliver to the following countries: USA, Canada, Europe, Australia</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box effect small clean">
                        <div class="icon">
                            <a href="#"><i class="fa fa-history"></i></a>
                        </div>
                        <h3>60 days money back guranty!</h3>
                        <p>Not happy with our product, feel free to return it, we will refund 100% your money!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
