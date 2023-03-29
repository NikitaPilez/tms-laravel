@extends('app')
@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Products</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('main') }}">Home</a> </li>
                    <li><a href="{{ route('main') }}">Admin panel</a> </li>
                    <li class="active"><a href="#">Products</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section id="page-content" class="no-sidebar">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-light"><i class="icon-plus"></i>Add Record</a>
                    <a class="btn btn-light"><i class="icon-plus"></i>Export to csv</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Short description</th>
                            <th>Price</th>
                            <th>Sale price</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <th class="noExport">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->short_description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->category?->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                @if($product->is_active)
                                    <td><span class="badge badge-pill badge-primary">Active</span></td>
                                @else
                                    <td><span class="badge badge-pill badge-danger">Not active</span></td>
                                @endif
                                <td> <a class="ml-2" href="{{ route('admin.products.update.view', ['product' => $product->id]) }}" data-toggle="tooltip" data-original-title="Edit"><i class="icon-edit"></i></a>
                                    <a class="ml-2" href="{{ route('admin.products.delete', ['product' => $product->id]) }}" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Date</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
