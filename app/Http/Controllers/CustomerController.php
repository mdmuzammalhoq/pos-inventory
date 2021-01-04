<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Payment;
use App\PaymentDetail;
use Auth;
use Illuminate\Http\Request;
use PDF;


class CustomerController extends Controller
{
  
    public function view()
    {
        $allData = Customer::all();
        return view('layouts.admin.customer.view', compact('allData'));
    }


    public function add()
    {
        return view('layouts.admin.customer.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'market_name' => 'required'
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->market_name = $request->market_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->created_by = Auth::user()->id;
        $customer->save();

        return redirect()->route('customers.view')->with('success', 'Data saved Successfully');
    }

    public function edit($id)
    {
        $edit = Customer::find($id);
        return view('layouts.admin.customer.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->market_name = $request->market_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->updated_by = Auth::user()->id;
        $customer->save();

        return redirect()->route('customers.view')->with('success', 'Data updated Successfully');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete($id);
        return redirect()->route('customers.view')->with('success', 'Data updated Successfully');
    }


    public function creditCustomer(){
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
         return view('layouts.admin.customer.credit-customer', compact('allData'));
    }


    public function creditCustomerPDF(){
        $data['allData'] = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        $pdf = PDF::loadView('layouts.admin.pdf.customer-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function editCustomerInvoice($invoice_id){
        $payment = Payment::where('invoice_id', $invoice_id)->first();
       return view('layouts.admin.customer.edit-invoice', compact('payment'));
    }

    public function updateCustomerInvoice(Request $request, $invoice_id){
       
       if ($request->new_paid_amount < $request->paid_amount) {
           return redirect()->back()->with('error', 'Sorry ! You have paid value greater than maximum');
       }else{
        $payment = Payment::where('invoice_id', $invoice_id)->first();
        $payment_details = new PaymentDetail();
        $payment->paid_status = $request->paid_status;
        if ($request->paid_status == 'full_paid') {
            $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount']+$request->new_paid_amount;
            $payment->due_amount = '0';
            $payment_details->current_paid_amount = $request->new_paid_amount;
        }elseif($request->paid_status == 'partial_paid'){
            $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id', $invoice_id)->first()['due_amount']-$request->paid_amount;
             $payment_details->current_paid_amount = $request->paid_amount;
        }
        $payment->save();
        $payment_details->invoice_id = $invoice_id;
        $payment_details->date = date('Y-m-d', strtotime($request->date));
        $payment_details->save();

        return redirect()->route('customers.credit')->with('success', 'Invoice Updated Successfully');
       }
    }

    public function CustomerInvoiceDetalPDF($invoice_id){
        $data['payment'] = Payment::where('invoice_id', $invoice_id)->first();
        $pdf = PDF::loadView('layouts.admin.pdf.customer-invoice-detail-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function paidCustomer(){
    $allData = Payment::where('paid_status', '!=', 'full_due')->get();
    return view('layouts.admin.customer.paid-customer', compact('allData'));
    }

    public function paidCustomerPDF(){
        $data['allData'] =Payment::where('paid_status', '!=', 'full_due')->get();
        $pdf = PDF::loadView('layouts.admin.pdf.customer-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function CustomerWiseReport(){
        $customrs = Customer::all();
        return view('layouts.admin.customer.customer-wise-report', compact('customrs'));
    }

    public function CustomerWiseCreditReport(Request $request){
        $data['allData'] = Payment::where('customer_id', $request->customer_id)->whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        $pdf = PDF::loadView('layouts.admin.pdf.customer-credit-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function CustomerWisePaidReport(Request $request){
       $data['allData'] =Payment::where('customer_id', $request->customer_id)->where('paid_status', '!=', 'full_due')->get();
        $pdf = PDF::loadView('layouts.admin.pdf.customer-paid-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
