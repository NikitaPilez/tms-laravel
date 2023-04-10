@extends('app')
@section('content')
    <section class="fullscreen login-screen" data-bg-parallax="{{ asset('img/bg-login.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 center p-50 background-white b-r-6">
                    <h3>Enter your email</h3>
                    <form action="{{ route('password.email')  }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="text-left form-group">
                            <button type="submit" class="btn">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
