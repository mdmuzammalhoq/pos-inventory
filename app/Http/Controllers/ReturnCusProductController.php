<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Invoice;
use App\InvoiceDetail;
use App\Payment;
use App\PaymentDetail;
use App\Product;
use App\CustomerReturn;
use App\ReturnCustProduct;
use App\ReturnCustProductDetail; 
use App\ReturnAci;
use App\ReturnAciDetail;
use App\PaymentCustomer;
use App\PaymentCustomerDetail;
use App\Supplier;
use App\Unit;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReturnCusProductController extends Controller
{
     public function view()
    {
        $allData = CustomerReturn::orderBy('id', 'desc')->orderBy('return_date', 'desc')->where('return_status','Pending')->get();
        return view('layouts.admin.customer-return.view', compact('allData'));
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $return_data = ReturnCustProduct::orderBy('id','desc')->first();
        if ($return_data == null) {
        	$firstReg = '0';
        	$data['invoice_no'] = $firstReg+1;
        }else{
        	$return_data = ReturnCustProduct::orderBy('id','desc')->first()->invoice_no;
        	$data['invoice_no'] = $return_data+1;
        }
        $data['customers'] = Customer::all();
        $data['date'] = date('Y-m-d');
        return view('layouts.admin.customer-return.add', $data);
    }

    public function store(Request $request)
    {
    	if ($request->cat_id == null) {
        return redirect()->back()->with('error', 'You did not select any product');
    }else{
        
            $return_aci = new ReturnCustProduct();
            $return_aci->invoice_no = $request->invoice_no;
            $return_aci->date = date('Y-m-d', strtotime($request->date));
            $return_aci->description = $request->description;
            $return_aci->status = '0';
            $return_aci->return_by = Auth::user()->id;
            DB::transaction(function() use($request, $return_aci) { 
                if ($return_aci->save()) {
                    $count_cat = count($request->cat_id);
                    for ($i=0; $i < $count_cat; $i++) { 
                        $invoice_details = new ReturnCustProductDetail();
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
                    $payment = new PaymentCustomer();
                    $payment_details = new PaymentCustomerDetail();
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


        

        return redirect()->route('customer.return.to.approve.list')->with('success', 'Data Saved Successfully');
    }

    public function PendingReturnList(){
       $allData = ReturnCustProduct::orderBy('id', 'desc')->orderBy('date', 'desc')->where('status','0')->get();
        return view('layouts.admin.customer-return.pending-list', compact('allData'));
    }
    public function ApproveReturn($id)
    {
        $return = ReturnCustProduct::with(['return_cus_details'])->find($id);
       
       return view('layouts.admin.customer-return.approve', compact('return'));
    
    }

    public function ApproveCustomerReturnStore(Request $request, $id){
        foreach($request->selling_qty as $key => $val){
            $returnaci_detail = ReturnCustProductDetail::where('id', $key)->first();
            $product = Product::where('id', $returnaci_detail->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                return redirect()->back()->with('error', 'Sorry! You approve maximum value');
            }
        }

        $invoice = ReturnCustProduct::find($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status = '1';
        DB::transaction(function() use($request, $invoice, $id){
            foreach($request->selling_qty as $key =>$val){
                $returnaci_detail = ReturnCustProductDetail::where('id', $key)->first();
                $returnaci_detail->status = '1';
                $returnaci_detail->save();
                $product = Product::where('id', $returnaci_detail->product_id)->first();
                $product->quantity = ((float)$product->quantity)+((float)$request->selling_qty[$key]);
                $product->save();
            }

            $invoice->save();
        });

        return redirect()->route('customer.return.to.approve.list')->with('success', 'Invoice Successfully Approved');
    }

        public function delete($id)
    {
        $return = ReturnCustProduct::find($id);
        $return->delete();
        ReturnCustProductDetail::where('invoice_id', $return->id)->delete();
        Payment::where('invoice_id', $return->id)->delete();
        PaymentDetail::where('invoice_id', $return->id)->delete();
        return redirect()->back();
    }

    public function CusReturnApprove($id){
        $cus_return = CustomerReturn::where('id', $id)->where('return_status', 'Pending')->first();
        $cus_return->return_status = 'success';
        $cus_return->save();

        return redirect()->back();
    }
}
