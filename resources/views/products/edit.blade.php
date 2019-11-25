@extends('layouts.master')
@section('content')

    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('products.index') }}" class="btn btn-success float-right">Product
                                List</a>

                            <h3 class="card-title">Update Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('products.update', $product->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">

                                    <label for="category_name">Category Name</label>
                                    <select class="form-control" name="category_id" id="category_id" required>

                                        <option value="">----Select Category-----</option>
                                        @foreach($categories as  $key => $c)
                                            <option
                                                value="{{ $key }}" {{ $product->category_id == $key ? 'selected' : null }}>{{ $c }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name"
                                           placeholder="Product Name" value="{{ $product->product_name }}" required>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Quantity</label>
                                    <input type="text" name="qty" class="form-control" id="qty"
                                           placeholder="Quantity" value="{{ $product->qty }}" required>
                                </div>

                                <div class="form-group">

                                    <label for="category_name">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                           placeholder="Price" value="{{ $product->price }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ $product->description }}"
                                           class="form-control" id="description"
                                           placeholder="Description" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="imageGalleries">Image Gallery</label><br>
                                    <input type="file" id="imageGalleries" name="imageGalleries[]">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>

                <div class="col-xs-6">

                    <ol class="list-group">
                        @foreach($imageGalleries as $key => $image)
                            <li class="list-group-item">
                                <img src="{{ asset('image/galleries/'.$image->gallery_image) }}" class="img-thumbnail" style="width: 100px; height: 100px ">
                            </li>
                        @endforeach
                    </ol>

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
