<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;

class ReturnController extends Controller
{
   
    public function insert_return(Request $request)
    {

       
    

             $data = array();
            $data['prod_serial']=$request->prod_serial;
            $data['prod_name']=$request->prod_name;
            $data['netwight']=$request->netwight;
            $data['purchagequantity']=$request->purchagequantity;
            $data['returnquantity']=$request->returnquantity;
            $data['catid']=$request->catid;
            $data['unitprice']=$request->unitprice;
            

             $r = DB::table('returns')->insert($data);

             echo $r;
           
           if ($data) {
                   $notification=array(
                    'message'=>'Return  Added successfully.',
                    'alert-type'=>'success'
                );
                   return Redirect()->back()->with($notification);
               }
            else{
                //return Redirect()->back();

            }
        }

    

   
    public function return_all()
    {
        return view('frontpages.return');
    }


  
    public function returnLogin()
    {
         return view('frontpages.check-out');
    }

   
    public function check_return()
    {
        return view('frontpages.return');
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
