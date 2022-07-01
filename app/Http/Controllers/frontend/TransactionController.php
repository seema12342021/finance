<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use DataTables; 

class TransactionController extends Controller
{
    public function index()
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['transaction'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->get(['transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status',]);
        return view('frontend.transaction',$users);
    }

    public function show_detail_transaction(Request $request)
    {
        $users['fname'] = substr(Auth::user()->first_name,0,1);
        $users['lname'] = substr(Auth::user()->last_name,0,1);
        $users['name'] = Auth::user()->first_name;
        $users['transaction_detail'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$request->id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);
        return view('frontend.transaction_detail',$users);
    }

    public function payment_page(Request $request)
        {
            $users['fname'] = substr(Auth::user()->first_name,0,1);
            $users['lname'] = substr(Auth::user()->last_name,0,1);
            $users['name'] = Auth::user()->first_name;
            $users['transaction_detail'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$request->id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);
            return view('frontend.payment',$users);
        }

    public function show_transaction(Request $request){
        
        if ($request->ajax()) {
           //$data = Project::select('*');
            $data=Transaction::query();
            if (@$request->type == 2) {
                $data = $data->where(['transactions.payment_type'=>2]);
            }else{
                $data = $data->where(['transactions.payment_type'=>1]);
            }
            $data = $data->join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->get(['transactions.id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email',]);
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
        // dd($request->id);
        $users['transaction_detail'] = Transaction::join('wallets','wallets.id','=','transactions.wallet_id')->join('users','users.id','=','transactions.user_id')->join('cryptos','cryptos.id','=','transactions.crypto')->join('statuses','statuses.id','=','transactions.payment_status')->where(['transactions.id'=>$request->id,'transactions.is_deleted'=>1,'transactions.is_active'=>1,'transactions.user_id'=>Auth::user()->id])->orderBy('transactions.id','DESC')->first(['transactions.id','transactions.transaction_id','transactions.total_inr_price','transactions.created_at','transactions.total_crypto','transactions.crypto_price','transactions.payment_mode','transactions.wallet_address','transactions.payment_type','wallets.name as wallet','cryptos.name as crypto','statuses.name as status','users.first_name','users.email']);

        header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
//Fetch Value from Form Submitted
$custname='harsh';
$custemail='harsh@gmail.com';
$custmobile='6393228471';
$custaddressline1='fsfsdf';
$custaddressline2='fsdfsdfdsf';
$custaddresscity='fsdfsdfsdf';
$custaddressstate='fsdfsdfdsfsd';
$custaddresscountry='sdfdsfdsfsd';
$custaddresspostalcode='sdfsdfdsfsdf';
$orderid='fsdfdsfdsfdsfdsf';
$ordervalue='fsdfsdfdsf';
//Fetch Value From KP Environment file
$paramList = array();
$paramList["KP_ENVIRONMENT"] = 'TEST';
$paramList["KPMID"] = 'midKey_18977426e35958a';
$paramList["KPMIDKEY"] = 'midsalt_20dd4f95ce7e370';
$paramList["TXN_CURRENCY"] = 'INR';
///Create Customer From API Pass Customer Parameters to https://pispp.kwikpaisa.com/API/v1/CreateCustomer
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pispp.kwikpaisa.com/API/v1/CreateCustomer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('KP_ENVIRONMENT' => $paramList["KP_ENVIRONMENT"],'KPMID' => $paramList["KPMID"],'KPMIDKEY' => $paramList["KPMIDKEY"],'CUST_NAME' => $custname,'CUST_EMAIL' => $custemail,'CUST_MOBILE' => $custmobile,'CUST_ADDRESS_LINE1' => $custaddressline1,'CUST_ADDRESS_LINE2' => $custaddressline2,'CUST_ADDRESS_CITY' => $custaddresscity,'CUST_ADDRESS_STATE' => $custaddressstate,'CUST_ADDRESS_COUNTRY' => $custaddresscountry,'CUST_ADDRESS_POSTAL_CODE' => $custaddresspostalcode),
));
$response = curl_exec($curl);
curl_close($curl);
dd($response);

        
    }//end of method
}
