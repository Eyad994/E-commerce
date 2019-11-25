<?php

namespace App\Http\Controllers;

use App\Product;

class FrontEndController extends Controller
{
    public function index()
    {
        $products = Product::with('like')->orderBy('id', 'desc')->paginate(8);
        return view('shop.shopping_cart', compact('products'));
    }
}
