<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB; 
use Validator;
use Socialite;

class LoginController extends Controller
{
     public function user_login(Request $request){
        $validated = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ]);
        if($validated->passes()){
            if(Auth::attempt(['email'=>$request->username , 'password' => $request->password])){
                return response()->json(['status_code'=>200 , 'message' => 'Login succesfully']);
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        }else{
            return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }//end of method

     public function googleRedirect(){
        dd(Socialite::driver('google')->redirect());
    }
    public function googleCallback(){
         $user = Socialite::driver('google')->user();
         dd($user);
         $res = $this->_LoginUser($user);
         echo $res;
    }


    protected function _LoginUser($data){

       $user = User::where('email','=',$data->email)->first();
        if(empty($user)){
            $input['name'] = $data->name;
            $input['email'] = $data->email;
            $input['user_id'] = $data->id;
            $input['token'] = $data->token;
            $input['picture'] = $data->avatar;
            $id = User::insertGetId($input);
            $arr['token'] = $res->createToken('api_token')->accessToken;
            $arr['id'] = $id;
            $arr['name'] = $data->name;
            $arr['email'] = $data->email;
            $json_resp['status'] = 'success';
            $json_resp['message'] = "Login Success !";
            $json_resp['data'] = $arr;
            return response()->json($json_resp);
        }
        $data_arr['token'] = $user->createToken('api_token')->accessToken;
        $data_arr['id'] = $user->id;
        $data_arr['name'] = $user->name;
        $data_arr['email'] = $user->email;
        $data_arr['mobile'] = $user->mobile;
        $json_resp['status'] = 'success';
        $json_resp['message'] = "Login Success !";
        $json_resp['data'] = $data_arr;
        return response()->json($json_resp);
    }

    public function user_logout(){
        session()->flush();
        return redirect("/");
    }
}
