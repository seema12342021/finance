<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB; 
use Validator;

class LoginController extends Controller
{
     public function user_login(Request $request){
        $validated = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ]);
        if($validated->passes()){
            if(Auth::attempt(['email'=>$request->username , 'password' => $request->password])){
                return response()->json(['status_code'=>200 , 'message' => 'Login succesfully']);
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        }else{
            return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }//end of method

    public function user_logout(){
        session()->flush();
        return redirect("/");
    }
}
