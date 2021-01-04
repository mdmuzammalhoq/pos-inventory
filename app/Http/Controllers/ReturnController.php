<?php

namespace App\Http\Controllers;


use App\Category;
use App\Customer;
use App\Invoice;
use App\InvoiceDetail;
use App\Payment;
use App\PaymentDetail;
use App\Product;
use App\ReturnAci;
use App\ReturnAciDetail;
use App\Paymentaci;
use App\PaymentaciDetail;
use App\Supplier;
use App\Unit;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReturnController extends Controller
{
    public function view()
    {
        $returnData = ReturnAci::orderBy('id', 'desc')->orderBy('date', 'desc')->where('status','1')->get();
        return view('layouts.admin.acireturn.view', compact('returnData'));
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $returnaci_data = ReturnAci::orderBy('id','desc')->first();
        if ($returnaci_data == null) {
            $firstReg = '0';
            $data['invoice_no'] = $firstReg+1;
        }else{
            $returnaci_data = ReturnAci::orderBy('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $returnaci_data+1;
        }
        $data['customers'] = Customer::all();
        $data['date'] = date('Y-m-d');
        return view('layouts.admin.acireturn.add', $data);
    }

    public function store(Request $request)
    {
        if ($request->cat_id == null) {
        return redirect()->back()->with('error', 'You did not select any product');
    }else{
        
            $return_aci = new ReturnAci();
            $return_aci->invoice_no = $request->invoice_no;
            $return_aci->date = date('Y-m-d', strtotime($request->date));
            $return_aci->description = $request->description;
            $return_aci->status = '0';
            $return_aci->return_by = Auth::user()->id;
            DB::transaction(function() use($request, $return_aci) { 
                if ($return_aci->save()) {
                    $count_cat = count($request->cat_id);
                    for ($i=0; $i < $count_cat; $i++) { 
                        $invoice_details = new ReturnAciDetail();
                        $invoice_details->date = date('Y-m-d', strtotime($request->date));
                        $invoice_details->invoice_id = $return_aci->id; 
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
                    $payment = new Paymentaci();
                    $payment_details = new PaymentaciDetail();
                    $payment->invoice_id = $return_aci->id;
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
                    $payment_details->invoice_id = $return_aci->id;
                    $payment_details->date = date('Y-m-d', strtotime($request->date));
                    $payment_details->save();
                }
            });
            }
            return redirect()->route('return.aci.pending.list')->with('success', 'Data Saved Successfully');
    }

    public function pendingList(){
        $returnData = ReturnAci::orderBy('id', 'desc')->orderBy('date', 'desc')->where('status','0')->get();
        return view('layouts.admin.acireturn.pending-list', compact('returnData'));
    }

    public function ReturnAciApprove($id)
    {
        $approve = ReturnAci::with(['return_details'])->find($id);
       
        return view('layouts.admin.acireturn.approve', compact('approve'));
    }

    public function ReturnAciApproveStore(Request $request, $id)
    {
        $return_aci = ReturnAci::find($id);
        $return_aci->approved_by = Auth::user()->id;
        $return_aci->status = '1';
        DB::transaction(function() use($request, $return_aci, $id){
            foreach($request->selling_qty as $key =>$val){
                $invoice_details = ReturnAciDetail::where('id', $key)->first();
                $invoice_details->status = '1';
                $invoice_details->save();
                $product = Product::where('id', $invoice_details->product_id)->first();
                $product->quantity = ((float)$product->quantity)-((float)$request->selling_qty[$key]);
                $product->save();
            }

            $return_aci->save();
        });

        return redirect()->route('return.aci.pending.list')->with('success', 'Return Successfully Approved');
    }

    public function ReturnAciDelete($id)
    {
        $delete_aci_return = ReturnAci::find($id);
        $delete_aci_return->delete();
        ReturnAciDetail::where('invoice_id', $delete_aci_return->id)->delete();
        Paymentaci::where('invoice_id', $delete_aci_return->id)->delete();
        PaymentaciDetail::where('invoice_id', $delete_aci_return->id)->delete();
        return redirect()->back()->with('success', 'Data updated Successfully');
    }
   
}
