@extends('layouts.master')

@section('content')

    <!-- /.card -->

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="col-md-12">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm pull-right">New
                                Category</a>
                        </div>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-md-12">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Created</th>
                                <th>Last Update</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->is_active }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <img src="{{ asset('image/categories/'.$value->image) }}"
                                             style="width: 80px; height: 50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', $value->id) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('categories.destroy', $value->id) }}"
                                           class="btn btn-danger btn-sm"
                                           onclick="event.preventDefault(); document.getElementById('category-frm-delete').submit();">Delete</a>

                                        <form method="POST" action="{{route('categories.destroy', $value->id)}}"
                                              id="category-frm-delete">
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
@endsection
