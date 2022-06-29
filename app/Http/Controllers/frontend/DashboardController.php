<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() 
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
    return view('frontend.dashboard',$users);
    }
}
