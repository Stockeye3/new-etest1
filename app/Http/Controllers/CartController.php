<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Category;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
        public function addToCart(Request $request, $id){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') :null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');

    }

    public function showCart(){

        if(!Session::has('cart')) {
            return view('cart.view');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products= $cart->items;
        $categories = Category::all();
        return view ('cart.view', ['products' => $cart->items, 'totalPrice'=> $cart->totalPrice]);

    }

    public function showCheckout()
    {
        if (!Session::has('cart')){
            return view('cart.view');
        }

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;
        return view('cart.show-checkout', compact ('total'));
    }

}
