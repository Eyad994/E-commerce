@extends('frontend.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        {{ $products->render() }}
        <div class="card">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
            </ul>
            <div class="card-body">
                <div class="row">
                    @foreach($products as $key => $product)
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <form action="{{ route('cart.add', $product->id) }}" method="GET">
                                <div class="card">

                                    <h6 class="card-title bg-info text-white p-2 text-uppercase">{{ $product->product_name }}</h6>

                                    <div class="card-body">
                                        <img src="{{ asset('image/products/'.$product->image) }}" alt="Phone"
                                             class="img-fluid mb-2" style="width: 100%; height: 150px">
                                        <hr>
                                        <h6>&#8377; {{ $product->price }}
                                            <span>{{ $product->discount }}% off</span>
                                        </h6>
                                        <h6 class="badge badge-success">4.4<i class="fa fa-star"></i></h6>
                                    </div>

                                    <div class="btn-group d-flex">
                                        <button class="btn btn-success flex-fill">Add to cart</button>
                                        <a href="{{ route('customer.like', $product->id) }}" class="btn btn-{{ $product->like ? 'danger' : 'warning' }} flex-fill text-white">
                                            {!! $product->like ? '<i class="fa fa-heart-o"></i>' : 'Like' !!}
                                        </a>
                                    </div>


                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
