<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Auth_Admin extends Controller
{
    //
    public function login(){
        return view('adminlogin');
    }
    public function loginrequest(Request $req){
        $data =[
            'email'=> $req->email,
            'password'=>$req->password,
        ];
        if(Auth::guard('admin')->attempt($data)){
            return redirect('admin/index');
        }
        else
        {           
            Session::flash("success","Invalid Email and Password");
    
             return redirect('adminlogin');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('adminlogin');
    }
}
