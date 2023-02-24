<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use App\Models\ChucDanh;
use App\Models\PhongBan;
use App\Models\Luong;

use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    public function nvList()
    {
        $nhanVien = NhanVien::all();
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        return view('nhanvien.nv-list', compact('nhanVien', 'phongBan', 'chucDanh'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function bangLuong()
    {
        $nhanVien = NhanVien::all();
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();

        return view('nhanvien.nv-luong', compact('nhanVien', 'phongBan', 'chucDanh'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function bangLuongNv(Request $request, $id)
    {
        $year_select = $request->year_selected;
        $luong_thang =  DB::table('table_luong')
            ->select('table_nhan_vien.ma_nhan_vien', 'table_luong.thang1', 'table_luong.thang2', 'table_luong.thang3', 'table_luong.thang4', 'table_luong.thang5', 'table_luong.thang6', 'table_luong.thang7', 'table_luong.thang8', 'table_luong.thang9', 'table_luong.thang10', 'table_luong.thang11', 'table_luong.thang12')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $id)
            ->where('table_luong.nam', $year_select)
            ->first();
        //return $luong ;
        if ($luong_thang) {
            return response()->json([
                'message' => "Success", "code" => "200", 'detail' => $luong_thang
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500"
            ]);
        }
    }
    public function getBangLuong(Request $request, $id)
    {

        //return( $id);
        $luong_thang =  DB::table('table_luong')
            ->select('table_nhan_vien.ma_nhan_vien', 'table_luong.nam', 'table_luong.thang1', 'table_luong.thang2', 'table_luong.thang3', 'table_luong.thang4', 'table_luong.thang5', 'table_luong.thang6', 'table_luong.thang7', 'table_luong.thang8', 'table_luong.thang9', 'table_luong.thang10', 'table_luong.thang11', 'table_luong.thang12')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $id)
            ->where('table_luong.nam', $request->year_selected)
            ->first();
        $luong_nam = DB::table('table_luong')
            ->selectRaw('sum(table_luong.thang1 + table_luong.thang2 + table_luong.thang3 + table_luong.thang4 + table_luong.thang5 + table_luong.thang6 + table_luong.thang7 + table_luong.thang8 + table_luong.thang9 + table_luong.thang10 + table_luong.thang11 + table_luong.thang12) as total')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $id)
            ->where('table_luong.nam', $request->year_selected)
            ->first();
        $stats = DB::table('table_luong')
            ->select(
                'table_luong.nam',
                DB::raw('table_luong.thang1 + table_luong.thang2 + table_luong.thang3 + table_luong.thang4 + table_luong.thang5 + table_luong.thang6 + table_luong.thang7 + table_luong.thang8 + table_luong.thang9 + table_luong.thang10 + table_luong.thang11 + table_luong.thang12 as total')
            )
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien',  $id)
            ->get();

        if ($luong_thang) {
            return response()->json([
                'message' => "Success", "code" => "200", 'detail' => $luong_thang, 'luong_nam' => $luong_nam, ' stats' => $stats
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500", 'detail' => $luong_thang, 'luong_nam' => $luong_nam, ' stats' => $stats
            ]);
        }
    }
    public function luongNvDetail(Request $request, $id)
    {

        $luong_thang =  DB::table('table_luong')
            ->select('table_nhan_vien.ma_nhan_vien', 'table_luong.nam', 'table_luong.thang1', 'table_luong.thang2', 'table_luong.thang3', 'table_luong.thang4', 'table_luong.thang5', 'table_luong.thang6', 'table_luong.thang7', 'table_luong.thang8', 'table_luong.thang9', 'table_luong.thang10', 'table_luong.thang11', 'table_luong.thang12')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $id)
            ->where('table_luong.nam', $request->year_selected)
            ->first();
        $luong_nam = DB::table('table_luong')
            ->selectRaw('sum(table_luong.thang1 + table_luong.thang2 + table_luong.thang3 + table_luong.thang4 + table_luong.thang5 + table_luong.thang6 + table_luong.thang7 + table_luong.thang8 + table_luong.thang9 + table_luong.thang10 + table_luong.thang11 + table_luong.thang12) as total')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $id)
            ->where('table_luong.nam', $request->year_selected)
            ->first();

        if ($luong_thang) {
            return response()->json([
                'message' => "Success", "code" => "200", 'detail' => $luong_thang, 'luong_nam' => $luong_nam
            ]);
        } else {
            return response()->json([
                'message' => "Error", "code" => "500", 'detail' => $luong_thang, 'luong_nam' => $luong_nam
            ]);
        }
    }
    public function postBangLuong($id)
    {

        $nhanVien = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        return view('nhanvien.nv-luong-detail', compact('nhanVien'));
    }
    public function themBangLuong(Request $request, $id)
    {
        dd($request);
    }
    public function nvView(NhanVien $nv, Request $request)
    {

        $cd_name = ChucDanh::where('ma_chuc_danh', $nv->ma_chuc_danh)->select('ten_chuc_danh')->first();
        $pb_name = PhongBan::where('ma_phong_ban', $nv->ma_phong_ban)->select('ten_phong_ban')->first();
        $ten_chuc_danh =  $cd_name->ten_chuc_danh;
        $ten_pb = $pb_name->ten_phong_ban;

        $luong_thang =  DB::table('table_luong')
            ->select('table_nhan_vien.ma_nhan_vien', 'table_luong.nam', 'table_luong.thang1', 'table_luong.thang2', 'table_luong.thang3', 'table_luong.thang4', 'table_luong.thang5', 'table_luong.thang6', 'table_luong.thang7', 'table_luong.thang8', 'table_luong.thang9', 'table_luong.thang10', 'table_luong.thang11', 'table_luong.thang12')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $nv->ma_nhan_vien)
            ->where('table_luong.nam', $request->year_selected)
            ->first();
        // dd($luong_thang);
        // return response()->json($luong_thang);
        $stats = DB::table('table_luong')
            ->select(
                'table_luong.nam',
                DB::raw('table_luong.thang1 + table_luong.thang2 + table_luong.thang3 + table_luong.thang4 + table_luong.thang5 + table_luong.thang6 + table_luong.thang7 + table_luong.thang8 + table_luong.thang9 + table_luong.thang10 + table_luong.thang11 + table_luong.thang12 as total')
            )
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $nv->ma_nhan_vien)
            ->orderBy('table_luong.nam', 'asc')
            ->get();

        return view('nhanvien.nv-detail', compact('nv', 'ten_chuc_danh', 'ten_pb', 'stats'));
    }
    public function thongKeLuongNv(NhanVien $nv, Request $request)
    {
// return $nv;

        $luong_thang =  DB::table('table_luong')
            ->select('table_nhan_vien.ma_nhan_vien', 'table_luong.nam', 'table_luong.thang1', 'table_luong.thang2', 'table_luong.thang3', 'table_luong.thang4', 'table_luong.thang5', 'table_luong.thang6', 'table_luong.thang7', 'table_luong.thang8', 'table_luong.thang9', 'table_luong.thang10', 'table_luong.thang11', 'table_luong.thang12')
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $nv->ma_nhan_vien)
            ->where('table_luong.nam', $request->year_selected)
            ->first();
        // dd($luong_thang);
        // return response()->json($luong_thang);
        $stats = DB::table('table_luong')
            ->select(
                'table_luong.nam',
                DB::raw('table_luong.thang1 + table_luong.thang2 + table_luong.thang3 + table_luong.thang4 + table_luong.thang5 + table_luong.thang6 + table_luong.thang7 + table_luong.thang8 + table_luong.thang9 + table_luong.thang10 + table_luong.thang11 + table_luong.thang12 as total')
            )
            ->join('table_nhan_vien', 'table_nhan_vien.ma_nhan_vien', '=', 'table_luong.ma_nhan_vien')
            ->where('table_luong.ma_nhan_vien', $nv->ma_nhan_vien)
            ->orderBy('table_luong.nam', 'asc')
            ->get();

        return view('nhanvien.nv-luong-detail', compact('nv', 'stats'));
    }
    public function nvEdit($id)
    {
        $nhanVien = NhanVien::find($id);
        $maNv = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        // return $maNv;
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        // $luong = Luong::where('ma_nhan_vien', $maNv->ma_nhan_vien)->first();
        // 
        return view('nhanvien.nv-edit')->with('nhanVien', $nhanVien)->with('phongBan', $phongBan)->with('chucDanh', $chucDanh);
    }
    public function nvUpdate(Request $request, $id)
    {
        //return $request;
        $input = $request->all();
        $nhanVien = NhanVien::find($id);
        $nv_ma = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        $luong_nv = Luong::where('ma_nhan_vien', $nv_ma->ma_nhan_vien)->first();
        if($request){
            $nhanVien->update($input);
            return redirect()->back()->with('flash_message', 'Sửa nhân viên thành công!');
        }
        // return  $request->ma_nhan_vien;
       // if ($luong_nv) {
            // $luong_nv->ma_nhan_vien =  $request->ma_nhan_vien;
            //$luong_nv->update(['ma_nhan_vien' => $request->ma_nhan_vien]);
            
            //return redirect()->back()->with('flash_message', 'Sửa nhân viên thành công!');
        //}
    }
    public function nvAddView()
    {
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        return view('nhanvien.nv-add', compact('phongBan'), compact('chucDanh'));
    }
    public function nvAdd(Request $request)
    {
        //return $request;
        $current_year = date("Y");
        $usedid = DB::table('table_nhan_vien')->where('ma_nhan_vien', 'LIKE', $request->ma_nhan_vien)->first();
        if ($usedid) {
            return redirect()->back()->with('flash_message', 'Mã nhân viên đã tồn tại!');
        } else {
            $input =   $request->all();
            if ($request->ma_nhan_vien)
                NhanVien::create($input);
            Luong::updateOrCreate(
                [
                    'ma_nhan_vien' => $request->ma_nhan_vien, 'nam' => $current_year, 'thang1' => 0, 'thang2' => 0, 'thang3' => 0, 'thang4' => 0, 'thang5' => 0, 'thang6' => 0,
                    'thang7' => 0, 'thang8' => 0, 'thang9' => 0, 'thang10' => 0, 'thang11' => 0, 'thang12' => 0,
                ],
            );
            return redirect('nhanvien')->with('flash_message', 'Thêm nhân viên thành công!');
        }
    }
    // public function nvDelete($id){
    //     NhanVien::destroy($id);
    //     return redirect('nhanvien')->with('flash_message', 'Xóa thành công');  
    // }
    public function nvDelete($id)
    {
        $result = NhanVien::find($id);
        $maNv = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        Luong::where('ma_nhan_vien', $maNv->ma_nhan_vien)->delete();
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

    public function luongNv(Request $request, $maNv)
    {
        //  dd($request->nam);
        // $luong = Luong::find($maNv);
        $luong = Luong::where('ma_nhan_vien', $maNv)->Where('nam', $request->nam)->first();
        //return $luong;
        $input = $request->all();
        //dd($input);
        $t1 =  str_replace(".", "", $request->thang1);
        $t2 =  str_replace(".", "", $request->thang2);
        $t3 =  str_replace(".", "", $request->thang3);
        $t4 =  str_replace(".", "", $request->thang4);
        $t5 =  str_replace(".", "", $request->thang5);
        $t6 =  str_replace(".", "", $request->thang6);
        $t7 =  str_replace(".", "", $request->thang7);
        $t8 =  str_replace(".", "", $request->thang8);
        $t9 =  str_replace(".", "", $request->thang9);
        $t10 =  str_replace(".", "", $request->thang10);
        $t11 =  str_replace(".", "", $request->thang11);
        $t12 =  str_replace(".", "", $request->thang12);
        $total_money =  (int)$t1 + (int)$t2 + (int)$t3 + (int)$t4 + (int)$t5 + (int)$t6 + (int)$t7 + (int)$t8 + (int)$t9 + (int)$t10 + (int)$t11 + (int)$t12;
        if ($luong) {
            $luong->update(array(
                'ma_nhan_vien'     =>   $maNv,
                'nam'   =>   $request->nam,
                'thang1'   =>  $t1,
                'thang2'   =>   $t2,
                'thang3'   =>   $t3,
                'thang4'   =>   $t4,
                'thang5'   =>   $t5,
                'thang6'   =>   $t6,
                'thang7'   =>   $t7,
                'thang8'   =>   $t8,
                'thang9'   =>   $t9,
                'thang10'   =>   $t10,
                'thang11'   =>   $t11,
                'thang12'   =>   $t12,

            ));
            
        } else {
            Luong::insert(array(
                'ma_nhan_vien'     =>   $maNv,
                'nam'   =>   $request->nam,
                'thang1'   =>  $t1,
                'thang2'   =>   $t2,
                'thang3'   =>   $t3,
                'thang4'   =>   $t4,
                'thang5'   =>   $t5,
                'thang6'   =>   $t6,
                'thang7'   =>   $t7,
                'thang8'   =>   $t8,
                'thang9'   =>   $t9,
                'thang10'   =>   $t10,
                'thang11'   =>   $t11,
                'thang12'   =>   $t12,

            ));
        }
        return redirect()->back()->with('flash_message', 'Cập nhật lương thành công !');
    }
    public function querySearch(Request $request)
    {
        $request_mnv = $request->id_search;
        $request_name = $request->name_search;
        $request_sdt = $request->phone_search;
        $nhanVien = NhanVien::where('ma_nhan_vien', 'LIKE', '%' . $request_mnv . '%')
            ->where('ten_nhan_vien', 'LIKE', '%' . $request_name . '%')
            ->where('so_dt', 'LIKE', '%' . $request_sdt . '%')
            ->get();

        return view('nhanvien.nv-search', compact('nhanVien'))->with('i');
        //  return $query;

    }
}
