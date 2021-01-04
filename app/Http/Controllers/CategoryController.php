<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;


class CategoryController extends Controller
{
   
    public function view()
    {
        $allData = Category::all();
        return view('layouts.admin.category.view', compact('allData'));
    }

   
    public function add()
    {
        return view('layouts.admin.category.add');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required'
        ]);
        $cat = new Category();
        $cat->cat_name = $request->cat_name;
        $cat->created_by = Auth::user()->id;
        $cat->save();

        return redirect()->route('categories.view')->with('success', 'Data saved Successfully');
    }

    
    public function edit($id)
    {
        $edit = Category::find($id);
        return view('layouts.admin.category.edit', compact('edit'));
    }

    
    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        $cat->cat_name = $request->cat_name;
        $cat->updated_by = Auth::user()->id;
        $cat->save();

        return redirect()->route('categories.view')->with('success', 'Data updated Successfully');
    }

    
    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->delete($id);
        return redirect()->route('categories.view')->with('success', 'Data updated Successfully');
    }
}
