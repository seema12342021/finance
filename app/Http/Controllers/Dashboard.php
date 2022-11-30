<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Validator;

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
    public function account(){
        $data['title']="Commision";
   
        $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
        $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\account.js');
        $page_data['account'] = Account::first();
        $data['content'] = view('admin.account',$page_data)->render();
        return view('admin.template',$data);
    }// End of Function
    
    public function saveAccount(Request $request){
        
        $valid = [
            'holder_name'=>'required',
            'account_number'=>'required',
            'bank_name'=>'required',
            'ifsc_code'=>'required',
        ];  
        
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
            $formdata['holder_name'] = $request->holder_name;
            $formdata['account_number'] = $request->account_number;
            $formdata['bank_name'] = $request->bank_name;
            $formdata['ifsc_code'] = $request->ifsc_code;
            $formdata['created_by'] = \Auth::user()->id;
             if (!empty($request->id)) {
                    $res = Account::where('id',$request->id)->update($formdata);
                    if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
                    }
                }else{
                    $res = Account::insertGetId($formdata);
                    if($res){
                        return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Save Successfully !']);
                     }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Save !"]);
                    }
                }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }

}
