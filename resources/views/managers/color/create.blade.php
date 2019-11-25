@extends('layouts.master')
@section('content')

    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('color.index') }}" class="btn btn-success float-right">Create Color</a>

                            <h3 class="card-title">Hover Data Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('color.store') }}" role="form" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="color_name">Color Name</label>
                                    <input type="text" name="color_name" class="form-control" id="color_name"
                                           placeholder="Color Name" value="{{ old('color_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description"
                                           placeholder="Description" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>

                <!-- /.card -->
                <!-- general form elements disabled -->
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
