<?php
  
namespace App\Http\Controllers\front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceDetail;
use App\Payment;
use App\PaymentDetail;
use App\Product;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

class AddtoCartController extends Controller
{
       
    public function add_to_cart(Request $request)
    {
        $qty = $request->qty;
        $product_id = $request->id;
        $product_info=DB::table('products')->where('id', $product_id)->first();

        $data['qty']=$qty;
        $data['id']=$product_info->id;
        $data['name']=$product_info->product_name;
        $data['cat_id']=$product_info->cat_id;
        $data['price']=$product_info->unit_price;
        $data['weight']=0;

        Cart::add($data);
        return Redirect()->back();

    }




 
    public function show_cart()
    {
        $all_product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->get();
        return view('layouts.front.frontpages.shopping-cart');
    }

 
    public function RemoveToCart($rowId)
    {
         $remove = Cart::remove($rowId);
        if ($remove) {
                   $notification=array(
                    'message'=>'Cart Removed.',
                    'alert-type'=>'success'
                );
                   return Redirect()->back()->with($notification);
               
            }else{
                return Redirect()->back();

            }
    }

    public function CheckOut()
    {
        return view('layouts.front.frontpages.check-out');    
    }


   public function loginCheck()
    {
         $all_product = DB::table('products')
            ->join('customers', 'products.id', '=', 'customers.id')
            ->get();
        return view('layouts.front.frontpages.after-login-cart');
    }


    public function insert_order(Request $request)
    {
         $data = array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['product_name']=$request->product_name;
        $data['qty']=$request->qty;
        $data['total']=$request->total;
        $data['order_date']=$request->order_date;

        $order_id = DB::table('orders')->insert($data);
       
       Cart::destroy();
        return Redirect()->back();
    
    }

    public function InvoiceWithCart(Request $request)
    {
        
    if ($request->cat_id == null) {
        return redirect()->back()->with('error', 'You did not select any product');
    }else{
        if ($request->paid_amount > $request->estimated_amount) {
            return redirect()->back()->with('error', 'You can not input amount greater than total price');
        }else{
            $invoice = new Invoice();
            $invoice->invoice_no = $request->invoice_no;
            $invoice->date = date('Y-m-d', strtotime($request->date));
            $invoice->description = $request->description;
            $invoice->status = '0';
            $invoice->created_by = Auth::user()->id;
            DB::transaction(function() use($request, $invoice) { 
                if ($invoice->save()) {
                    $count_cat = count($request->cat_id);
                    for ($i=0; $i < $count_cat; $i++) { 
                        $invoice_details = new InvoiceDetail();
                        $invoice_details->date = date('Y-m-d', strtotime($request->date));
                        $invoice_details->invoice_id = $invoice->id; 
                        $invoice_details->cat_id = $request->cat_id[$i];
                        $invoice_details->product_id = $request->product_id[$i];
                        $invoice_details->selling_qty = $request->selling_qty[$i];
                        $invoice_details->unit_price = $request->unit_price[$i];
                        $invoice_details->selling_price = $request->selling_price[$i];
                        $invoice_details->status = '0';
                        $invoice_details->save();
                    }

                    if ($request->customer_id == '0') {
                        $customer = new Customer();
                        $customer->name = $request->name;
                        $customer->market_name = $request->market_name;
                        $customer->phone = $request->phone;
                        $customer->address = $request->address;
                        $customer->save();
                        $customer_id = $customer->id;
                    }else{
                        $customer_id = $request->customer_id;
                    }
                    $payment = new Payment();
                    $payment_details = new PaymentDetail();
                    $payment->invoice_id = $invoice->id;
                    $payment->customer_id = $customer_id;
                    $payment->paid_status = $request->paid_status;
                    $payment->discount_amount = $request->discount_amount;
                    $payment->total_amount = $request->estimated_amount;

                    if ($request->paid_status == 'full_paid') {
                        $payment->paid_amount = $request->estimated_amount;
                        $payment->due_amount = '0';
                        $payment_details->current_paid_amount = $request->estimated_amount;
                    }elseif($request->paid_status == 'full_due'){
                        $payment->paid_amount = '0' ;
                        $payment->due_amount = $request->estimated_amount;
                        $payment_details->current_paid_amount = '0';
                    }elseif($request->paid_status == 'partial_paid'){
                        $payment->paid_amount = $request->paid_amount;
                        $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                        $payment_details->current_paid_amount = $request->paid_amount;
                    }

                    $payment->save();
                    $payment_details->invoice_id = $invoice->id;
                    $payment_details->date = date('Y-m-d', strtotime($request->date));
                    $payment_details->save();
                }
            });
            }
        }
    }
    
}
