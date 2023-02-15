<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PhongBan;
use Illuminate\Routing\ResponseFactory;

class HomeController extends Controller
{
    //
    public function getHome()
    {
        return view('backend.index');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('/dangnhap');
    }
    public function nhanSu()
    {
        return view('backend.nhansu');
    }
    public function phongBan()
    {
        $phongBan = PhongBan::latest()->paginate(5);
        return view('phongban.pb-list',compact('phongBan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dsPhongBan()
    {
        $phongBan = PhongBan::all();
        return response()->json([
            'phongban' => $phongBan,
        ]);
    }
    public function search(Request $request){
        $result = PhongBan::all();
        if($request->keyword != ''){
            $result = PhongBan::where('ten_phong_ban','LIKE','%'.$request->keyword.'%')->orWhere('ma_phong_ban','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
            'phongban' => $result,
        ]);
    }
    public function themdsPhongBan(Request $request)
    {

        $phong = new PhongBan();
        $phong->ma_phong_ban = $request->new_ma_phong_ban;
        $phong->ten_phong_ban = $request->new_ten_phong_ban;
        $phong->mo_ta = $request->new_mo_ta;

        $result = $phong->save();
        if ($result) {
            return response()->json([
                'message' => "Thêm dữ liệu thành công", "code" => "200"
            ]);
        } else {
            return response()->json([
                'message' => "Thêm dữ liệu thất bại", "code" => "500"
            ]);
        }
    }
    public function xoaPhongBan(Request $request){
        // Call deleteData() method of Page Model
        $result = PhongBan::where('id', $request->id_del)->delete();
        if ($result) {
            return response()->json([
                'message' => "Xóa dữ liệu thành công", "code" => "200"
            ]);
        } else {
            return response()->json([
                'message' => "Xóa dữ liệu thất bại", "code" => "500"
            ]);
        }
    }
    public function xemchitiet(Request $request){
        $result = PhongBan::where('id', $request->view_id)->first();
        if ($result) {
            return response()->json([
                'message' => "Success", "code" => "200",'detail'=> $result
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function delete($id){
        $result = PhongBan::find($id);
        $result->delete();
        if ($result) {
            return response()->json([
                'message' => "Xóa dữ liệu thành công", "code" => "200",'detail'=> $result
            ]);
        } else {
            return response()->json([
                'message' => "Xóa dữ liệu thất bại", "code" => "500"
            ]);
        }
    }
    public function edit(Request $request){
        $result = PhongBan::where('id', $request->view_id)->first();
        if ($result) {
            return response()->json([
                'message' => "Success", "code" => "200",'detail'=> $result
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function update(Request $request){
        $find_id =  $request->id_pb;
        $result = PhongBan::find($find_id);
        $result->ma_phong_ban = $request->edit_ma_pb;
        $result->ten_phong_ban = $request->edit_ten_pb;
        $result->mo_ta = $request->edit_mo_ta;
        $result->update();

        if ($result) {
            return response()->json([
                'message' => "Cập nhật thành công", "code" => "200"
            ]);
        } else {
            return response()->json([
                'message' => "Cập nhật thất bại", "code" => "500"
            ]);
        }
    }

    
    
}
