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
    public function nvView(NhanVien $nv)
    {
        // $getname = NhanVien::where('ma_nhan_vien', $nv->ma_nhan_vien)
        // ->selectRaw('table_nhan_vien.ma_nhan_vien, table_phong_ban.ten_phong_ban , table_chuc_danh.ten_chuc_danh')
        // ->join('table_phong_ban', 'table_nhan_vien.ma_phong_ban', '=', 'table_phong_ban.ma_phong_ban')
        // ->join('table_chuc_danh', 'table_nhan_vien.ma_chuc_danh', '=', 'table_chuc_danh.ma_chuc_danh')
        // ->get('table_phong_ban.ten_phong_ban');
        // return $nv->ma_nhan_vien;

        $luong = Luong::where('ma_nhan_vien', $nv->ma_nhan_vien)->first();
        $cd_name = ChucDanh::where('ma_chuc_danh', $nv->ma_chuc_danh)->select('ten_chuc_danh')->first();
        $pb_name = PhongBan::where('ma_phong_ban', $nv->ma_phong_ban)->select('ten_phong_ban')->first();
        $ten_chuc_danh =  $cd_name->ten_chuc_danh;
        $ten_pb = $pb_name->ten_phong_ban;
        return view('nhanvien.nv-detail', compact('nv','luong','ten_chuc_danh','ten_pb'));
        
    }
    public function nvEdit($id)
    {
        $nhanVien = NhanVien::find($id);
        $maNv = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        // return $maNv;
        $phongBan = PhongBan::all();
        $chucDanh = ChucDanh::all();
        $luong = Luong::where('ma_nhan_vien', $maNv->ma_nhan_vien)->first();
        // 
         return view('nhanvien.nv-edit')->with('nhanVien', $nhanVien)->with('phongBan', $phongBan)->with('chucDanh', $chucDanh)->with('luong', $luong);
        
    }
    public function nvUpdate(Request $request, $id)
    {

        $nhanVien = NhanVien::find($id);
        $input = $request->all();
        $nhanVien->update($input);
        return redirect('nhanvien')->with('flash_message', 'Sửa nhân viên thành công!');
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
            return redirect()->back()->with('flash_message', 'Mã nhân viên đã tồn tại!');
        } else {
            $input =   $request->all();
            if ($request->ma_nhan_vien)
                NhanVien::create($input);
                Luong::updateOrCreate(
                    ['ma_nhan_vien' => $request->ma_nhan_vien, 'thang1' => 0,'thang2' => 0,'thang3' => 0,'thang4' => 0,'thang5' => 0,'thang6' => 0,
                    'thang7' => 0,'thang8' => 0,'thang9' => 0,'thang10' => 0,'thang11' => 0,'thang12' => 0, ],
                );
            return redirect('nhanvien')->with('flash_message', 'Thêm nhân viên thành công!');
        }
    }
    // public function nvDelete($id){
    //     NhanVien::destroy($id);
    //     return redirect('nhanvien')->with('flash_message', 'Xóa thành công');  
    // }
    public function nvDelete($id){
        $result = NhanVien::find($id);
        $maNv = NhanVien::where('id', $id)->select('ma_nhan_vien')->first();
        Luong::where('ma_nhan_vien', $maNv->ma_nhan_vien)->delete();
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
    public function luongNv(Request $request, $maNv){
        // $luong = Luong::find($maNv);
        $luong = Luong::where('ma_nhan_vien', $maNv)->first();
       //return $luong;
        $input = $request->all();
        $luong->update($input);

         return redirect()->back()->with('message','Operation Successful !');
    }
    public function querySearch(Request $request){
        $request_mnv = $request->id_search;
        $request_name = $request->name_search;
        $request_sdt = $request->phone_search;
        $nhanVien = NhanVien::where('ma_nhan_vien', 'LIKE', '%'.$request_mnv.'%')
        ->where('ten_nhan_vien', 'LIKE', '%'.$request_name.'%')
        ->where('so_dt', 'LIKE', '%'.$request_sdt.'%')
        ->get();

        return view('nhanvien.nv-search', compact('nhanVien'))->with('i');
        //  return $query;

    }
}
