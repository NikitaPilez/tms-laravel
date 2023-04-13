@extends('app')
@section('content')
<section id="page-title">
    <div class="container">
        <div class="page-title">
            <h1>Shopping Cart</h1>
            <span>Shopping details</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('main') }}">Home</a>
                </li>
                <li><a href="{{ route('products.index') }}">Shop</a>
                </li>
                <li class="active"><a href="#">Shopping Cart</a>
                </li>
            </ul>
        </div>
    </div>
</section>
    @if($products)
        <section id="shop-cart">
            <div class="container">
                <div class="shop-cart">
                    <div class="table table-sm table-striped table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-product-remove"></th>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-name">Product</th>
                                <th class="cart-product-name">Short description</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-price">Quantity</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="cart-product-remove">
                                    <a href="{{ route('cart.remove', ['product' => $product->id]) }}"><i class="fa fa-times"></i></a>
                                </td>
                                <td class="cart-product-thumbnail">
                                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                        <img src="{{ asset('/storage/' . $product->mainImage()?->path) }}" alt="{{ $product->title }}">
                                    </a>
                                </td>
                                <td>
                                    <div class="cart-product-thumbnail-name">{{ $product->title }}</div>
                                </td>
                                <td class="cart-product-description">
                                    <p>{{ $product->short_description }}</p>
                                </td>
                                <td class="cart-product-price">
                                    <span class="amount">${{ $product->price }}</span>
                                </td>
                                <td class="cart-product-price">
                                    <span class="amount">{{ $cart[$product->id]['quantity'] }}</span>
                                </td>
                                <td class="cart-product-subtotal">
                                    <span class="amount">${{ $cart[$product->id]['quantity'] * $product->price}}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form method="POST" action="{{ route('order.create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="upper">Additional information</h4>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="sr-only">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user?->information?->first_name }}">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="sr-only">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $user?->information?->last_name }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="sr-only">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="sr-only">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user?->email }}">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="sr-only">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $user?->phone }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="panel panel-naked">
                                    <div class="panel-heading">
                                        <h3>Cart subtotal ${{ $totalSum }}</h3>
                                        <button type="submit" class="btn icon-left"><span>Create order</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @else
        <section id="shop-cart">
            <div class="container">
                <div class="p-t-10 m-b-20 text-center">
                    <div class="heading-text heading-line text-center">
                        <h4>Your cart is currently empty.</h4>
                    </div>
                    <a class="btn icon-left" href="{{ route('products.index') }}"><span>Return To Shop</span></a>
                </div>
            </div>
        </section>
    @endif
@endsection
