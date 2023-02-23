<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\NhanVienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserProfileController;
use Illuminate\Contracts\Support\JsonableInterface;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\ChucDanhController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dangnhap',[LoginController::class, 'getLogin'])->name('login')->middleware(checklogin::class);
Route::post('/postlogin',[LoginController::class, 'postLogin']);
Route::get('/logout',[HomeController::class, 'getLogout']);

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'getHome')->middleware(checklogout::class);
    Route::get('/admin/nhansu', 'nhanSu')->middleware(checklogout::class);
    // Route::get('/admin/phongban', 'phongBan')->middleware(checklogout::class);
});
//Route Nhan Vien

Route::controller(NhanVienController::class)->group(function(){

    Route::post('/tim-kiem-nv', 'searchNv');
    
});



// -----------------------------------------PhongBan-----------------------------------------
Route::get('/phongban',[PhongBanController::class, 'phongBan']);
Route::get('/phongban/xempb/{pb}',[PhongBanController::class, 'viewpb'])->name('phongban.xem');
Route::get('/phongban/suaphongban/{pb}',[PhongBanController::class, 'edit'])->name('phongban.edit');
Route::post('/phongban/suaphongban/{pb}',[PhongBanController::class, 'capnhatpb']);
Route::get('/phongban/themphongban',[PhongBanController::class, 'addpb']);
Route::post('/phongban/themphongban', [PhongBanController::class, 'themdsPhongBan'])->name('phongban.them');
Route::post('/phongban/xoa-phong-ban/{id}', [PhongBanController::class, 'xoapb']);

// -----------------------------------------NhanVien-----------------------------------------
Route::get('/nhanvien',[NhanVienController::class, 'nvList'])->name('nhanvien.xem');
Route::get('/nhanvien/xemnv/{nv}',[NhanVienController::class, 'nvView']);
Route::post('/nhanvien/xemnv/{nv}',[NhanVienController::class, 'luongNvDetail']);
Route::get('/nhanvien/suanv/{nv}',[NhanVienController::class, 'nvEdit'])->name('nhanvien.edit');
Route::post('/nhanvien/suanv/{nv}',[NhanVienController::class, 'nvUpdate']);
Route::get('/nhanvien/themnv', [NhanVienController::class, 'nvAddView'])->name('nhanvien.them');
Route::post('/nhanvien/themnv', [NhanVienController::class, 'nvAdd']);
Route::delete('/nhanvien/xoanv/{id}', [NhanVienController::class, 'nvDelete']);
Route::post('/nhanvien/cap-nhat-bang-luong/{maNv}',[NhanVienController::class, 'luongNv']);
Route::get('/nhanvien/bangluong',[NhanVienController::class, 'bangLuong']);
Route::get('/nhanvien/bangluong/{id}',[NhanVienController::class, 'getBangLuong']);
Route::get('/nhanvien/nhapluong/{id}',[NhanVienController::class, 'postBangLuong']);
Route::get('/nhanvien/them-bang-luong/{id}',[NhanVienController::class, 'themBangLuong']);
// -----------------------------------------ChucDanh-----------------------------------------
Route::get('/chucdanh',[ChucDanhController::class, 'cdListView']);
Route::get('/chucdanh/xemcd/{cd}',[ChucDanhController::class, 'cdViewDetail'])->name('chucdanh.xem');
Route::get('/chucdanh/suacd/{cd}',[ChucDanhController::class, 'cdEdit'])->name('chucdanh.edit');
Route::post('/chucdanh/suacd/{cd}',[ChucDanhController::class, 'cdUpdate']);
Route::get('/chucdanh/themcd',[ChucDanhController::class, 'cdAddView']);
Route::post('/chucdanh/themcd', [ChucDanhController::class, 'cdAdd'])->name('chucdanh.them');
Route::post('/chucdanh/xoacd/{id}', [ChucDanhController::class, 'cdDelete']);

// -----------------------------------------Search-----------------------------------------
Route::get('/tim-kiem-nhan-vien',[NhanVienController::class, 'querySearch']);
Route::get('/tim-kiem-phong-ban',[PhongBanController::class, 'querySearchPb']);
Route::get('/tim-kiem-chuc-danh',[ChucDanhController::class, 'querySearchCd']);
// Route::get('ket-qua-tim-kiem', [SearchController::class, 'searchResult'])->name('search.result');
Route::get('/thongkeluong',[HomeController::class, 'thongKeLuong']);

