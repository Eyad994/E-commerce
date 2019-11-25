@extends('frontend.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="card">

            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('shop.cart.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
            </ul>

            <div class="card-body">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <table class="table table-borderless table-condensed">

                            <tbody>
                            @foreach ($carts as $cart)

                                <tr>
                                    <td>
                                        <img src="{{ asset('image/products/'. $cart->model->image) }}" alt=""
                                             style="width: 100px; height: 100px">
                                    </td>
                                    <td>
                                        <p>
                                            <strong>{{ $cart->model->product_name }}</strong>
                                            <br>
                                            {!! $cart->model->description !!}
                                        </p>
                                    </td>
                                    <td>

                                        <form action="{{ route('cart.update') }}" method="POST" id="frm_update{{$cart->rowId}}">
                                            @csrf
                                            <input type="hidden" name="rowId" value="{{$cart->rowId }}">
                                            <label>
                                                <select name="qty" onchange="document.getElementById('frm_update{{$cart->rowId}}').submit();"
                                                        style="border-radius: 0; border: 0; background: transparent; font-weight: bold;" class="form-control">
                                                    @for ($i = 1; $i <100 ; $i++)
                                                        <option value="{{ $i }}" {{ $i==$cart->qty ? 'selected' : null }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </label>

                                        </form>

                                    </td>

                                    <td>
                                        {{ $cart->total }}
                                    </td>

                                    <td>
                                        <a href="{{ route('cart.remove', $cart->rowId) }}"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">

                        <div class="form-group">


                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal
                                <span class="badge badge-primary badge-pill">{{ Cart::subtotal() }}</span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tax
                                <span class="badge badge-primary badge-pill">{{ Cart::tax() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span class="badge badge-primary badge-pill">{{ Cart::total() }}</span>
                            </li>
                        </ul>
                    </div>

                        <div class="form-group">
                            <a href="{{ route('checkout.index') }}" class="btn btn-info btn-sm">Checkout</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
