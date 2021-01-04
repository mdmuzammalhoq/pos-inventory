<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/users/details';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function signUp(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers|max:255',
            'phone' => 'required|unique:customers|max:255',
            'password' => 'required',
            'address' => 'required'
            
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;
        $data['market_name'] = '0';
        $data['address'] = $request->address;
        

        $customer_id = DB::table('customers')->insertGetId($data);

        $test = Session::put('id', $customer_id);
        Session::put('name', $request->name);
        return Redirect('/login-check');

      
    }
  
    public function login(Request $request)
    {
    
        $email= $request->email;
        $password= md5($request->password);

        $result = DB::table('customers')->where('email', $email)->where('password', $password)->first();


        if ($result) {
            Session::put('id', $result->id);
            return Redirect::to('login-check');
        }else{
            return Redirect()->back();
        }

    }

   
    

   
    public function logout(Request $request)
    {
        Session::flush();
        return Redirect('/');
    }

    


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
