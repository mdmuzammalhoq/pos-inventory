<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;
use PDF;

class StockController extends Controller
{
    public function stockReport()
    {
        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('cat_id', 'asc')->get();
        return view('layouts.admin.stock.report', compact('allData'));
    }

   
    public function stockReportPDF()
    {
         $data['allData'] = Product::orderBy('supplier_id', 'asc')->orderBy('cat_id', 'asc')->get();
        $pdf = PDF::loadView('layouts.admin.pdf.stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }   


    public function stockReportSPWise()
    {
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        return view('layouts.admin.stock.supplier-product-report', $data);
    } 


    public function stockReportSupplierWisePDF(Request $request)
    {
        $data['allData'] = Product::orderBy('supplier_id', 'asc')->orderBy('cat_id', 'asc')->where('supplier_id', $request->supplier_id)->get();
        $pdf = PDF::loadView('layouts.admin.pdf.supplier-wise-stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function stockReportProductWisePDF(Request $request)
    {
        $data['product'] = Product::where('cat_id', $request->cat_id)->where('id', $request->product_id)->first();
        $pdf = PDF::loadView('layouts.admin.pdf.product-wise-stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
