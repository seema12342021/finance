<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CommisionFees;

class DashboardController extends Controller
{
    public function index() 
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['commision_buy'] = CommisionFees::where(['is_deleted'=>1,'is_active'=>1,'type'=>1])->first();
        return view('frontend.dashboard',$users);
    }
   
}
