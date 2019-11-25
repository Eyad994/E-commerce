<?php

namespace App\Http\Controllers\Customer;

use App\CustomerProductFavorite;
use App\Http\Controllers\Controller;
use App\Order;

class CustomerController extends Controller
{
    protected $cid;

    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
        return view('customer.home');
    }

    public function order()
    {

        $orders = Order::with(['payment', 'orderItem.product', 'customer'])->has('customer')->has('payment')->get();
        return view('customer.order', compact('orders'));
    }

    public function like($product_id)
    {
        $this->cid = auth()->guard('customer')->user()->id;
        if (!CustomerProductFavorite::where(['product_id' => $product_id,
            'customer_id' => $this->cid
        ])->exists()) {
            CustomerProductFavorite::create([
                'product_id' => $product_id,
                'customer_id' => $this->cid
            ]);

        }
        return redirect()->route('shop.cart.index');
    }

}
