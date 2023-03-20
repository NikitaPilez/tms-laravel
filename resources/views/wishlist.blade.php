@extends('app')
@section('content')
<section id="page-title">
    <div class="container">
        <div class="page-title">
            <h1>Wishlist</h1>
            <span>Your wishlist!</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('main') }}">Home</a>
                </li>
                <li><a href="{{ route('products.index') }}">Shop</a>
                </li>
                <li class="active"><a href="{{ route('wishlist.get') }}">Wishlist</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@if(count($user->wishlist) == 0)
    <section id="shop-cart">
        <div class="container">
            <div class="p-t-10 m-b-20 text-center">
                <div class="heading-text heading-line text-center">
                    <h4>Your Wishlist is currently empty.</h4>
                </div>
                <a class="btn icon-left" href="{{ route('products.index') }}"><span>Return To Shop</span></a>
            </div>
        </div>
    </section>
@else
    <section id="shop-wishlist">
        <div class="container">
            <div class="shop-cart">
                <div class="table table-sm table-striped table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="cart-product-remove"></th>
                            <th class="cart-product-thumbnail">Product</th>
                            <th class="cart-product-name">Description</th>
                            <th class="cart-product-price">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($user->wishlist as $product)
                                <tr>
                                    <td class="cart-product-remove">
                                        <form action="{{ route('wishlist.delete', ['product' => $product->id]) }}" method="POST">
                                            @csrf
                                            <a href="#" onclick="this.parentNode.submit()"><i class="fa fa-times"></i></a>
                                        </form>
                                    </td>
                                    <td class="cart-product-thumbnail">
                                        <a href="#">
                                            <img src="{{ $product->image }}" alt="{{ $product->title }}">
                                        </a>
                                        <div class="cart-product-thumbnail-name">{{ $product->title }}</div>
                                    </td>
                                    <td class="cart-product-description">
                                        <p>{{ $product->description }}</p>
                                    </td>
                                    <td class="cart-product-price">
                                        <span class="amount">${{ $product->price }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection
