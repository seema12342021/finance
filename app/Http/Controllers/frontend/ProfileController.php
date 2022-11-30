<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,KycData};
use Illuminate\Support\Facades\Session;
use Validator;
use DB;

class ProfileController extends Controller
{
    public function index() 
    {
        $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        return view('frontend.user_profile',$users);
    }
     public function kyc_index()
    {
         $users['title']="Kyc";
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        return view('frontend.kyc',$users);
    }
    public function setting_index()
    {
         $users['title']="Profile setting";
         $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
         $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        $users['setting'] = User::where(['id'=>Auth::user()->id])->first(['first_name','last_name','email','mobile_number']);
        return view('frontend.setting', $users);
    }
    public function bankDetails(){
        $users['title']="Bank Details";
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        $users['setting'] = User::where(['id'=>Auth::user()->id])->first(['first_name','last_name','email','mobile_number']);
        $acc_detail_where['account_type'] = 2;
        $acc_detail_where['user_id'] = Auth::user()->id;
        $users['acc_detail'] = DB::table('user_account_info')->where($acc_detail_where)->first();
        $upi_detail_where['account_type'] = 1;
        $upi_detail_where['user_id'] = Auth::user()->id;
        $users['upi_detail'] = DB::table('user_account_info')->where($upi_detail_where)->first();
        return view('frontend.bank_details', $users);
    }
    public function UpdateAccount(Request $request){
        $validated = Validator::make($request->all(),[
            'bank_name'=>'required',
            'account_holder_name'=>'required',
            'bank_account_number'=>'required|numeric',
            'ifsc_code'=>'required'
        ]);
        if($validated->passes()){
            $where['account_type'] = 2;
            $where['user_id'] = Auth::user()->id;
            $json['bank_name'] = $request->bank_name;
            $json['account_holder_name'] = $request->account_holder_name;
            $json['bank_account_number'] = $request->bank_account_number;
            $json['ifsc_code'] = $request->ifsc_code;
            $formdata['json_data'] = json_encode($json);
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['created_by'] = Auth::user()->id;
            $res = DB::table('user_account_info')->where($where)->update($formdata);
            if($res)
            {
              return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }
    public function deleteAccounts(Request $request){
        $validated = Validator::make($request->all(),[
            'type'=>'required'
        ]);
        if($validated->passes()){
            $where['account_type'] = $request->type;
            $where['user_id'] = Auth::user()->id;
            $formdata['json_data'] = NULL;
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['updated_by'] = Auth::user()->id;
            $res = DB::table('user_account_info')->where($where)->update($formdata);
            if($res)
            {
              return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Deleted Successfully !']);
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Deleted !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }
    public function UpdateUPI(Request $request){
        $validated = Validator::make($request->all(),[
            'upi_wallet_address'=>'required'
        ]);
        if($validated->passes()){
            $where['account_type'] = 1;
            $where['user_id'] = Auth::user()->id;
            $json['upi_address'] = $request->upi_wallet_address;
            $formdata['json_data'] = json_encode($json);
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['created_by'] = Auth::user()->id;
            $res = DB::table('user_account_info')->where($where)->update($formdata);
            if($res)
            {
              return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
            }
        }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }
    public function UpdateProfile(Request $request){
        $validated = Validator::make($request->all(),[
            'form_first_name'=>'required',
            'form_last_name'=>'required',
            'form_mobile_number'=>'required|numeric'

        ]);
         if($validated->passes()){
            $formdata['first_name'] = $request->form_first_name;
            $formdata['last_name'] = $request->form_last_name;
            $formdata['mobile_number'] = $request->form_mobile_number;
            $formdata['is_active'] = 1;
            $formdata['is_deleted'] = 1;
            $formdata['created_by'] = 1;
                    $res = User::where('id',Auth::user()->id)->update($formdata);
                    if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Update Successfully !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Update !"]);
                    }
                }else{
             return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }

    }
    
    //change password
     public function ChangePasswordForm()
    {
        $users['title']="Change Password";
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        return view('frontend.change_password',$users);
    }
     public function UpdatePassword(Request $request){
        $validated = Validator::make($request->all(),[
            'form_old_password'=>'required|password',
            'form_new_password'=>'required',
            'form_confirm_password'=>'required|same:form_new_password',
        ]);
        if($validated->passes()){
            $formdata['password'] = bcrypt($request->form_confirm_password);
            $res = User::where('id',Auth::user()->id)->update($formdata);
             if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>' Password Updated !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Updated Password !"]);
                    }
        }else{
            return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
        }
    }
    //change profile image
    public function UpdateProfileimg(Request $request)
    { 
        $validated = Validator::make($request->all(),['profile_img'=>'required']);
          if($validated->passes()){
             $file = $request->file('profile_img'); 
             $fileName = 'uploads/profileimg/'.uniqid(time()).'.'.$file->getClientOriginalExtension();  
            $file->move(public_path('uploads/profileimg'), $fileName);
            $formdata['img'] = $fileName;
            $res = User::where('id',Auth::user()->id)->update($formdata);
            if($res)
                    {
                      return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'Profile Updated !']);
                    }else{
                        return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Updated Profile !"]);
                    }
          }else{
                return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
          }
    }//end of method

    public function updateKycDeytails(Request $request){
        $validated = Validator::make($request->all(),[
                'kyc_type'=>'required',
                'front_image'=>'required_if:kyc_type,1,2,3|mimes:jpeg,png,pdf',
                'back_image'=>'required_if:kyc_type,1,2,3|mimes:jpeg,png,pdf'
            ],
            [
                'kyc_type.required' => 'Please Choose any one of them !',
                'front_image.required_if' => 'The front image field is required !',
                'back_image.required_if' => 'The back image field is required !'
        ]);
        
        if($validated->passes()){
            $front_image = $request->file('front_image'); 
            $front_image_name = uniqid(time()).'.'.$front_image->getClientOriginalExtension();;
            $front_image->move(public_path('uploads/kyc'), $front_image_name);
            $formdata['front_img'] = $front_image_name;
            $back_image = $request->file('back_image'); 
            $back_image_name = uniqid(time()).'.'.$back_image->getClientOriginalExtension();;
            $back_image->move(public_path('uploads/kyc'), $back_image_name);
            $formdata['back_img'] = $back_image_name;
            $formdata['proof_type'] = $request->kyc_type;
            $formdata['user_id'] = Auth::user()->id;
            //$formdata['created_by'] = Auth::user()->id;
            $res = KycData::insertGetId($formdata);
            if($res){
              return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'Profile Updated !']);
            }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Updated Profile !"]);
            }
          }else{
                return response()->json(['status'=>'error','status_code'=>301,'message' => $validated->errors()->all() ]);
          }
    }


}//end of class
