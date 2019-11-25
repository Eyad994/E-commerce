@extends('layouts.master')

@section('content')

    <!-- /.card -->

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Color Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="container">
                            <div class="form-group">
                                <a href="{{ route('color.restore.info') }}"
                                   onclick="event.preventDefault(); document.getElementById('frm_restore').submit();"
                                   class="btn btn-danger btn-md float-right"><span class="fa fa-plus"></span>
                                    Restores(s)</a>
                                <a href="{{ route('color.index') }}" class="btn btn-primary btn-md float-right"><span
                                        class="fa fa-align-left"></span> Color List</a><br>
                            </div>
                        </div>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-md-12">

                        <form action="{{ route('color.restore.info') }}" method="GET" id="frm_restore">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="chk">
                                    </th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Deleted At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($colors as $key => $color)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="id[]" value="{{ $color->id }}" class="id">
                                        </td>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $color->color_name }}</td>
                                        <td>{{ $color->description }}</td>
                                        <td>{{ $color->created_at }}</td>
                                        <td>{{ $color->updated_at }}</td>
                                        <td>{{ $color->deleted_at }}</td>
                                        <td>
                                            <a href="{{ route('color.restore.info', $color->id) }}"
                                               class="btn btn-danger" title="Restore">
                                                <span class="fa fa-download"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('#chk').on('change', function () {

            $('input[class=id]').not(this).prop("checked", this.checked);
        });

        // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        $('input[class=id]').on('change', function () {

            $('input[id=chk]').not(this).prop("checked", this.checked);
        });

    </script>
@endsection
