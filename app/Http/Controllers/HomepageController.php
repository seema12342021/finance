<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

class HomepageController extends Controller
{
     public function index()
    {
      
      return view('frontend.homepage');
    }//end of method
}//end of function
