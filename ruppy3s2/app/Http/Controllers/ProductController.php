<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
        $input = $request->all();
        $input['user_id'] = Auth::id();
        Product::create($input);
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        if (Auth::user()->cannot('update', $product)) {
            abort(403);
        }

        $categories = Category::get();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        if (Auth::user()->cannot('update', $product)) {
            abort(403);
        }
        $product->update($request->all());
        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        if (Auth::user()->cannot('delete', $product)) {
            abort(403);
        }
        $product->delete();
        return redirect(route('products.index'));
    }
}
