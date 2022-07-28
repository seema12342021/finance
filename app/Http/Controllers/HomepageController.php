<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\{Transaction,CommisionFees};
use App\Models\Crypto;

class HomepageController extends Controller
{
    public function __construct(){
        $this->getCryptoValue();
    }
    public function index()
    {
      $data['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $data['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
      $data['crypto_price'] = $this->crypto_price;
      $data['currency'] = Crypto::where(['is_active'=>1,'is_deleted'=>1])->get(['id','name','icon']);
      return view('frontend.homepage',$data);
    }//end of method

     public function getHomeCrypto(Request $request){
        $this->getCryptoValue($crypto = 'USDT' , $flag = false); 
        $currency = $request->currency_name;
        $type = $request->type;

        $current_price = $this->getCryptoValue($currency,true);
        $icon = Crypto::where(['is_active'=>1,'is_deleted'=>1,'name'=>$currency])->first('icon');
        
        if($type == 1) {
            $commision_buy = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
            $crypto_price = (((@$commision_buy->fees / 100) * $current_price)+$current_price);
        } else {
            $commision_sell = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
            $crypto_price = ($current_price-((@$commision_sell->fees / 100) * $current_price));
        }
        

        return response()->json(['status'=>'sucess','status_code'=>200, 'current_price'=>$crypto_price,'icon'=>$icon->icon]);

    }//end of method

}//end of function
