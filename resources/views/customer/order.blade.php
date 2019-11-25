@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>


                    <tr>
                        <th>ID</th>
                        <th>Payment</th>
                        <th>Receipt</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Transaction</th>
                        <th>Created</th>
                        <th>Invoice</th>

                    </tr>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->payment_id }}</td>
                            <td>{{ $order->payment->receipt_email }}</td>
                            <td><span class="badge badge-success">{{ $order->status->status }}</span></td>
                            <td>{{ number_format($order->payment->amount, 2) }} $</td>
                            <td>{{ $order->transaction_date }}</td>
                            <td>{{ $order->created_at }}</td>
                            {{--<td>
                                <a href="{{ $order->payment->receipt_url }}" target="_blank">Print</a>
                            </td>--}}
                            <td>
                                <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse"
                                        data-target="#demo{{$key}}">

                                    <span class="fa fa-eye"></span>

                                </button>
                            </td>
                        </tr>

                        <tr class="accordion-body collapse" id="demo{{$key}}">

                            <td colspan="8">
                                <table class="table table-bordered">
                                        <thead class="text-danger">

                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>

                                        </thead>

                                        <tbdoy>
                                            @foreach ($order->orderItem as $key => $item)

                                            <tr>
                                                <td>{{ $item->product->product_name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->product->price }}</td>
                                                <td>{{ $item->amount }}</td>
                                            </tr>
                                            @endforeach

                                        </tbdoy>

                                    </table>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@stop
