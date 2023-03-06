@extends('app')
@section('content')
<section class="welcome_area">
        <div class="welcome_slides owl-carousel">
            @foreach($banners as $banner)
            <div class="single_slide height-800 bg-img background-overlay" style="background-image: url({{ $banner->image  }})">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text">
                                <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">{{ $banner->description }}</h2>
                                <a href="#" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
