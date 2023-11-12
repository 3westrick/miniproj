<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view("products.index", ['products' => $products]);
    }

    function show(Product $product){
        $last_products = Product::query()->whereNot('id', $product->id)->limit(3)->get();
        return view('products.show', ['product' => $product,'last_products'=>$last_products]);
    }
}
