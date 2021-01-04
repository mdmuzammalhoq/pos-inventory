<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

   
    public function create()
    {
        //
    }

    
    public function getCategory(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with('category')->select('cat_id')->where('supplier_id', $supplier_id)->groupBy('cat_id')->get();
         // dd($allCategory->toArray());
        return response()->json($allCategory);
    }    
    public function getProduct(Request $request)
    {
        $cat_id = $request->cat_id;
        $allProduct = Product::where('cat_id', $cat_id)->get();
          // dd($allProduct->toArray());
        return response()->json($allProduct);
    }   
    public function getStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id', $product_id)->first()->quantity;
          // dd($allProduct->toArray());
        return response()->json($stock);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
