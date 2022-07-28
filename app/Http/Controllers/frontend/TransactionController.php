<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use GuzzleHttp\Client;
use DataTables; 
use App\Models\Wallet;
use Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['transaction'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->get(['transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status']);
        return view('frontend.transaction',$users);
    }

    public function show_detail_transaction($id)
    { 
        $id = decrypt($id,env('APP_NAME'));
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['transaction_detail'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);
        return view('frontend.transaction_detail',$users);
    }

    public function payment_page($hash)
        { 
            $id = decrypt($hash,env("APP_KEY"));
            $users['fname'] = substr(Auth::user()->first_name,0,1);
            $users['lname'] = substr(Auth::user()->last_name,0,1);
            $users['name'] = Auth::user()->first_name;
            $users['wallet'] = Wallet::get();
            $users['transaction_detail'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.payment_type','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);
            $users['hash'] = $hash;
            if ($users['transaction_detail']->payment_type == 1) {
                // code...
                return view('frontend.payment',$users);
            }else{
                return view('frontend.payment_sell',$users);
            }

        }

    public function show_transaction(Request $request){
        
        if ($request->ajax()) {
            $data=Transaction::query();
            if (@$request->type == 2) {
                $data = $data->where(['transactions.payment_type'=>2]);
            }else{
                $data = $data->where(['transactions.payment_type'=>1]);
            }
            $data = $data->join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->get(['transactions.id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('date', function($row){
                            return date('d/m/Y',strtotime($row->created_at));
                    })->addColumn('pay_mode', function($row){
                           $btn = '<img src="/images/icons/upi.png">';
                            return $btn;
                    })->addColumn('status', function($row){
                            $btn = '<span class="grey status_label">'.$row->status.'</span>';
                                                  
                            return $btn;
                    })->addColumn('redirect', function($row){
                            $btn = '<a data-toggle="tooltip"  class="custom-tooltip" href="'.route('show_detail_transaction',['id'=>$row->id]).'" data-placement="bottom" data-id="" data-original-title="Details"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
                                                  
                            return $btn;
                    })
                    ->rawColumns(['pay_mode','status','redirect'])
                    ->make(true);
        }
    }//end of method


     public function payment_gateway(Request $request){
        $id = decrypt($request->hash,env("APP_KEY"));
        $users = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email','users.mobile_number']);
        if (empty($users->mobile_number)) {
            return redirect('/user_setting')->with('error', 'Please Update Your Mobile'); 
        }
        if($users){
            $custname = $users->first_name;
            $custemail = 'nandanakestech@gmail.com';
            $custmobile = $users->mobile_number;
            $custaddressline1 = 'charbagh';
            $custaddressline2 ='gomtinagar';
            $custaddresscity ='lucknow';
            $custaddressstate = 'uttar pradesh';
            $custaddresscountry = 'India';
            $custaddresspostalcode = '226008';
            $orderid = $users->transaction_id;
            $ordervalue = $users->total_inr_price;
            $customerIdvalue = false;
            ///Create Customer From API Pass Customer Parameters toenv('PAYMENT_BASE_URL'). API/v1/CreateCustomer
            $body = array(
                'KP_ENVIRONMENT' => env('KP_ENVIRONMENT'),
                'KPMID' => env('KPMID'),
                'KPMIDKEY' => env('KPMIDKEY'),
                'CUST_NAME' => $custname,
                'CUST_EMAIL' => $custemail,
                'CUST_MOBILE' => $custmobile,
                'CUST_ADDRESS_LINE1' => $custaddressline1,
                'CUST_ADDRESS_LINE2' => $custaddressline2,
                'CUST_ADDRESS_CITY' => $custaddresscity,
                'CUST_ADDRESS_STATE' => $custaddressstate,
                'CUST_ADDRESS_COUNTRY' => $custaddresscountry,
                'CUST_ADDRESS_POSTAL_CODE' => $custaddresspostalcode
            );
            $client = new Client();
            $res = $client->request('POST', env('PAYMENT_BASE_URL').'API/v1/CreateCustomer',['form_params' => $body]);
             if($res->getStatusCode() == 200){
                    $data = $res->getBody();
                    //Make Variable of Customer ID Received From API Call
                    $response = json_decode(($data),true);
                    $CustomerAPIStatus = $response["status"];
                    if ($CustomerAPIStatus == 'success') {
                        $customerIdvalue = $response["CUST_KP_ID"];
                    } else {
                        //return $response;
                        return redirect('/user_setting')->with('error', 'Please Update Your Profile'); 
                    }
                }else{
                     return redirect('/user_setting')->with('error', 'Please Update Your Profile'); 
                    //return ['status' =>'error' , 'status_code' => 201 , 'message' => 'Something Went Wrong !'];
                }
            if($customerIdvalue){
                $order_body = array(
                    'KP_ENVIRONMENT' => env('KP_ENVIRONMENT'),
                    'KPMID' => env('KPMID'),
                    'KPMIDKEY' => env('KPMIDKEY'),
                    'CUST_KP_ID' => $customerIdvalue,
                    'TXN_CURRENCY' => env('TXN_CURRENCY'),
                    'TXN_AMOUNT' => $ordervalue,
                    'ORDER_ID' => $orderid
                );
                $client = new Client();
                $res = $client->request('POST', env('PAYMENT_BASE_URL').'API/v1/Order',['form_params' => $order_body]);
                 if($res->getStatusCode() == 200){
                        $data = $res->getBody();
                        //Make Variable of Customer ID Received From API Call
                        $OrderDetails = json_decode(($data),true);
                        $OrderAPIStatus = $OrderDetails["status"];
                        if ($OrderAPIStatus == 'success') {
                            $OrderDetails['customerIdvalue'] = $customerIdvalue;
                            return view('frontend.txn',$OrderDetails);
                        } else {
                            return redirect('/user_setting')->with('error', 'Please Update Your Profile'); 
                            //return $response;
                        }
                    }else{
                        return redirect('/user_setting')->with('error', 'Please Update Your Profile'); 
                        //return ['status' =>'error' , 'status_code' => 201 , 'message' => 'Something Went Wrong !'];
                    }
            }
        }else{
            return redirect('/');
        }
            
    }//end of method

    public function redirectPage(Request $request){
        if($request->txn_status == 'SUCCESS'){
            $formdata['payment_status'] = 1;
            $formdata['response_data'] = json_encode($request->all());
            $res = Transaction::where('transaction_id',$request->midorderid)->update($formdata);
        }else{
            $formdata['payment_status'] = 5;
            $formdata['response_data'] = json_encode($request->all());
            $res = Transaction::where('transaction_id',$request->midorderid)->update($formdata);
        }
        return redirect('user-dashboard');
    }

     public function payment_sell(Request $request){
        $id = $request->post('id');
        $validator = Validator::make($request->all(),[
        'wallet'=>'required',
        'screenshot'=>'required',
        'IhaveTransfer'=>'required',
        ]);

        if($validator->passes()) {
            $last_id = '';
            
            $formdata['wallet_id'] = $request->post('wallet');
            $formdata['updated_by'] = Auth::user()->id;
            if(!empty($request->file('screenshot'))){
                    $img = $request->file('screenshot');
                    $formdata['image'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('screenshot')->move(public_path('uploads'), $formdata['image']);
            } 
            $row =Transaction::where('id',$id)->update($formdata);
    
                                                           
            if($row){
                 
                    return response()->json(['status'=>1]); 
            }else{
                
                    return response()->json(['status' => 3]);
            }
                        
                        
                 
            
        }    
        return response()->json(['error'=>$validator->errors()->all(),'status'=>2]);
    }



}
