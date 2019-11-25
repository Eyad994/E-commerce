<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductGallerie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return $this->viewImage(request()->product_id);
        }

        $products = Product::with(['category'])->orderBy('id', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('category_name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image('image', $product);

        if ($product->save()) {
            ProductGallerie::imageGallery("imageGalleries", $product->id);
        }

        return redirect()->route('products.index')->withStatus('Product was created successfully');

    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('category_name', 'id');
        $imageGalleries = ProductGallerie::where('product_id', $product->id)->get();
        return view('products.edit', compact('categories', 'product', 'imageGalleries'));
    }

    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image('image', $product);

        if ($product->save()) {
            ProductGallerie::imageGallery("imageGalleries", $product->id);
        }

        return redirect()->route('products.index')->withStatus('Product was updated successfully');

    }

    public function viewImage($product_id)
    {
        $imageGalleries = ProductGallerie::where('product_id', $product_id)->get();
        return view('products.viewImageGallery', compact('imageGalleries'));
    }

    public function destroy(Product $product)
    {
        if ($product->destroy(request()->id)) {
            ProductGallerie::where('product_id', request()->id)->delete();
            return redirect()->route('products.index')->withStatus('Product was deleted successfully');
        }
    }
}
