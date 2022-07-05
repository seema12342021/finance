<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\User;
use Auth;
use DB; 
use Validator;
use Mail;

class ResetPasswordController extends Controller
{
    public function ResetPassword(Request $request){
        $validated = Validator::make($request->all(),[
            'email'=>'required|email|exists:users'
        ]);
        if($validated->passes()){ 
            $otp = rand(100000,999999);
            $formdata['email'] = $request->email;
            $formdata['token'] = $otp;
            $res = PasswordReset::insert($formdata);
             if($res){
                $user['to'] = $request->email;
                $user['subject'] = 'Password reset-OTP';
                $html = "$otp is OTP for your Account Password Reset. Do not share this OTP with anyone.";
                Mail::raw($html,function($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject($user['subject']);
                });
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'OTP Sent !']);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>" OTP Not Send"]);
            }

        }else{
            return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }
    }
    public function CheckOtp(Request $request){
        $validated = Validator::make($request->all(),[
            'otp'=>'required'
        ]);
        if($validated->passes()){
        $check = PasswordReset::where(['email'=>$request->email,'token'=>$request->otp])->first();
        if($check){
            $hash = $this->encrypt($request->email,env("APP_NAME"));
           $tkn = User::where('email',$request->email)->update(['remember_token'=>$hash]);
           if($tkn){
                 return response()->json(['status'=>'sucess','status_code'=>200, 'hash'=>$hash ]);
           }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"something went wrong !"]);
           }

         }else{
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Invalid OTP"]);
        }

        }else{
            return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }
    }
    public function PasswordIndex($hash)
    {
        $email = $this->decrypt($hash,env("APP_NAME"));
        $user = User::where(['email'=>$email,'remember_token'=>$hash])->first();
        if($user){
            return view('frontend.update_password',array('hash' => $hash));
        }else{
            return redirect('/');
        }
    }
    public function UpdatePassword(Request $request){
        $validated = Validator::make($request->all(),[
                'form_newPassword'=>'required',
                'form_confirmPassword'=>'required|same:form_newPassword'
               ]);  
        if($validated->passes()){
            $where['remember_token'] = $request->remember_token;
            $email = $this->decrypt($request->remember_token,env("APP_NAME"));
            $formdata['password'] = bcrypt($request->form_confirmPassword);
            $res = User::where($where)->update($formdata);
            if($res){
                PasswordReset::where(['email'=>$email])->delete();
                User::where(['email'=>$email])->update(['remember_token'=>NULL]);
                return response()->json(['status'=>'sucess','status_code'=>200, 'message'=>"Password reset successfully !" ]);
           }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"something went wrong !"]);
           }
        }else{
            return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }


}
