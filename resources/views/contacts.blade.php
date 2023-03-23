@extends('app')
@section('content')
<section id="page-title" data-bg-parallax="images/parallax/5.jpg">
    <div class="container">
        <div class="page-title">
            <h1>Contact Us</h1>
            <span>The most happiest time of the day!.</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="#">Home</a> </li>
                <li><a href="#">Pages</a> </li>
                <li class="active"><a href="#">Contact Us</a> </li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-uppercase">Get In Touch</h3>
                <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>
                <div class="m-t-30">
                    <form enctype="multipart/form-data" action="{{ route('contacts.feedback') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input value="{{ old('name') }}" type="text" aria-required="true" name="name" class="form-control name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" aria-required="true" name="email" class="form-control email" placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="subject">Your Subject</label>
                                <input type="text" value="{{ old('subject') }}" name="subject" class="form-control" placeholder="Subject...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea type="text" name="message" rows="5" class="form-control" placeholder="Enter your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" class="form-control-file" id="file">
                        </div>
                        @if (!$errors->any())
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Success
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        @endif
                        @foreach($errors->all() as $key => $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        @endforeach
                        <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="text-uppercase">Address & Map</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <address>
                            <strong>Polo, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</h4> (123) 456-7890
                        </address>
                    </div>
                    <div class="col-lg-6">
                        <address>
                            <strong>Polo Office</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</h4> (123) 456-7890
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
