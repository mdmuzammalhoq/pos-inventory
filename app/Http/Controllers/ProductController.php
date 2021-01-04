<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    
    public function view()
    {
        $allData = Product::all();
        return view('layouts.admin.product.view', compact('allData'));
    }

   
    public function add()
    {
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('layouts.admin.product.add', $data);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'serial_cat' => 'required',
            'serial' => 'required',
            'supplier_id' => 'required',
            'weight' => 'required',
            'cat_id' => 'required',
            'product_name' => 'required'
        ]);
        $product = new Product();
        $product->serial_cat = $request->serial_cat;
        $product->serial = $request->serial;
        $product->supplier_id = $request->supplier_id;
        $product->weight = $request->weight;
        $product->unit_id = $request->unit_id;
        $product->cat_id = $request->cat_id;
        $product->product_name = $request->product_name;
        $product->unit_price = '0';
        $product->quantity = '0';
        $product->total_price = '0';
        $product->created_by = Auth::user()->id;
        $product->save();

        return redirect()->route('products.view')->with('success', 'Data saved Successfully');
    }

    
    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('layouts.admin.product.edit', $data);
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->serial = $request->serial;
        $product->supplier_id = $request->supplier_id;
        $product->weight = $request->weight;
        $product->unit_id = $request->unit_id;
        $product->cat_id = $request->cat_id;
        $product->product_name = $request->product_name;
        $product->created_by = Auth::user()->id;
        $product->save();

        return redirect()->route('products.view')->with('success', 'Data saved Successfully');
    }

   
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete($id);
        return redirect()->route('products.view')->with('success', 'Data updated Successfully');
    }
}
