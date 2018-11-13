<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Customer;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard() {

        $categories = Category::orderby('id', 'asc')->get();
        $customers = Customer::orderby('id', 'asc')->get();
        $products = Product::orderby('id','asc')->get();

        return view('admin.dashboard', compact('customers','categories','products'));
    }

    public function showProfile() {
        $admin = User::find(Auth()->user()->id);

        return view('admin.profile', compact('admin'));
    }

}
 