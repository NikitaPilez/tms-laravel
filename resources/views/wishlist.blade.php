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
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Shop</a>
                </li>
                <li class="active"><a href="#">Wishlist</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section id="shop-cart">
    <div class="container">
        <div class="p-t-10 m-b-20 text-center">
            <div class="heading-text heading-line text-center">
                <h4>Your Wishlist is currently empty.</h4>
            </div>
            <a class="btn icon-left" href="#"><span>Return To Shop</span></a>
        </div>
    </div>
</section>
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
                    <tr>
                        <td class="cart-product-remove">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="cart-product-thumbnail">
                            <a href="#">
                                <img src="images/shop/products/1.jpg" alt="Bolt Sweatshirt">
                            </a>
                            <div class="cart-product-thumbnail-name">Bolt Sweatshirt</div>
                        </td>
                        <td class="cart-product-description">
                            <p>Short sleeve t shirt made from a dark heather grey poly cotton blend, featuring a screen printed chest pocket. Regular fit.
                            </p>
                        </td>
                        <td class="cart-product-price">
                            <span class="amount">$20.00</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart-product-remove">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="cart-product-thumbnail">
                            <a href="#">
                                <img alt="Consume Tshirt" src="images/shop/products/2.jpg">
                            </a>
                            <div class="cart-product-thumbnail-name">Consume Tshirt</div>
                        </td>
                        <td class="cart-product-description">
                            <p>Short sleeve t shirt made from a dark heather grey poly cotton blend, featuring a screen printed chest pocket. Regular fit.
                            </p>
                        </td>
                        <td class="cart-product-price">
                            <span class="amount">$18.99</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart-product-remove">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="cart-product-thumbnail">
                            <a href="#">
                                <img src="images/shop/products/3.jpg" alt="Logo Tshirt">
                            </a>
                            <div class="cart-product-thumbnail-name">Logo Tshirt</div>
                        </td>
                        <td class="cart-product-description">
                            <p>Short sleeve t shirt made from a dark heather grey poly cotton blend, featuring a screen printed chest pocket. Regular fit.
                            </p>
                        </td>
                        <td class="cart-product-price">
                            <span class="amount">$9.00</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart-product-remove">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="cart-product-thumbnail">
                            <a href="#">
                                <img src="images/shop/products/5.jpg" alt="Grey Sweatshirt">
                            </a>
                            <div class="cart-product-thumbnail-name">Grey Sweatshirt</div>
                        </td>
                        <td class="cart-product-description">
                            <p>Short sleeve t shirt made from a dark heather grey poly cotton blend, featuring a screen printed chest pocket. Regular fit.
                            </p>
                        </td>
                        <td class="cart-product-price">
                            <span class="amount">$22.99</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
