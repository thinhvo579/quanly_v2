<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChucDanhController extends Controller
{
    //
    public function cdListView(){
        $chucdanh = ChucDanh::latest()->paginate(5);
        return view('chucdanh.cd-list', compact('chucdanh'))->with('i', (request()->input('page', 1) - 1) * 5);;
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

        return redirect('chucdanh');
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
}
