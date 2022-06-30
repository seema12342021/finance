<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    { 
      $users['fname'] = substr(Auth::user()->first_name,0,1);
      $users['lname'] = substr(Auth::user()->last_name,0,1);
        return view('frontend.checkout', $users);
    }
}
