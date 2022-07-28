<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NetworkFees; 
use App\Models\Wallet; 
use DB;   
use Validator; 
use DataTables; 

class NetworkFeesController extends Controller
{
    public function index()  
    { 
      $data['title']="Commision";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\networkfees.js');
         $pagedata['Wallet'] = Wallet::where(['is_active'=>1,'is_deleted'=>1])->get(['id','name']);
        $data['content'] = view('admin.networkfees',$pagedata)->render();
        return view('admin.template',$data);
    }
    public function save(Request $request){
      $valid = [
            'wallet'=>'required_if:type,==,1',
            'fees'=>'required',
            'type'=>'required',
            ];  

            $messages = [
              'wallet.required_if'  => 'The wallet field is required'
          ];
        $validated = Validator::make($request->all(),$valid,$messages);
         if($validated->passes()){
            $row = NetworkFees::query();
            if (!empty($request->id)) {
                $row = $row->where('id','!=',$request->id);
            }
            $arr = ['type'=>$request->type,'is_deleted'=>1];
            if($request->type == 1){
                $arr['wallet_id'] = $request->wallet;
            }else{
                $arr['wallet_id'] = null;
            }
            $row = $row->where($arr)->first();
            if (!empty($row)) {
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Data Already Exists!"]);
            }
             $formdata['fees'] = $request->fees;
            $formdata['type'] = $request->type;
            $formdata['created_by'] = 1;
           if($request->type == 1){
            $formdata['Wallet_id'] = $request->wallet;
           }
             if (!empty($request->id)) {
                    $res = NetworkFees::where('id',$request->id)->update($formdata);
                    if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
                    }
                }else{
                    $res = NetworkFees::insertGetId($formdata);
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

 public function show(Request $request){
        if ($request->ajax()) {
            $data = NetworkFees::Leftjoin('wallets','network_fees.Wallet_id','=','Wallets.id')->where('network_fees.is_deleted',1)->orderBy('network_fees.id','DESC')->get(['wallets.name as wallet_name','network_fees.fees','network_fees.type','network_fees.id']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                    if($row->is_active == 1){
                        return '<div class="userDatatable-content " onclick="status_network('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; " class="badge bg-success" id="status'.$row->id.'">Active</span> </div>';
                    }else{
                        return '<div class="userDatatable-content d-inline-block" onclick="status_network('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; "class="badge bg-danger" id="status'.$row->id.'">Deactive</span></div>';
                    }
                })
                    ->addColumn('action', function($row){
                           $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs" onclick="edit_network('.$row->id.')"><span class="fa fa-edit"></span></a>
                           <a class="btn btn-danger btn-xs" onclick="delete_network('.$row->id.')"><span class="fa fa-trash"></span></a>';
                            return $btn;
                    })->addColumn('type', function($row){
                        if ($row->type == 1) {
                            $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Buy</span> </div>';
                        }else{
                            $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Sell</span> </div>';
                        }
                           
                            return $btn;
                    })
                    ->rawColumns(['status','action','type'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

    public function delete(Request $request){
        $id = $request->id;
        if(!empty($id))
        {
            $data['is_deleted'] = 2;
        }
        $row = NetworkFees::where('id',$id)->update($data);

        if(empty($row)){
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't delete !"]);
        }else{
          return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"Deleted Successfully !"]);
        }
    }

    public function edit(Request $request){

        $id = $request->id;

        $data = NetworkFees::where('id',$id)->first();

        return response()->json($data);

    }
    public function status(Request $request){
        $id = $request->id;   
        $status = $request->status;
        if($status == 1){
            $data['is_active'] = 2;
            $data['updated_by'] = 1;
        }
        else if($status == 2){
            $data['is_active'] = 1;
            $data['updated_by'] = 1;
        }
        $row = NetworkFees::where('id',$id)->update($data);
        if(empty($row)){
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't update status !"]);
        }else{
            return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"Update Successfully !"]);
        }
    }//End of function
}//end of class
