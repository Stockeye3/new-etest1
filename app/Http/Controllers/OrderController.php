<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Order;
use App\Customer;
use App\Cart;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Customer $customer)
    {
        $products = Product::all();

        $orders_query = DB::table('orders')->where('customer_id', '=' ,$customer->id)->get();

        if (count($orders_query) == 0 ) {
            $orders = $orders_query ;
            return view('customer.orders',compact ('customer','orders','products')); 
        }


        $orders= array(array());
        $last_order =  DB::table('orders')->orderBy('created_at', 'desc')->first();

        $index =0;

        for($i =0 ; ; $i++) {

            for($j=0;;$j++){
                $orders[$i][$j] = $orders_query[$index];
                $currentOrder =  $orders_query[$index];
                if($currentOrder == $last_order)
                break; // if the current order is the last order break loop
                else if ($orders_query[$index+1]->order_id != $orders_query[$index]->order_id)
                    {   
                        $index++; // if the next order has a different order id  
                        break; // break after indexing the new order row
                    }

                $index++;

            }
            if ($currentOrder == $last_order)
            break;
        }
        // dd(array_dot($orders));
        
        // dd($orders);
        return view('customer.orders',compact ('customer','orders','products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
