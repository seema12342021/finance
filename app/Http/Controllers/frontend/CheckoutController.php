<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\{CommisionFees,Crypto};
use App\Models\NetworkFees;
use App\Models\Transaction;
use App\Models\KycData;
use Validator;

class CheckoutController extends Controller
{
    // public function __construct(){
    //     $this->getCryptoValue();
    // }
    public function goCheckout(Request $request){

        $hash = encrypt($request->data,env('APP_KEY'));
        return response()->json(['status'=>'sucess','status_code'=>200,'location'=>url('checkout',[$hash])]);
    }

    public function index($hash){ 
       $data = decrypt($hash,env('APP_KEY'));
        $commision_fees_buy = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first(['fees','type']);
       $check_price_buy = ((($commision_fees_buy->fees / 100) * session("crypto_price"))+ session("crypto_price"))*$data['crypto'];
       //dd(session("crypto_price"));
       //dd($data);

       //sell
       $commision_fees_sell = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first(['fees','type']);
       $check_price_sell = (session("crypto_price")-(($commision_fees_sell->fees / 100) * session("crypto_price")))*$data['crypto'];
       //dd($data,$check_price_sell,$check_price_sell1);
        //dd($data,$check_price_sell);

       if($commision_fees_buy->type==1){
         $data['inr'] = $check_price_buy;
       }else{
         $data['inr'] = $check_price_sell;
          }
              $users['title']="checkout";
              $users['wallet'] = Wallet::get();
              $users['selected_crypto'] = Crypto::where(['is_deleted'=>1,'is_active'=>1,'id'=>$data['currency']])->first();
              $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
              $users['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
              $users['network_buy'] = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
              $users['crypto_price']  =  $data['inr'];
              $users['network_sell'] = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
              $users['fname'] = substr(Auth::user()->first_name,0,1);
              $users['lname'] = substr(Auth::user()->last_name,0,1);
              $users['name'] = Auth::user()->first_name;
              $users['data'] = (object)$data;
              return view('frontend.checkout',$users);
         
    }

    public function saveTransaction(Request $request){
        $valid = [
            'w_address'=>'required',
            'form_is_wallet_acknowledged'=>'required',
        ];  
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
            $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
            if($kyc_data){
                if($kyc_data->is_approved != 1){
                    return response()->json(['status'=>'error','status_code'=>201,'message'=>"Your KYC Approval is pending !"]);
                }
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Please complete your KYC first !"]);
            }
            if ($request->payment_type == 1) {
                $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
                $formdata['crypto_price'] = (($row->fees / 100) * session("crypto_price"))+session("crypto_price");
                $formdata['total_inr_price'] = $request->inr+$row->fees+$request->fee;
            }else{
                $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
                $formdata['crypto_price'] = session("crypto_price")-(($row->fees / 100) * session("crypto_price"));
                $formdata['total_inr_price'] = $request->inr-($row->fees+$request->fee);

            }
           
            $formdata['user_id'] = Auth::user()->id;
            $formdata['transaction_id'] = 'ET'.md5(Auth::user()->email.time());
            //$formdata['crypto'] = $data['currency'];
            $row = NetworkFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first(); 
            $network_fees = @$row->fees?$row->fees:1;         
            $formdata['user_id'] = Auth::user()->id;
            $formdata['transaction_id'] = 'ET'.md5(Auth::user()->email.time());
            $formdata['crypto'] = $request->currency_value;
            $formdata['total_inr_price'] = $request->inr+$network_fees+$request->fee;

            $formdata['total_crypto'] = $request->crypto;
            $formdata['commision'] = $network_fees;
            $formdata['actual_crypto_price'] = session("crypto_price");

            $formdata['payment_mode'] = $request->payment_mode;

            $formdata['crypto_price'] = (($network_fees / 100) * session("crypto_price"))+session("crypto_price");

            $formdata['wallet_address'] = $request->w_address;
            $formdata['wallet_id'] = $request->wallet;
            $formdata['payment_status'] = 2;
            $formdata['payment_type'] = $request->payment_type;
             
            $res = Transaction::insertGetId($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Save Successfully !','id'=>encrypt($res,env("APP_KEY"))]);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Save !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }//end of method
    public function getWallet(Request $request){
        $wallet_id = $request->wallet_id;
        $data = NetworkFees::where(['wallet_id'=>$wallet_id, 'type' => 1,'is_active'=>1,'is_deleted'=>1])->first(['id','fees']);
        if($data){
                 return response()->json(['status'=>'sucess','status_code'=>200, 'data'=>$data]);
        }else{
            return response()->json(['status'=>'error','status_code'=>201]);
        }
       
    }//end of method


}//end of class
