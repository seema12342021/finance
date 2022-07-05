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
      return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
         $user = Socialite::driver('google')->stateless()->user();
         $res = $this->_LoginUser($user);
         echo $res;
    }


    protected function _LoginUser($data){
       $user = User::where('email','=',$data->email)->first();
        if(empty($user)){
            $input['first_name'] = explode(' ', $data->name)[0];
            $input['last_name'] = explode(' ', $data->name)[1];
            $input['password'] = bcrypt(explode('@', $data->email)[0]);
            $input['email'] = $data->email;
            $input['user_type'] = 2;
            $id = User::insertGetId($input);
        }
        if(Auth::attempt(['email'=>$data->email,'password'=>explode('@', $data->email)[0]])){
                return redirect('/user-dashboard');
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        
    }

    public function user_logout(){
        session()->flush();
        return redirect("/");
    }
}
