<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Luong;
use App\Models\NhanVien;
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
        $countNv = NhanVien::count();
        $countPb = PhongBan::count();

        $gt_nam = NhanVien::where('gioi_tinh', 'Nam')->count();
        $gt_nu = NhanVien::where('gioi_tinh', 'Nữ')->count();
        $genderArr = array(
            array("label" => "Nam", "y" => $gt_nam),
            array("label" => "Nữ", "y" => $gt_nu),
            array("label" => "Khác", "y" => $countNv - $gt_nam - $gt_nu),

        );
        $count_age_30 = DB::table('table_nhan_vien')
        ->whereRaw("TIMESTAMPDIFF( YEAR, ngay_sinh, CURDATE()) < 30 ")
        ->count();
        $count_age_30_45 = DB::table('table_nhan_vien')
        ->whereRaw("TIMESTAMPDIFF( YEAR, ngay_sinh, CURDATE()) > 30 ")
        ->whereRaw("TIMESTAMPDIFF( YEAR, ngay_sinh, CURDATE()) < 45 ")
        ->count();
        $count_age_45 = DB::table('table_nhan_vien')
            ->whereRaw("TIMESTAMPDIFF( YEAR, ngay_sinh, CURDATE()) >= 45 ")
            ->count();
        $dataAges = array(
            array("label" => "Dưới 30 tuổi", "y" => $count_age_30),
            array("label" => "Từ 30 đến 45", "y" =>  $count_age_30_45),
            array("label" => "Trên 45", "y" => $count_age_45),

        );

         //return $count_age_45;
        return view('welcome', compact('countNv', 'countPb', 'genderArr', 'dataAges'));
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
        return view('phongban.pb-list', compact('phongBan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dsPhongBan()
    {
        $phongBan = PhongBan::all();
        return response()->json([
            'phongban' => $phongBan,
        ]);
    }
    public function search(Request $request)
    {
        $result = PhongBan::all();
        if ($request->keyword != '') {
            $result = PhongBan::where('ten_phong_ban', 'LIKE', '%' . $request->keyword . '%')->orWhere('ma_phong_ban', 'LIKE', '%' . $request->keyword . '%')->get();
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
    public function xoaPhongBan(Request $request)
    {
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
    public function xemchitiet(Request $request)
    {
        $result = PhongBan::where('id', $request->view_id)->first();
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
    public function delete($id)
    {
        $result = PhongBan::find($id);
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
    public function edit(Request $request)
    {
        $result = PhongBan::where('id', $request->view_id)->first();
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
    public function update(Request $request)
    {
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
    public function thongKeLuong(){
        $phongBan = PhongBan::all();

    $result = DB::table('table_luong')

    ->select([
        'ma_phong_ban',
        DB::raw("SUM(thang1) as total_thang1"),
        DB::raw("SUM(thang2) as total_thang2"),
        DB::raw("SUM(thang3) as total_thang3"),
        DB::raw("SUM(thang4) as total_thang4"),
        DB::raw("SUM(thang5) as total_thang5"),
        DB::raw("SUM(thang6) as total_thang6"),
        DB::raw("SUM(thang7) as total_thang7"),
        DB::raw("SUM(thang8) as total_thang8"),
        DB::raw("SUM(thang9) as total_thang9"),
        DB::raw("SUM(thang10) as total_thang10"),
        DB::raw("SUM(thang11) as total_thang11"),
        DB::raw("SUM(thang12) as total_thang12"),
    ])
    ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
        ->where('table_luong.nam', '2016')
        ->where('table_nhan_vien.ma_phong_ban', 'IT')
    ->groupBy('ma_phong_ban')
    ->first();

    return  $result->total_thang1+$result->total_thang2+$result->total_thang3+$result->total_thang4+$result->total_thang5+$result->total_thang6
    +$result->total_thang7+$result->total_thang8+$result->total_thang9+$result->total_thang10+$result->total_thang11+$result->total_thang12;
        return view('thongkeluong', compact('phongBan','total_pb'));
    }
}
