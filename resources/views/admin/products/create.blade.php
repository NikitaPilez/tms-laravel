@extends('app')
@section('content')
    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="h4">Create product</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.create') }}" class="form-validate" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="short_description">Short description</label>
                                        <input type="text" class="form-control" value="{{ old('short_description') }}" name="short_description" placeholder="Enter your short description">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" value="{{ old('price') }}" name="price" placeholder="Enter price">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sale_price">Sale price</label>
                                        <input type="text" class="form-control" value="{{ old('sale_price') }}" name="sale_price" placeholder="Enter sale price">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" class="form-control">
                                                <option value="">None</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Not active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Description</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file">File</label>
                                            <input type="file" name="file" class="form-control-file" id="file">
                                        </div>
                                    </div>
                                </div>
                                @foreach($errors->all() as $key => $error)
                                    <div class="form-row">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{$error}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn m-t-30 mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
