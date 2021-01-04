<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
	{
	    public function pendingOrder(){
	    	$allData = Order::where('order_status','Pending')->get();
	        return view('layouts.admin.invoice.add', compact('allData'));
    }

    public function OrderApprove(Request $request, $id)
    {

    	$order = Order::where('id', $id)->where('order_status', 'Pending')->first();


        $order->order_status = 'success';

        $order->save();
    	

    	
    	

    	return redirect()->route('orders.prnding')->with('success', 'Invoice Successfully Approved');
    }


    


}
