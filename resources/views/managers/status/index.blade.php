@extends('layouts.master')

@section('content')

    <!-- /.card -->

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Status Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="col-md-12">
                            <a href="{{ route('status.create') }}" class="btn btn-primary btn-md float-right"><span class="fa fa-plus"></span></a><br>
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
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($colors as $key => $color)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $color->status }}</td>
                                    <td>{{ $color->created_at }}</td>
                                    <td>{{ $color->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('status.destroy', $color->id) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
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
