<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index','show');
    }
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();        
        return view('product.index', compact('products','categories','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'photo' => 'required',
            'category_id' => 'required',
            'visible' => 'required'
        ]);

        $cover = $request->file('photo');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        
        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->mime = $cover->getClientMimeType();
        $product->original_filename = $cover->getClientOriginalName();
        $product->filename = $cover->getFilename().'.'.$extension;
        $product->category_id = $request->get('category_id');
        $product->visible = $request->get('visible');
        $product->save();

        // $product =  new Product(request(['name','description', 'price', 'qty', 'photo', 'category_id', 'visible']));
        // $product->save();
        return redirect('/admin/dashboard');
    }

    public function show($id) {
        $product = Product::find($id);
        return view ('product.show',compact('product'));
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('product','categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required|integer',
            'category_id' => 'required',
            'visible' => 'required'
        ]);
        $product = Product::find($id);

        if ($request->hasFile('photo')) {
            $cover = $request->file('photo');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            $product->mime = $cover->getClientMimeType();
            $product->original_filename = $cover->getClientOriginalName();
            $product->filename = $cover->getFilename().'.'.$extension;
        }
        
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        
        $product->category_id = $request->get('category_id');
        $product->visible = $request->get('visible');
        $product->save();

        return redirect('/admin/dashboard');
    }


    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('/admin/dashboard');
    }




}
