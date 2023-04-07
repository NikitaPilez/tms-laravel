@extends('app')
@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Confirmed email</h1>
            </div>
        </div>
    </section>
    <section id="shop-cart">
        <div class="container">
            <div class="p-t-10 m-b-20 text-center">
                <div class="heading-text heading-line text-center">
                    <h4>Your have not confirmed your email</h4>
                </div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn icon-left"><span>Verify email</span></button>
                </form>
            </div>
        </div>
    </section>
@endsection
