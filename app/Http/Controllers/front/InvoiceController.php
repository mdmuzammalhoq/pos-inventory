<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\CustomerReturn;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function OrderProduct(Request $request){
        $this->validate($request, [
            'customer_name' => 'required',
            'product_name' => 'required',
            'cat_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'order_status' => 'required'
        ]);

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->product_name = $request->product_name;
        $order->phone = $request->phone;
        $order->market_name = $request->market_name;
        $order->address = $request->address;
        $order->cat_name = $request->cat_name;
        $order->qty = $request->qty;
        $order->price = $request->price;
        $order->order_status = $request->order_status;
        $order->order_date = $request->order_date;
        $order->save();

        return redirect()->back()->with('success', 'Data saved Successfully');
    }

    public function ReturnProduct(Request $request){
        $this->validate($request, [
            'customer_name' => 'required',
            'product_name' => 'required',
            'cat_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'return_status' => 'required'
        ]);

        $order = new CustomerReturn();
        $order->customer_name = $request->customer_name;
        $order->product_name = $request->product_name;
        $order->phone = $request->phone;
        $order->market_name = $request->market_name;
        $order->address = $request->address;
        $order->cat_name = $request->cat_name;
        $order->qty = $request->qty;
        $order->price = $request->price; 
        $order->return_status = $request->return_status;
        $order->return_date = $request->return_date;
        $order->save();

        return redirect()->back()->with('success', 'Data saved Successfully');
    }
}
