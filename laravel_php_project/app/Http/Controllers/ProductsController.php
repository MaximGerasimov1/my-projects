<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.create')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
