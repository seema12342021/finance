<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\{Transaction,CommisionFees};

class HomepageController extends Controller
{
    public function index()
    {
      $data['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
      $data['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();
      $price = $this->getCryptoValue();
      if($price){
        $data['crypto_price'] = $price;
      }else{
        $res = Transaction::orderBy("id","DESC")->first();
        $data['crypto_price'] = $res->actual_crypto_price;
      }
      return view('frontend.homepage',$data);
    }//end of method
}//end of function
