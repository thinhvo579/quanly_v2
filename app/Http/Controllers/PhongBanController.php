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
        return view('phongban.xempb',compact('pb'));
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
        PhongBan::destroy($id);
        return redirect('phongban')->with('flash_message', 'Xóa thành công');  
    }
}
