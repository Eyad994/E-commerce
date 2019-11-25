<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = Product::find($id);
        Cart::add($product->id, $product->product_name, 1, $product->price)->associate('App\Product');
        return back();
    }

    public function readCart()
    {
        $carts = Cart::content();
        return view('shop.index', compact('carts'));
    }

    public function updateCart()
    {
        Cart::update(request()->rowId, request()->qty);
        return back();
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
