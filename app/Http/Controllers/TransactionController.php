<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionBuy; 
use App\Models\TransactionSell; 
use DB;   
use Validator; 
use DataTables; 

class TransactionController extends Controller
{
    public function transactionBuy()  
    { 
      $data['title']="Buy Transaction";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\transactionBuy.js');
        $data['content'] = view('admin.transactioBuy')->render();
        return view('admin.template',$data);
    }

 public function show_transactionBuy(Request $request){
        if ($request->ajax()) {
           //$data = Project::select('*');
            $data=TransactionBuy::where('is_deleted',1)->orderBy('id','DESC')->get();
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
                    })
                    // ->addColumn('type', function($row){
                    //     if ($row->type == 1) {
                    //         $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Buy</span> </div>';
                    //     }else{
                    //         $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Sell</span> </div>';
                    //     }
                           
                    //         return $btn;
                    // })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

    public function transactionSell()  
    { 
      $data['title']="Buy Transaction";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\transactionBuy.js');
        $data['content'] = view('admin.transactionSell')->render();
        return view('admin.template',$data);
    }

 public function show_transactionSell(Request $request){
        if ($request->ajax()) {
           //$data = Project::select('*');
            $data=TransactionSell::where('is_deleted',1)->orderBy('id','DESC')->get();
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
                    })
                    // ->addColumn('type', function($row){
                    //     if ($row->type == 1) {
                    //         $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Buy</span> </div>';
                    //     }else{
                    //         $btn = '<div class="userDatatable-content"> <span class="badge bg-primary" >Sell</span> </div>';
                    //     }
                           
                    //         return $btn;
                    // })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

}
