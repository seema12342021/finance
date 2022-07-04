<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\CommisionFees;
use App\Models\NetworkFees;
use App\Models\Transaction;
use Validator;

class CheckoutController extends Controller
{
    public function index(request $request)
    {
      // dd(json_decode($request->data));
      $users['title']="checkout";
      $users['wallet'] = Wallet::get();
      $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $users['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
      $users['network_buy'] = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $users['network_sell'] = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
      $users['fname'] = substr(Auth::user()->first_name,0,1);
      $users['lname'] = substr(Auth::user()->last_name,0,1);
      $users['name'] = Auth::user()->first_name;
      $users['data'] = json_decode($request->data);
      return view('frontend.checkout',$users);
    }

    public function saveTransaction(Request $request){
        
            $valid = [
            'w_address'=>'required',
            'form_is_wallet_acknowledged'=>'required',
            ];  
        
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
            if ($request->payment_type == 1) {
                $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
                $formdata['crypto_price'] = (($row->fees / 100) * 83.92)+83.92;
                $formdata['total_inr_price'] = $request->inr+$row->fees+$request->fee;
            }else{
                $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
                $formdata['crypto_price'] = 83.92-(($row->fees / 100) * 83.92);
                $formdata['total_inr_price'] = $request->inr-($row->fees+$request->fee);

            }
           
           
            $formdata['user_id'] = Auth::user()->id;
            $formdata['transaction_id'] = 'ET'.md5(Auth::user()->email.time());
            $formdata['crypto'] = 1;
            $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first(); 
            $network_fees = @$row->fees?$row->fees:1;         
            $formdata['user_id'] = Auth::user()->id;
            $formdata['transaction_id'] = 'ET'.md5(Auth::user()->email.time());
            $formdata['crypto'] = 1;
            $formdata['total_inr_price'] = $request->inr+$network_fees+$request->fee;

            $formdata['total_crypto'] = $request->crypto;
            $formdata['commision'] = $network_fees;
            $formdata['actual_crypto_price'] = 82.92;

            $formdata['payment_mode'] = $request->payment_mode;

            $formdata['crypto_price'] = (($network_fees / 100) * 83.92)+83.92;
            $formdata['payment_mode'] = 'upi';

            $formdata['wallet_address'] = $request->w_address;
            $formdata['wallet_id'] = $request->wallet;
            $formdata['payment_status'] = 2;
            $formdata['payment_type'] = $request->payment_type;
             
            $res = Transaction::insertGetId($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Save Successfully !','id'=>$res]);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Save !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }

}
