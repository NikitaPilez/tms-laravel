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
                    <div class="shop">
                        <div class="grid-layout grid-3-columns" data-item="grid-item">
                            @foreach($products as $product)
                                <div class="grid-item">
                                    <div class="product">
                                        <div class="product-image">
                                            <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                                <img alt="{{ $product->title }}" src="{{ asset('/storage/' . $product->mainImage()?->path) }}">
                                            </a>
                                            @if(Carbon\Carbon::parse($product->created_at)->diffInDays(now()) > 3)
                                                <span class="product-new">NEW</span>
                                            @endif
                                            <span class="product-wishlist">
                                                <form action="{{ route('wishlist.add', ['product' => $product->id]) }}" method="POST">
                                                    @csrf
                                                        <a href="#" onclick="this.parentNode.submit()"><i class="fa fa-heart"></i></a>
                                                </form>
                                            </span>
                                        </div>
                                        <div class="product-description">
                                            <div class="product-category">{{ $product->category?->name }}</div>
                                            <div class="product-title">
                                                <h3><a href="#">{{ $product->title }}</a></h3>
                                            </div>
                                            <div class="product-price">
                                                <ins>
                                                    @if($product->sale_price)
                                                        ${{ $product->sale_price }}
                                                    @else
                                                        ${{ $product->price }}
                                                    @endif
                                                </ins>
                                            </div>
                                            <div class="product-rate">
                                                @for($i = 0; $i < $product->averageReviews(); $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            <div class="product-reviews"><a href="#">{{ count($product->reviews) }} customer reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <hr>
                        {!! $products->appends(Request::all())->links() !!}
                    </div>
                </div>
                <div class="sidebar sticky-sidebar col-lg-3">
                    <div class="widget widget-archive">
                        <h2>Filter</h2>
                        <form method="GET" action="{{ route('products.index') }}">
                            <div class="order-select">
                                <h6>Sort by</h6>
                                <p>Showing 1&ndash;12 of 25 results</p>
                                <select name="sort" class="form-control">
                                    <option value="new">Sort by newness</option>
                                    <option value="rating">Rating</option>
                                    <option value="price-asc">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <div class="order-select">
                                <h6>Price min</h6>
                                <div class="form-group">
                                    <input type="number" placeholder="0" class="form-control" name="price-min">
                                </div>
                            </div>
                            <div class="order-select">
                                <h6>Price max</h6>
                                <div class="form-group">
                                    <input type="number" placeholder="10000" class="form-control" name="price-max">
                                </div>
                            </div>
                            <button type="submit" class="btn mt-1">Submit</button>
                        </form>
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
                                    <div class="product-category">{{ $product->category?->name }}</div>
                                    <div class="product-title">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                    </div>
                                    <div class="product-price"><del>${{ $product->sale_price }}</del><ins>${{ $product->price }}</ins>
                                    </div>
                                    <div class="product-rate">
                                        @for($i = 0; $i < $product->averageReviews(); $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="widget widget-tags">
                        <h4 class="widget-title">Tags</h4>
                        <div class="tags">
                            @foreach($tags as $tag)
                            <a href="#">{{ $tag->title }}</a>
                            @endforeach
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
                </div>
            </div>
        </div>
    </section>
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
