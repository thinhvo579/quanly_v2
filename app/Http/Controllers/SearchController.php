<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    //
    public function searchView()
    {
        return view('search');
    }
    public function searchResult(Request $request){
        $search_input = $request->tim_kiem;
  
        if($request->tim_kiem){
           $result = PhongBan::where('ten_phong_ban', 'LIKE', '%'.$request->tim_kiem.'%')->latest()->paginate(10);
           return view('search', compact('result'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
           return redirect()->back()->with('message', 'Tìm thấy 0 kết quả.');
        }
    
        
    }
}
