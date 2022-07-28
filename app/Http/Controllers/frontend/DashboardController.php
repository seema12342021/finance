<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,KycData};
use App\Models\CommisionFees;
use App\Models\Transaction;
use App\Models\Crypto;
class DashboardController extends Controller
{
    public function __construct(){
        $this->getCryptoValue();
    }

    public function index($hash = '') 
    {  
        if($hash){
            $data = decrypt($hash,env('APP_KEY'));
            $users['icon'] = Crypto::where(['is_active'=>1,'is_deleted'=>1,'name'=>$data['currency_name']])->first(['id','name','icon']);
            $users['data'] = (object)$data;

        }

        //dd($this->crypto_price);


        $users['title']="Dashboard";
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['kyc'] = KycData::where('user_id',Auth::user()->id)->first();
        $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
        $users['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
        $users['crypto_price'] = $this->crypto_price;
        $users['transaction'] = Transaction::Leftjoin('wallets','wallets.id','=','transactions.wallet_id')->Leftjoin('cryptos','cryptos.id','=','transactions.crypto')->Leftjoin('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->limit(5)->get(['transactions.id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status',]);
        $users['currency'] = Crypto::where(['is_active'=>1,'is_deleted'=>1])->get(['id','name']);
        return view('frontend.dashboard',$users);
    }
    public function getCrypto(Request $request){
        $this->getCryptoValue($crypto = 'USDT' , $flag = false); 
        $currency = $request->currency_name; 
        $type = $request->type;
        $icon = Crypto::where(['is_active'=>1,'is_deleted'=>1,'name'=>$currency])->first('icon');
        $current_price = $this->getCryptoValue($currency,true);
        if($type == 1) {
            $commision_buy = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
            $crypto_price = (((@$commision_buy->fees / 100) * $current_price)+$current_price);
        } else {
            $commision_sell = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
            $crypto_price = ($current_price-((@$commision_sell->fees / 100) * $current_price));
        }


        return response()->json(['status'=>'sucess','status_code'=>200, 'current_price'=>$crypto_price, 'icon'=>$icon->icon]);

    }//end of method
    //  public function getSellCrypto(Request $request){
    //     $currency = $request->currency_name;
    //     $current_price = $this->getCryptoValue($currency,true);
    //     return response()->json(['status'=>'sucess','status_code'=>200, 'current_price'=>$current_price]);

    // }//end of method
}//end of function
