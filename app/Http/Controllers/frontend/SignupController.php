<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB; 
use Validator; 
 
class SignupController extends Controller
{ 
     public function saveSignUp(Request $request){
            $validated = Validator::make($request->all(),[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password'
           ]);
            if($validated->passes()){
            $formdata['first_name'] = $request->firstname;
            $formdata['last_name'] = $request->lastname;
            $formdata['email'] = $request->email;
            $formdata['password'] = bcrypt($request->confirm_password);
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['user_type'] = 2;
            $formdata['created_by'] = 1;
            $res = User::insertGetId($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'Sign Up successfully!']);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't login !"]);
            }
        }else{
                return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }
    }

}
