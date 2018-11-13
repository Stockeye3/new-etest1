<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
     public function __construct() {
       //$this->middleware('auth');
    }

    public function index() {

    }

    public function create() {
        return view('customer.register');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',   
            'address' => 'required',
            'password' => 'required',
        ]);

       
                $customer = new  Customer(request(['fname','lname','phone', 'address', 'email','password']));
                $customer->save();
        return redirect('/');
    }

    public function show($id) {
        $customer = Customer::find($id);
        return view ('customer.view',compact('customer'));
    }

    public function edit($id) {
        $customer = Customer::find($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'ban' => 'required'
        ]);

        $customer = Customer::find($id);
        $customer->fname = $request->get('fname');
        $customer->lname = $request->get('lname');
        $customer->email = $request->get('email');
//        $customer->password = $request->get('password');
        $customer->address = $request->get('address');
        $customer->phone = $request->get('phone');
        $customer->ban = $request->get('ban');
        $customer->save();

        return redirect('/admin/dashboard');
    }

    public function ban(Request $request, $id){
        $customer = Customer::find($id);
        $customer->ban = true;
        $customer->save();
       
         return redirect('/admin/dashboard');
    }
    
    public function unban(Request $request, $id){
        $customer = Customer::find($id);
        $customer->ban = false;
        $customer->save();
 
         return redirect('/admin/dashboard');
    }
    public function destroy($id) {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/admin/dashboard');
    }

}


