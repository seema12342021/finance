<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\CommisionFees;
use App\Models\NetworkFees;
use App\Models\TransactionBuy;
use Validator;

class CheckoutController extends Controller
{
    public function index(request $request)
    {
      // dd(json_decode($request->data));
      $users['wallet'] = Wallet::get();
      $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $users['network_buy'] = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $users['fname'] = substr(Auth::user()->first_name,0,1);
      $users['lname'] = substr(Auth::user()->last_name,0,1);
      $users['name'] = Auth::user()->first_name;
      $users['data'] = json_decode($request->data);
      return view('frontend.checkout',$users);
    }

    public function saveTransaction(Request $request){
      // dd($request->post());
        
            $valid = [
            'w_address'=>'required',
            ];  
        
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
            $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
           
           
            $formdata['user_id'] = $request->fees;
            $formdata['crypto'] = $request->type;
            $formdata['pay_amount'] = $request->inr+$row->fees+$request->fee;
            $formdata['receive_amount'] = $request->crypto;
            $formdata['payment_mode'] = 'upi';
            $formdata['wallet_address'] = $request->w_address;
            $formdata['wallet_id'] = $request->wallet;
            $formdata['payment_status'] = 1;
             
            $res = TransactionBuy::insertGetId($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Save Successfully !']);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Save !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }

}
