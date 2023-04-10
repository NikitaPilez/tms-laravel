@extends('app')
@section('content')
    <section class="fullscreen login-screen" data-bg-parallax="{{ asset('img/bg-login.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 center p-50 background-white b-r-6">
                    <h3>Enter your email</h3>
                    <form action="{{ route('password.update')  }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Password confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                        </div>
                        <div class="text-left form-group">
                            <button type="submit" class="btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
