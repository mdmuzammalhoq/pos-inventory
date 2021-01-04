<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Auth;
use Session;

class SupplierController extends Controller
{

    public function view()
    {
        $allData = Supplier::all();
        return view('layouts.admin.supplier.view', compact('allData'));
    }


    public function add()
    {
        return view('layouts.admin.supplier.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile_no = $request->phone;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success', 'Data saved Successfully');

    }


    public function edit($id)
    {
        $edit = Supplier::find($id);
        return view('layouts.admin.supplier.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile_no = $request->phone;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success', 'Data updated Successfully');
    }


    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete($id);
        return redirect()->route('suppliers.view')->with('success', 'Data updated Successfully');

    }
}
