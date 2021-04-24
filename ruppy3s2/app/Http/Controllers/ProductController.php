<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
