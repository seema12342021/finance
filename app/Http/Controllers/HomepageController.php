<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\{Transaction,CommisionFees};

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
      return view('frontend.homepage',$data);
    }//end of method
}//end of function
