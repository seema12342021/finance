<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminLoginController extends Controller
{
    public function Adminlogin(Request $request){
        $validated = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validated->passes()){
            if(Auth::attempt(['email'=>$request->email , 'password' => $request->password])){
                return response()->json(['status_code'=>200]);
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        }else{
            return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }//end of method
}
