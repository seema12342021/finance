<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CommisionFees;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index() 
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
        $users['commision_sell'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>2])->first();

        $users['transaction'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->get(['transactions.id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status',]);
        // dd($users['transaction']);
        return view('frontend.dashboard',$users);
    }
   
}
