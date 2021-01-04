<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Auth;

class UnitController extends Controller
{
    
    public function view()
    {
        $allData = Unit::all();
        return view('layouts.admin.unit.view', compact('allData'));
    }

    
    public function add()
    {
        return view('layouts.admin.unit.add');
    }

    
    public function store(Request $request)
    {
         $this->validate($request, [
            'unit_name' => 'required'
        ]);
        $unit = new Unit();
        $unit->unit_name = $request->unit_name;
        $unit->created_by = Auth::user()->id;
        $unit->save();

        return redirect()->route('units.view')->with('success', 'Data saved Successfully');
    }

    
    public function edit($id)
    {
        $edit = Unit::find($id);
        return view('layouts.admin.unit.edit', compact('edit'));
    }

    
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->unit_name = $request->unit_name;
        $unit->updated_by = Auth::user()->id;
        $unit->save();

        return redirect()->route('units.view')->with('success', 'Data updated Successfully');
    }

   
    public function delete($id)
    {
        $unit = Unit::find($id);
        $unit->delete($id);
        return redirect()->route('units.view')->with('success', 'Data updated Successfully');
    }
}
