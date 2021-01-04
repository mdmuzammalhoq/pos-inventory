<?php

namespace App\Http\Controllers\front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);

        $search_text = $request->search;
        

        $product = Product::orderBy('id', 'desc')
                    ->where('product_name', 'like', '%'.$search_text.'%')
                    ->orWhere('serial_cat', 'like', '%'.$search_text.'%')
                    ->orWhere('serial_cat', 'like', '%'.$search_text.'%')
                    ->get();
        return view('layouts.front.frontpages.inc.search', compact('product'));
    }

   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
