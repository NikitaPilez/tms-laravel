@extends('app')
@section('content')
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
        @foreach($banners as $banner)
            <div class="slide kenburns" data-bg-image="{{ $banner->image }}">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-center text-light">
                        <h1>{{ $banner->title }}</h1>
                        <p>{{ $banner->description }}</p>
                        <div><a href="{{ route('products.index') }}" class="btn scroll-to">Show catalog</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
