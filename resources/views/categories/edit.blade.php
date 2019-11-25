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
                            <a href="{{ route('categories.index') }}" class="btn btn-success float-right">Category
                                List</a>

                            <h3 class="card-title">Hover Data Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('categories.update', $category->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">

                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name"
                                           placeholder="Category Name" value="{{ $category->category_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ $category->description }}"
                                           class="form-control" id="description"
                                           placeholder="Description" required>
                                </div>

                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <input type="checkbox" name="is_active"
                                           {{ $category->is_active !=0 ? 'checked' : null }} value="{{ $category->is_active }}"
                                           id="is_active"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label><br>
                                    <input type="file" id="image" name="image">
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
