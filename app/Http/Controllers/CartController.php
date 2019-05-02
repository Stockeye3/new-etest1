<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\Customer;
use App\Cart;
use App\Product;
use App\Category;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller
{

    private $OrderNum;

public function getOrderId()
 {  
    
 }

public function addToCart(Request $request, Product $product){

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
        $totalPrice = $cart->totalPrice;
        return view ('cart.view', compact ('products', 'totalPrice'));

    }

    public function update(Request $request){

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products= $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalqty = $cart->totalQty;
        $totalPrice = 0;
        $totalqty =0;

        foreach($products as $id => $product){

        $products[$id]['qty'] = $request->get($product['item']['id']);

        if ($products[$id]['qty'] == 0 )
                unset($products[$id]);
        else {
            $totalPrice += ($products[$id]['qty'] *  $products[$id]['price'] );
            $totalqty += $products[$id]['qty'];
        }   
           
    }
        $cart->items = $products;
        $cart->totalQty = $totalqty;
        $cart->totalPrice = $totalPrice;
        $request->session()->put('cart', $cart);

        return view ('cart.view', compact ('products', 'totalPrice'));

    }

    public function showCheckout()
    {
        if (!Session::has('cart')){
            return view('cart.view');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;
        
        
        if (Auth::guard('customer')->check()) { 
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        return view('cart.show-checkout', compact ('total','customer'));
        } 

        else  {         
                return view('auth.customer-login');
              }
        
    }

    public function checkout(Request $request) {


        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $cproducts = $cart->items;

        $OrderNum = Order::max('order_id');

        $nextOrderId = Order::max('order_id');
        $nextOrderId++;
        foreach($cproducts as $cproduct) {
            
        $id = $cproduct['item']['id'];
        $qty = $cproduct['qty'];
        $product = Product::find($id);
        $product->qty = $product->qty - $qty;
        $product->save();
 
        $order = new Order();
        $order->order_id = $nextOrderId;
        $order->customer_id = Auth::guard('customer')->user()->id;
        $order->product_id = $id;
        $order->qty = $qty;
        $order->save();
        }

        $id = Auth::guard('customer')->user()->id;



    }

}
