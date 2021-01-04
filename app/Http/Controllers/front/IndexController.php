<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view('layouts.front.frontpages.index');
    }

    public function sp_products()
    {
        $allData = Product::where('serial_cat', 'SP')->where('quantity', '!=', '0')->get();
         return view('layouts.front.frontpages.sp-products', compact('allData'));
    }


    public function gp_products()
    {
        $allData = Product::where('serial_cat', 'GP')->where('quantity', '!=', '0')->get();
        return view('layouts.front.frontpages.gp-products', compact('allData'));

    }


    public function hp_products()
    {
        $allData = Product::where('serial_cat', 'HP')->where('quantity', '!=', '0')->get();
        return view('layouts.front.frontpages.hp-products', compact('allData'));    
    }


    public function palce_order()
    {
        return view('layouts.front.frontpages.place-order');
    }


    public function update_front_cart(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        // echo "<pre>";
        // print_r($update);
         if ($update) {
                   $notification=array(
                    'message'=>'Cart Updated.',
                    'alert-type'=>'success'
                );
                   return Redirect()->back()->with($notification);
               
            }else{
                return Redirect()->back();

            }
    }


    public function return()
    {
        return view('layouts.front.frontpages.return');
    }

    public function contact()
    {
        return view('layouts.front.frontpages.contact');
    }
}
