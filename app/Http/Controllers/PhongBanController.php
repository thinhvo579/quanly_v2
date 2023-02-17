<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use App\Models\PhongBan;
use Illuminate\Support\Facades\DB;

class PhongBanController extends Controller
{
    //
    public function addpb(){
        return view('phongban.pb-add');
    }
    public function editpb(){
        return view('phongban.pb-edit');
    }
    public function viewpb(PhongBan $pb)
    { //return $pb;
        return view('phongban.pb-detail',compact('pb'));
    }
    public function phongBan()
    {
        $phongBan = PhongBan::latest()->paginate(5);
        return view('phongban.pb-list',compact('phongBan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function themdsPhongBan(Request $request){
        $usedid = DB::table('table_phong_ban')->where('ma_phong_ban','LIKE', $request->ma_phong_ban)->first();
        if($usedid){
            return response()->json([
                'flash_message' => "Mã Phòng Ban đã tồn tại !", "code" => "200"
            ]);
            
        }
        else{
            $input =   $request->all();
            if($request->ma_phong_ban)
            PhongBan::create($input);
            return redirect('phongban')->with('flash_message', 'Thêm Phòng Ban thành công!');  
        }
        
       
    }
    public function edit($id)
    {
        $phongban = PhongBan::find($id);
        return view('phongban.pb-edit')->with('phongban', $phongban);
        
    }
    public function capnhatpb(Request $request, $id)
    {
        $phongban = PhongBan::find($id);
        $input = $request->all();
        $phongban->update($input);
        return redirect('phongban')->with('flash_message', 'Cập nhật thành công!');  
    }
    public function xoapb($id)
    {
            $result = PhongBan::find($id);
        //PhongBan::destroy($id);
        $checkUse = DB::table('table_nhan_vien')->where('ma_phong_ban', '=',  $result->ma_phong_ban)->first();
        if(!$checkUse){
            $result->delete();
            return response()->json([
                'message' => "Xóa dữ liệu thành công", "code" => "200"
            ]);
        }
        else{
            return redirect('/phongban')->with('flash_message', 'Mã phòng ban đang sử dụng!');
        }
       // return redirect('phongban')->with('flash_message', 'Xóa thành công');  
    }

    public function querySearchPb(Request $request){
        $phongBan = PhongBan::where('ma_phong_ban', 'LIKE', '%'.$request->mpb.'%')
        ->where('ten_phong_ban', 'LIKE', '%'.$request->tenpb.'%')
        ->where('sdt_pb', 'LIKE', '%'.$request->sdtpb.'%')
        ->get();

        return view('phongban.pb-search', compact('phongBan'))->with('i');
        //  return $query;

    }
}
