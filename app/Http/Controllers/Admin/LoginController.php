<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin( Request $request){
        $this->validate($request,[
            'email' => 'required', 'password'=>'required'],
    ['email.required'=>'Bạn chưa nhập email', 'password.required'=>'Bạn chưa nhập mật khẩu']);
        $arr = [
            'email'=> $request->email,
            'password'=>$request->password,
        ];
    //    if($request->remember = "Remember"){
    //     $remember ="true";
    //    }
    //    else{
    //     $remember = "false";
    //    }
        if(Auth::attempt($arr)){
            return redirect()->intended('admin/trangchu');
        }
        else{
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }

}
