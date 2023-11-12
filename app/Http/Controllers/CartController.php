<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{

    public function get(){
        $product_ids = \Cart::all();
        $products = Product::whereIn('id', $product_ids)->get();
        return view('cart.index', ['products'=>$products]);
    }

    public function add(int $id){
        \Cart::add($id);
        return redirect()->back();
    }

    public function remove(int $id){
        \Cart::remove($id);
        return redirect()->back();
    }
}
