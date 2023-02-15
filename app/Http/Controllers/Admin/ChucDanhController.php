<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChucDanh;
use Illuminate\Support\Facades\DB;
class ChucDanhController extends Controller
{
    //
    public function ChucDanh(){
        return view('backend.chuc-danh');
    }
    public function dsChucDanh()
    {
        //$result_data = ChucDanh::all();
        $result_data = DB::table('table_chuc_danh')->get();
        if ($result_data) {
            return response()->json([
                'message' => "Success",
                "code" => "200",
                'ds_chuc_danh' => $result_data
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function xemChiTiet(Request $request){
        $result = ChucDanh::where('id', $request->view_id)->first();
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
    public function create(Request $request)
    {

        $chucdanh_db = new ChucDanh();
        $chucdanh_db->ma_chuc_danh = $request->new_ma_cd;
        $chucdanh_db->ten_chuc_danh = $request->new_ten_cd;
        $chucdanh_db->mo_ta = $request->new_mo_ta;

        $result = $chucdanh_db->save();
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
    public function delete($id){
        $result = ChucDanh::find($id);
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
        $result = ChucDanh::where('id', $request->view_id)->first();
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
        $find_id =  $request->id_cd;
        $result = ChucDanh::find($find_id);
        //$result= DB::table('table_chuc_danh')->where('ma_chuc_danh', '=', $find_id)->update();
        $result->ma_chuc_danh = $request->edit_ma_cd;
        $result->ten_chuc_danh = $request->edit_ten_cd;
        $result->mo_ta = $request->edit_mo_ta;
        $result->update();
// return $result;
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
