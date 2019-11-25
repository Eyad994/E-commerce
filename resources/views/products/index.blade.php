@extends('layouts.master')

@section('content')

    <style type="text/css">
        .modal.and.carousel {
            position: fixed;
        }
    </style>

    <!-- /.card -->

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="col-md-12">
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm pull-right">New
                                Product</a>
                        </div>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-md-12">

                        @if(Session::has('status'))
                            <div class="alert alert-danger">{{ Session::get('status') }}</div>
                        @endif
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Created</th>
                                <th>Last Update</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->category->category_name }}</td>
                                    <td>{{ $value->product_name }}</td>
                                    <td>{{ $value->qty }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->is_active }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <img src="{{ asset('image/products/'.$value->image) }}"
                                             style="width: 80px; height: 50px;">
                                    </td>
                                    <td class="col-md-12">
                                        <a href="{{ route('products.edit', $value->id) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('products.destroy', $value->id) }}"
                                           class="btn btn-danger btn-sm"
                                           onclick="event.preventDefault(); document.getElementById('product-frm-delete').submit();">Delete</a>

                                        <a href="#lightbox" data-toggle="modal" data-id="{{ $value->id }}" class="btn btn-info btn-sm view_image">View
                                            Image</a>

                                        <form method="POST" action="{{route('products.destroy', $value->id)}}"
                                              id="product-frm-delete">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="modal fade and carousel slide" id="lightbox">

    </div>
@endsection

@section('script')
    <script>
        $('.view_image').on('click', function () {
            product_id = $(this).data('id');
            
            $.get("{{ route('products.index') }}",{product_id:product_id}, function (data) {
               $('#lightbox').html(data)
            });
        })
    </script>
@endsection
