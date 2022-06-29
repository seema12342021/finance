<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request; 
use App\Models\Project; 
use DB;   
use Validator; 
use DataTables; 
 
class Projectcontroller extends MYController 
{
     function __construct(){  
     }
    public function index()  
    { 
      $data['title']="project";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\project.js');
        $data['content'] = view('admin.project')->render();
        return view('admin.template',$data);
    }
    public function saveProject(Request $request){
        if(!empty($request->id)){
            $valid = [
            'category'=>'required',
            'title'=>'required',
            'description'=>'required',
            'projecturl'=>'required',
            //'file'=>'required|mimes:jpeg,png'
            ];
        }else{ 
            $valid = [
            'category'=>'required',
            'title'=>'required',
            'description'=>'required',
            'projecturl'=>'required',
            'file'=>'required|mimes:jpeg,png'
            ];  
        }
        
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
            $file = $request->file('file');  
            if(!empty($file)){
            $fileName = url('uploads/projectimg').'/'.time().'.'.$file->getClientOriginalName();  
            $file->move(public_path('uploads/projectimg'), $fileName);
            $formdata['image'] = $fileName;
            }
            $formdata['category'] = $request->category;
            $formdata['title'] = $request->title;
            $formdata['description'] = $request->description;
            $formdata['project_url'] = $request->projecturl;
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['created_by'] = 1;
           // $res = Project::insertGetId($formdata); 
             if (!empty($request->id)) {
                    $res = Project::where('id',$request->id)->update($formdata);
                    if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
                    }
                }else{
                    $res = Project::insertGetId($formdata);
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

 public function showProject(Request $request){
        if ($request->ajax()) {
           //$data = Project::select('*');
            $data=Project::where('is_deleted',1)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                    if($row->is_active == 1){
                        return '<div class="userDatatable-content " onclick="status_project('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; " class="badge bg-success" id="status'.$row->id.'">Active</span> </div>';
                    }else{
                        return '<div class="userDatatable-content d-inline-block" onclick="status_project('.$row->id.','.$row->is_active.')"> <span style=" cursor: pointer; "class="badge bg-danger" id="status'.$row->id.'">Deactive</span></div>';
                    }
                })
                    ->addColumn('action', function($row){
                           $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs" onclick="edit_project('.$row->id.')"><span class="fa fa-edit"></span></a>
                           <a herf="javascript:;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-default" onclick="view('.$row->id.')"><span class="fa fa-eye"></span></a>
                           <a class="btn btn-danger btn-xs" onclick="delete_project('.$row->id.')"><span class="fa fa-trash"></span></a>';
                            return $btn;
                    })->addColumn('img', function($row){
                           $btn = '<a href="'.$row->image.'" target="_blank"><img style="height: 50px;width: 50px;border-radius: 50%;" src="'.$row->image.'"></a>';
                            return $btn;
                    })
                    ->rawColumns(['status','action','img'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

    public function deleteProject(Request $request){
        $id = $request->id;
        if(!empty($id))
        {
            $data['is_deleted'] = 2;
        }
        $row = Project::where('id',$id)->update($data);

        if(empty($row)){
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't delete !"]);
        }else{
          return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"delete Successfully !"]);
        }
    }

    public function editProject(Request $request){

        $id = $request->id;

        $data = Project::where('id',$id)->first();

        return response()->json($data);

    }
    public function statusProject(Request $request){
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
        $row = Project::where('id',$id)->update($data);
        if(empty($row)){
            return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't update status !"]);
        }else{
            return response()->json(['status'=>'sucess','status_code'=>200,'message'=>"Update Successfully !"]);
        }
    }//End of function
    public function viewModel(Request $request){ 

        $id = $request->id;

        $data = Project::where('id',$id)->first();

        return response()->json($data);
    }
}// end of class