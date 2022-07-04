<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,KycData};
use Validator;

class ProfileController extends Controller
{
    public function index() 
    {
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        return view('frontend.user_profile',$users);
    }
     public function kyc_index()
    {
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        $kyc_data = KycData::where('user_id',Auth::user()->id)->orderBY('id','DESC')->first();
        $users['docs'] = $kyc_data;
        return view('frontend.kyc',$users);
    }
     public function setting_index()
    {
         $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
        $users['setting'] = User::where(['id'=>Auth::user()->id])->first(['first_name','last_name','email','mobile_number']);
        return view('frontend.setting', $users);
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
        $users['fname'] = Auth::user()->first_name;
        $users['lname'] = Auth::user()->last_name;
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
                'kyc_type.required' => 'Please Choose on of them !',
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
