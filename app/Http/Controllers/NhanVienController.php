<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use App\Models\ChucDanh;
use App\Models\PhongBan;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    public function nvList()
    {
        $nhanVien = NhanVien::latest()->paginate(5);
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        return view('nhanvien.nv-list', compact('nhanVien', 'phongBan', 'chucDanh'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function nvView(NhanVien $nv)
    {
        // $getname = DB::table('table_nhan_vien')
        // ->selectRaw('table_nhan_vien.ma_nhan_vien, table_phong_ban.ten_phong_ban , table_chuc_danh.ten_chuc_danh')
        // ->join('table_phong_ban', 'table_nhan_vien.ma_phong_ban', '=', 'table_phong_ban.ma_phong_ban')
        // ->join('table_chuc_danh', 'table_nhan_vien.ma_chuc_danh', '=', 'table_chuc_danh.ma_chuc_danh')
        // ->get();
        // return $nv->ma_nhan_vien;
        return view('nhanvien.nv-detail', compact('nv'));
    }
    public function nvEdit($id)
    {
        $nhanVien = NhanVien::find($id);
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();

        return view('nhanvien.nv-edit')->with('nhanVien', $nhanVien)->with('phongBan', $phongBan)->with('chucDanh', $chucDanh);
    }
    public function nvUpdate(Request $request, $id)
    {

        $nhanVien = NhanVien::find($id);
        $input = $request->all();
        $nhanVien->update($input);

        return redirect('nhanvien');
    }
    public function nvAddView()
    {
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        return view('nhanvien.nv-add', compact('phongBan'), compact('chucDanh'));
    }
    public function nvAdd(Request $request)
    {
        $usedid = DB::table('table_nhan_vien')->where('ma_nhan_vien', 'LIKE', $request->ma_nhan_vien)->first();
        if ($usedid) {
            return response()->json([
                'flash_message' => "Mã Phòng Ban đã tồn tại !", "code" => "200"
            ]);
        } else {
            $input =   $request->all();
            if ($request->ma_nhan_vien)
                NhanVien::create($input);
            return redirect('nhanvien')->with('flash_message', 'Thêm Phòng Ban thành công!');
        }
    }
    // public function nvDelete($id){
    //     NhanVien::destroy($id);
    //     return redirect('nhanvien')->with('flash_message', 'Xóa thành công');  
    // }
    public function nvDelete($id){
        $result = NhanVien::find($id);
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
    //-------------------------------------------------------------------------------------------------------------------

    public function searchNv(Request $request)
    {
        $result = NhanVien::all();
        if ($request->keyword != '') {
            $result = NhanVien::where('ten_nhan_vien', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('ma_nhan_vien', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('so_dt', 'LIKE', '%' . $request->keyword . '%')->get();
        }
        return response()->json([
            'nhanvien' => $result,
        ]);
    }
}
