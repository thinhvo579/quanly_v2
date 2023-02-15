<?php

namespace App\Http\Controllers\Admin;

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
    //-------------------------------------------------------------------------------------------------------------------
    public function nhanvien()
    {
        // return view('backend.nhan-vien');
        $phongban = DB::table('table_phong_ban')->select('ma_phong_ban', 'ten_phong_ban')->get();
        $chucvu = DB::table('table_chuc_danh')->select('ma_chuc_danh', 'ten_chuc_danh')->get();

        return view('backend.nhan-vien')->with('phongban', $phongban)->with('chucvu', $chucvu);
    }
    public function show()
    {

        $list_nhanvien = NhanVien::all();
        // $list_chucDanh = ChucDanh::all();
        // $list_phongBan = PhongBan::all();

        return response()->json([
            'nhan_vien' =>  $list_nhanvien,
            // 'chuc_danh' =>  $list_chucDanh,
            // 'phong_ban' =>  $list_phongBan,

        ]);
    }
    public function showDetail(Request $request)
    {
        $result = NhanVien::where('id', $request->view_id)->first();

        if ($result) {
            return view('backend.nhanvien.xem-nv')->with('nv', $result);
        }
    }
    public function detailNv(Request $request)
    {
        $result = NhanVien::where('id', $request->view_id)->first();
        if ($result) {
            return response()->json([
                'message' => "Success", "code" => "200", 'detail' => $result
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function checkMaNv(Request $request)
    {
        $result = NhanVien::where('id', $request->view_id)->first();
    }
    public function createNv(Request $request)
    {
        // return $request;
        $nhan_vien = new NhanVien();

        $nhan_vien->ma_nhan_vien = $request->new_ma_nv;
        $nhan_vien->ten_nhan_vien = $request->new_ten_nv;
        $nhan_vien->gioi_tinh = $request->new_gt_nv;
        $nhan_vien->ngay_sinh = $request->new_ngay_sinh_nv;
        $nhan_vien->so_dt = $request->new_so_dt_nv;
        $nhan_vien->dia_chi = $request->new_dc_nv;
        $nhan_vien->bac_luong = $request->new_luong_nv;
        $nhan_vien->ma_phong_ban  = $request->select_pb;
        $nhan_vien->ma_chuc_danh = $request->select_ma_cv;
        // return $result;
        $result = $nhan_vien->save();
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
    public function editNv(Request $request)
    {
        $list_chucDanh = ChucDanh::all();
        $list_phongBan = PhongBan::all();
        $result = NhanVien::where('id', $request->view_id)->first();
        if ($result) {
            return response()->json([
                'message' => "Success", "code" => "200", 'detail' => $result, 'chuc_danh' =>  $list_chucDanh,
                'phong_ban' =>  $list_phongBan,
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function updateNv(Request $request)
    {
        $find_id =  $request->id_cd;
        $result = NhanVien::find($find_id);

        $result->ma_nhan_vien = $request->edit_ma_nv;
        $result->ten_nhan_vien = $request->edit_ten_nv;
        $result->gioi_tinh = $request->edit_gt_nv;
        $result->ngay_sinh = $request->edit_ngay_sinh_nv;
        $result->so_dt = $request->edit_sdt_nv;
        $result->dia_chi = $request->edit_dc_nv;
        $result->bac_luong = $request->edit_luong_nv;
        $result->ma_chuc_danh = $request->edit_cv_nv;
        $result->ma_phong_ban = $request->edit_pb_nv;

        //return $result;
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
    public function deleteNv($id)
    {
        $result = NhanVien::find($id);
        $result->delete();
        if ($result) {
            return response()->json([
                'message' => "Xóa dữ liệu thành công", "code" => "200", 'detail' => $result
            ]);
        } else {
            return response()->json([
                'message' => "Xóa dữ liệu thất bại", "code" => "500"
            ]);
        }
    }
    public function checkHasCode(Request $request)
    {
        //return $request->maNv;
        $result = NhanVien::where('ma_nhan_vien', $request->maNv)->first();
        if ($request->maNv == '') {
            return response()->json([
                'message' => "Mã nhân viên trống", "code" => "505"
            ]);
        } else
        if ($result) {
            return response()->json([
                'message' => "Mã nhân viên đã tồn tại", "code" => "500"
            ]);
        } else {
            return response()->json([
                'message' => "Mã nhân viên khả dụng", "code" => "200"
            ]);
        }
    }
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
