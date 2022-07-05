<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,KycData};
use App\Models\CommisionFees;
use App\Models\Transaction;

class HomepageController extends Controller
{
     public function index()
    {
        $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
        $users['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();

      return view('frontend.homepage',$users);
    }//end of method
}//end of function
