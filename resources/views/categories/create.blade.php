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
                            <a href="{{ route('categories.index') }}" class="btn btn-success float-right">Category List</a>

                            <h3 class="card-title">Hover Data Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('categories.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name"
                                           placeholder="Category Name" value="{{ old('category_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description"
                                           placeholder="Description" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <input type="file" id="image" name="image">
                                </div>

                                {{--<div class="form-group">
                                    <label for="imageGalleries">Image Gallery</label><br>
                                    <input type="file" id="imageGalleries" name="imageGalleries[]">
                                </div>--}}

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
