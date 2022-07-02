<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\KycData; 
use DB;   
use Validator; 
use DataTables; 

class UserListController extends Controller
{
    public function index()  
    { 
      $data['title']="User List";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\userlist.js');
        $data['content'] = view('admin.user_list')->render();
        return view('admin.template',$data);
    }
     public function ShowUserList(Request $request){
        if ($request->ajax()) {
            $data= User::leftjoin('kyc_datas','users.id','=','kyc_datas.user_id')->where('users.user_type',2)->orderBy('users.id','DESC')->get(['users.id','users.first_name','users.last_name','users.email','users.is_active','kyc_datas.proof_type','kyc_datas.is_approved','kyc_datas.front_img','kyc_datas.back_img']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                    if($row->is_active == 1){
                        return '<div class="userDatatable-content " onclick="status_user_list('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; " class="badge bg-success" id="status'.$row->id.'">Active</span> </div>';
                    }else{
                        return '<div class="userDatatable-content d-inline-block" onclick="status_user_list('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; "class="badge bg-danger" id="status'.$row->id.'">Deactive</span></div>';
                    }
                        })->addColumn('name', function($row){
                          $btn =ucwords($row->first_name.' '.$row->last_name);
                          return $btn;
                   })->addColumn('approval', function($row){
                    if($row->proof_type)
                    {
                        if($row->is_approved == 1){
                            $status = 'Approved';
                        }else if($row->is_approved == 2){
                            $status = 'Disapproved';
                        }else{
                            $status = 'Pending approval';
                        }
                        $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-default" onclick="view_modal('.$row->id.')"><span class="badge bg-success">'.$status.'</span></a>';
                        
                            return $btn;
                    }else{
                         return 'N/A';
                    }
                    })->addColumn('proof', function($row){
                    if($row->proof_type)
                    {
                            if($row->proof_type == 1){
                                $ptype = 'Driving License';
                            }else if($row->proof_type == 2){
                                $ptype = 'Passport';
                            }else if($row->proof_type == 3){
                                 $ptype = 'Aadhar Card';
                            }
                             $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs"><span class="badge bg-success">'.$ptype.'</span></a>
                            <a class="btn btn-success btn-xs" href="'.url('uploads/kyc',[$row->front_img]).'" download><span class="fa fa-download"></span></a>
                            <a class="btn btn-success btn-xs" href="'.url('uploads/kyc',[$row->back_img]).'" download><span class="fa fa-download"></span></a>';
                            return $btn;
                        
                    }else{
                         return 'N/A';
                    }
                           
                    })
                    ->rawColumns(['status','approval','proof','name'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method
      public function UserListStatus(Request $request){
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
        $row = User::where('id',$id)->update($data);
        if(empty($row)){
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't update status !"]);
        }else{
            return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"Update Successfully !"]);
        }
    }//End of function
    public function SendApproval(Request $request){
         $validated = Validator::make($request->all(),[
            'approval'=>'required'
         ]);
         if($validated->passes()){
            $formdata['is_approved'] = $request->approval;
            $res = KycData::where('user_id',$request->id)->update($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"Approved Successfully!"]);
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Approved failed!"]);
            }
         }else{
            return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
         }
    }

}
