<?php
namespace App\Cart;

class Cart
{
    public function add($id){
        $cart = session()->get('cart');
        if ($cart == null){
            $cart = [];
        }
        array_push($cart, $id);
        $cart = array_unique($cart);
        session()->put('cart', $cart);
    }

    public function all(){
        $cart = session()->get('cart');
        if ($cart == null)
            return [];
        return $cart;
    }

    public function remove(int $id){
        $cart = session()->get('cart');
        if ($cart == null)
            return;
        session()->put('cart', array_filter($cart,  fn ($m) => $m != $id));
    }

    public function delete(){
        session()->remove('cart');
    }

    public function count(){
        $cart = session()->get('cart');
        if ($cart == null)
            return 0;
        return count($cart);
    }


}
