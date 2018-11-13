<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
       
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'visible' => 'required'
        ]);

        $category =  new Category(request(['name','visible']));
        $category->save();
        return redirect('/admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'visible' => 'required'
        ]);

        $category = category::find($id);
        $category->name = $request->get('name');
        $category->visible = $request->get('visible');
        $category->save();

        return redirect('/admin/dashboard');
    }


    public function destroy($id) {
        $category = category::find($id);
        $category->delete();

        return redirect('/admin/dashboard');
    }
}
