<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 
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
            $data = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses as a_stat','a_stat.id','=','transactions.admin_status')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.payment_type'=>1])->orderBy('transactions.id','DESC')->get(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.payment_status','transactions.admin_status','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','a_stat.name as adminstatus','users.first_name','users.last_name','users.email']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function($row){
                           $btn = '<b>Name : </b> '.ucwords($row->first_name.' '.$row->last_name).'<b><br>Email : </b> '.$row->email;
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs" onclick="show('.$row->id.')"><span class="fa fa-eye"></span></a>';
                            return $btn;
                    })
                    ->addColumn('u_stat', function($row){
                        if ($row->payment_status == 1) {
                            $btn = '<span class="badge bg-success">'.$row->status.'</span>';

                        }else if ($row->payment_status == 3 OR $row->payment_status == 5) {
                            $btn = '<span class="badge bg-danger">'.$row->status.'</span>';

                        }else{
                            $btn = '<span class="badge bg-warning">'.$row->status.'</span>';

                        }
                        return $btn;
                    })

                    ->addColumn('ad_stat', function($row){
                        if ($row->admin_status == 1) {
                            $btn = '<span class="badge bg-success">'.$row->adminstatus.'</span>';

                        }else if ($row->admin_status == 3 OR $row->admin_status == 5) {
                            $btn = '<span class="badge bg-danger">'.$row->adminstatus.'</span>';

                        }else{
                            $btn = '<span class="badge bg-warning">'.$row->adminstatus.'</span>';

                        }
                        return $btn;
                    })
                    ->rawColumns(['user','action','u_stat','ad_stat'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

    public function transactionSell()  
    { 
      $data['title']="Sell Transaction";
   
       $data['css_files'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                                'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
         $data['js_files'] = array('assets\plugins/datatables/jquery.dataTables.min.js',
                                    'assets\plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                                    'assets\plugins/datatables-responsive/js/dataTables.responsive.min.js',
                                    'assets\plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                                    'assets\custom_js\transactionSell.js');
        $data['content'] = view('admin.transactionSell')->render();
        return view('admin.template',$data);
    }

 public function show_transactionSell(Request $request){
        if ($request->ajax()) {
            $data = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')
            ->join('users','users.id','=','transactions.user_id')
            ->join('cryptos','cryptos.id','=','transactions.crypto')
            ->join('statuses','statuses.id','=','transactions.payment_status')
            ->join('statuses as a_stat','a_stat.id','=','transactions.admin_status')
            ->where(['transactions.is_deleted'=>1,'transactions.payment_type'=>2])
            ->orderBy('transactions.id','DESC')
            ->get(['transactions.id','transactions.transaction_id','transactions.payment_status','transactions.admin_status','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','a_stat.name as adminstatus','users.first_name','users.last_name','users.email']);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function($row){
                           $btn = '<b>Name : </b> '.ucwords($row->first_name.' '.$row->last_name).'<b><br>Email : </b> '.$row->email;
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a herf="javascript:;" class="btn btn-primary btn-xs" onclick="show('.$row->id.')"><span class="fa fa-eye"></span></a>';
                            return $btn;
                    })
                    ->addColumn('u_stat', function($row){
                        if ($row->payment_status == 1) {
                            $btn = '<span class="badge bg-success">'.$row->status.'</span>';

                        }else if ($row->payment_status == 3 OR $row->payment_status == 5) {
                            $btn = '<span class="badge bg-danger">'.$row->status.'</span>';

                        }else{
                            $btn = '<span class="badge bg-danger">'.$row->status.'</span>';

                        }
                        return $btn;
                    })

                    ->addColumn('ad_stat', function($row){
                        if ($row->admin_status == 1) {
                            $btn = '<span class="badge bg-success">'.$row->adminstatus.'</span>';

                        }else if ($row->admin_status == 3 OR $row->admin_status == 5) {
                            $btn = '<span class="badge bg-danger">'.$row->adminstatus.'</span>';

                        }else{
                            $btn = '<span class="badge bg-warning">'.$row->adminstatus.'</span>';

                        }
                        return $btn;
                    })
                    ->rawColumns(['user','action','u_stat','ad_stat'])
                    ->make(true);
        }
        return view('admin.template',$data);
    }//end of method

    public function getTransactionDetails($id){
        $data = Transaction::query();
        $data = $data->join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.id'=>$id])->orderBy('transactions.id','DESC')->first(
            ['transactions.id','transactions.total_inr_price','transactions.image','transactions.response_data','transactions.admin_status','transactions.created_at','transactions.total_crypto','transactions.payment_status','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.last_name','users.email','users.mobile_number'
        ]);
        return $data;
    }

    public function update_status_sell(Request $request){
        
            $valid = [
            'status2'=>'required',
            ];  
        
        $validated = Validator::make($request->all(),$valid);
         if($validated->passes()){
           
            $formdata['admin_status'] = $request->status2;
            if (!empty($request->status)) {
                $formdata['payment_status'] = $request->status;
            }
            
            $formdata['created_by'] = 1;
             if (!empty($request->id)) {
                    $res = Transaction::where('id',$request->id)->update($formdata);
                    if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
                    }
                }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }


}//end of class
