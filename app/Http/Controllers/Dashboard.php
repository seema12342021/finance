<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends MYController
{
    function __construct(){
        //$this->add_external_css(array());
        //$this->add_external_js(array('assets/custom_js/testimonial.js'));
        //$this->is_login();  
    }
 
    public function index(){
        $data = $this->includes;
        $data['title'] = "Dashboard";
        $data['content'] = view('admin/dashboard')->render();
        return view('admin.template',$data);
    }// End of Function

}
