<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    //
    public function Register(){
        return view('backend.taotaikhoan');
    }
    public function RegisterAjax(Request $request){
        $check_email = DB::table('table_users_login')->where('email','LIKE',$request->user_email)->first();
        if($check_email){
            return response()->json([
                'message'=>"email đã tồn tại!", "code" => "500"
            ]);
        }else{
            $user = new User();
            $user->name = $request->user_username;
            $user->email  = $request->user_email;
            $user->password = Hash::make($request->user_password);

            $result = $user->save();
            if ($result) {
                return response()->json([
                    'message' => "Thêm dữ liệu thành công", "code" => "200"
                ]);
            } else {
                return response()->json([
                    'message' => "Thêm dữ liệu thất bại", "code" => "505"
                ]);
            }
        }
    }
}
