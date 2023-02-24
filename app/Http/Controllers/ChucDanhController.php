<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChucDanhController extends Controller
{
    //
    public function cdListView(){
        $chucdanh = ChucDanh::all();
        
        return view('chucdanh.cd-list', compact('chucdanh'))->with('i');

    }
    public function cdViewDetail(ChucDanh $cd){
        return view('chucdanh.cd-detail', compact('cd'));
    }
    public function cdEdit($id){
        $chucDanh = ChucDanh::find($id);
        return view('chucdanh.cd-edit', compact('chucDanh'));
    }
    public function cdUpdate(Request $request, $id){
        $chucDanh = ChucDanh::find($id);
        $input = $request->all();
        $chucDanh->update($input);

        return redirect('chucdanh')->with('flash_message', 'Cập nhật chức danh thành công!');;
    }
    public function cdAddView(Request $request){
        $chucDanh = ChucDanh::all();
        return view('chucdanh.cd-add', compact('chucDanh'));
    }
    public function cdAdd(Request $request){
        $usedid = DB::table('table_chuc_danh')->where('ma_chuc_danh', 'LIKE', $request->ma_chuc_danh)->first();
        if ($usedid) {
            return response()->json([
                'flash_message' => "Mã chức danh đã tồn tại !", "code" => "504"
            ]);
        } else {
            $input = $request->all();
            if ($request->ma_chuc_danh)
            ChucDanh::create($input);
            return redirect('chucdanh')->with('flash_message', 'Thêm chức danh thành công!');
        }
    }
    public function cdDelete($id){
        $result = ChucDanh::find($id);
        $checkUse = DB::table('table_nhan_vien')->where('ma_chuc_danh', '=',  $result->ma_chuc_danh)->first();
//  return   $checkUse;
        if(!$checkUse){
            $result->delete();
            return response()->json([
                'message' => "Xóa dữ liệu thành công", "code" => "200"
            ]);
        }
        else{
            return redirect('/chucdanh')->with('flash_message', 'Mã chức danh đang sử dụng!');
            // return response()->json([
            //     'flash_message' => "Mã chức danh đang sử dụng!", "code" => "500"
            // ]);
        }
    
    }
    public function querySearchCd(Request $request){
        //return $request;
        $chucdanh = ChucDanh::where('ma_chuc_danh', 'LIKE', '%'.$request->mcd.'%')
        ->where('ten_chuc_danh', 'LIKE', '%'.$request->tencd.'%')
        ->get();

        return view('chucdanh.cd-search', compact('chucdanh'))->with('i');
    }
}
