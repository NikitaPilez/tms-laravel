@extends('app')
@section('content')
    <section id="product-page" class="product-page p-b-0">
        <div class="container">
            <div class="product">
                <div class="row m-b-40">
                    <div class="col-lg-5">
                        <div class="product-image">
                            <div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
                                @foreach($product->images as $image)
                                    <a href="{{ $image->id }}" data-lightbox="image" title="Shop product image!"><img alt="Shop product image!" src="{{ $image->image }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-description">
                            <div class="product-category">{{ $product->category?->name }}</div>
                            <div class="product-title">
                                <h3><a href="#">{{ $product->title }}</a></h3>
                            </div>
                            <div class="product-price"><ins>{{ $product->price }}$</ins>
                            </div>
                            <div class="product-rate">
                                @for($i = 0; $i < $product->averageReviews(); $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <div class="product-reviews"><a href="#">{{ count($product->reviews) }} customer reviews</a>
                            </div>
                            <div class="seperator m-b-10"></div>
                            <p>{{ $product->short_description }}</p>
                            <div class="product-meta">
                                <p>
                                    @if(count($product->tags))
                                        Tags:
                                        @foreach($product->tags as $tag)
                                            <a href="#" rel="tag">{{$tag->title}}</a>
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="seperator m-t-20 m-b-10"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn"><i class="icon-shopping-cart"></i> Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs tabs-folder">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-align-justify"></i>Description</a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="true"><i class="fa fa-info"></i>Additional
                                Info</a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-star"></i>Reviews</a></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent3">
                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                            {{ $product->description }}
                        </div>
                        <div class="tab-pane fade " id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td>Size</td>
                                    <td>Small, Medium &amp; Large</td>
                                </tr>
                                <tr>
                                    <td>Color</td>
                                    <td>Pink &amp; White</td>
                                </tr>
                                <tr>
                                    <td>Waist</td>
                                    <td>26 cm</td>
                                </tr>
                                <tr>
                                    <td>Length</td>
                                    <td>40 cm</td>
                                </tr>
                                <tr>
                                    <td>Chest</td>
                                    <td>33 inches</td>
                                </tr>
                                <tr>
                                    <td>Fabric</td>
                                    <td>Cotton, Silk &amp; Synthetic</td>
                                </tr>
                                <tr>
                                    <td>Warranty</td>
                                    <td>3 Months</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="comments" id="comments">
                                <div class="comment_number">
                                    Reviews <span>({{ count($product->reviews) }})</span>
                                </div>
                                <div class="comment-list">
                                    @foreach($product->reviews as $review)
                                        <div class="comment" id="comment-1">
                                            <div class="image"><img alt="" src="{{ $review->user->image }}" class="avatar">
                                            </div>
                                            <div class="text">
                                                <div class="product-rate">
                                                    @for ($i = 0; $i < $review->star_count; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                                <h5 class="name">{{ $review->user->name }}</h5>
                                                <span class="comment_date">{{ Carbon\Carbon::parse($review->created_at)->format('d M Y H:i') }}</span>
                                                <div class="text_holder">
                                                    <p>{{ $review->text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
