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
                            <a href="{{ route('products.index') }}" class="btn btn-success float-right">Product
                                List</a>

                            <h3 class="card-title">Hover Data Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('products.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="category_name">Category Name</label>
                                    <select class="form-control" name="category_id" id="category_id" required>

                                        <option value="">----Select Category-----</option>
                                        @foreach($categories as  $key => $c)
                                            <option value="{{ $key }}">{{ $c }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name"
                                           placeholder="Product Name" value="{{ old('product_name') }}" required>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Quantity</label>
                                    <input type="text" name="qty" class="form-control" id="qty"
                                           placeholder="Quantity" value="{{ old('qty') }}" required>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                           placeholder="Price" value="{{ old('price') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ old('description') }}"
                                           class="form-control" id="description"
                                           placeholder="Description" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="imageGalleries">Image Gallery</label><br>
                                    <input type="file" id="imageGalleries" multiple name="imageGalleries[]">
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
