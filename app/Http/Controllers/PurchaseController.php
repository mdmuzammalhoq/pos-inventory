<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Unit;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PurchaseController extends Controller
{
    
    public function view()
    {
        $allData = Purchase::orderBy('id', 'desc')->get();
        return view('layouts.admin.purchase.view', compact('allData'));
    }

    
    public function add()
    {
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
       

        return view('layouts.admin.purchase.add', $data);
    }

    
    public function store(Request $request)
    {
        if ($request->cat_id == null) {
            return redirect()->back()->with('error', 'Sorry! you did not select any item');
        }else{
            $count_cat= count($request->cat_id);
            for($i=0; $i<$count_cat; $i++){
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->cat_id = $request->cat_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }
        }
        return redirect()->route('purchase.view')->with('success', 'Data Saved Successfully');
    }

    public function pendingList(){
        $allData = Purchase::orderBy('id', 'desc')->where('status', '0')->get();
        return view('layouts.admin.purchase.pending-list', compact('allData'));
    }

    public function delete($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete($id);
        return redirect()->route('purchase.view')->with('success', 'Data updated Successfully');
    }

    public function approve($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->unit_price = $purchase->unit_price ;
        $product->total_price = $purchase->buying_price ;
        $product->quantity = $purchase_qty;
        if($product->save()){
            DB::table('purchases')->where('id', $id)->update(['status' =>1]);
        }
        return redirect()->route('purchase.pending.list')->with('success', 'Data Approved Successfully');
    
    }

    public function dailyPerchaseReport(){
        return view('layouts.admin.purchase.daily-perchase-report');
    }
    public function dailyPerchaseReportPDF(Request $request){
        $start_date = date('Y-m-d', strtotime($request->start_date));
        $end_date = date('Y-m-d', strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date', [$start_date, $end_date])->where('status', '1')->orderBy('cat_id')->get();
        $data['start_date'] = date('Y-m-d', strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('layouts.admin.pdf.purchase-report-daily-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
