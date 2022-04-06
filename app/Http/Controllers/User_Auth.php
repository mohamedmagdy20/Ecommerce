<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_Auth extends Controller
{
    public function userlogin(){
        return view("userlogin");
    }
    public function userrequest(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data =[
            'email'=> $request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($data)){
            return redirect("user/index");
        }
        else{
            return redirect("userlogin");
        }
    }
}
