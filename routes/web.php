<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\NhanVienController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\admin\ChucDanhController;
use App\Http\Controllers\admin\UserProfileController;
use Illuminate\Contracts\Support\JsonableInterface;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\ChucDanhController;

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
    Route::get('/admin/trangchu', 'getHome')->middleware(checklogout::class);
    Route::get('/admin/nhansu', 'nhanSu')->middleware(checklogout::class);
    // Route::get('/admin/phongban', 'phongBan')->middleware(checklogout::class);
});
//Route Nhan Vien
Route::get('/pagination',[NhanVienController::class, 'index']);
Route::get('pagination/fetch_data', [NhanVienController::class, 'fetch_data']);
Route::controller(NhanVienController::class)->group(function(){
    Route::get('/admin/nhan-vien', 'nhanvien')->middleware(checklogout::class);
    Route::get('/ds-nhan-vien', 'show');
    // Route::get('/ds-nhan-vien', function(){
    //     return  App\Models\NhanVien::paginate(2);
    // });
    Route::get('/xem-chi-tiet-nhan-vien', 'showDetail');
    Route::get('/check_ma_nv', 'checkMaNv');
    Route::post('them-moi-nhan-vien', 'createNv');
    Route::get('/chinh-sua-nhan-vien', 'editNv');
    Route::put('/cap-nhat-danh-sach-nv', 'updateNv');
    Route::delete('/xoa-danh-sach-nv/{id}', 'deleteNv');
    Route::post('/kiem-tra-ton-tai', 'checkHasCode');
    Route::post('/tim-kiem-nv', 'searchNv');
    Route::get('/admin/nhan-vien/chi-tiet-nhan-vien/{id}', 'detailNv');
});

Route::get('/phongban',[HomeController::class, 'phongBan']);
Route::get('/ds-phongban', [HomeController::class, 'dsPhongBan']);
Route::post('/themphongban', [HomeController::class, 'themdsPhongBan']);
Route::delete('/xoa-phong-ban/{id}', [HomeController::class, 'delete']);
Route::get('/xem-chi-tiet-phong-ban', [HomeController::class, 'xemChiTiet']);
Route::get('/chinh-sua-danh-sach-phong-ban', [HomeController::class, 'edit']);
Route::put('/cap-nhat-danh-sach-phong-ban', [HomeController::class, 'update']);
Route::post('/tim-kiem-phong-ban', [HomeController::class, 'search']);

Route::get('/admin/chuc-danh',[ChucDanhController::class, 'ChucDanh']);
Route::get('/ds-chuc-danh', [ChucDanhController::class, 'dsChucDanh']);
Route::get('/xem-chi-tiet-chuc-danh', [ChucDanhController::class, 'xemChiTiet']);
Route::delete('/xoa-chuc-danh/{id}', [ChucDanhController::class, 'delete']);
Route::get('/chinh-sua-chuc-danh', [ChucDanhController::class, 'edit']);
Route::put('/cap-nhat-chuc-danh', [ChucDanhController::class, 'update']);
Route::get('admin/user-profile', [UserProfileController::class, 'view']);

// -----------------------------------------PhongBan-----------------------------------------
Route::get('/phongban',[PhongBanController::class, 'phongBan']);
Route::get('/phongban/xempb/{pb}',[PhongBanController::class, 'viewpb'])->name('phongban.xem');
Route::get('/phongban/suaphongban/{pb}',[PhongBanController::class, 'edit'])->name('phongban.edit');
Route::post('/phongban/suaphongban/{pb}',[PhongBanController::class, 'capnhatpb']);
Route::get('/phongban/themphongban',[PhongBanController::class, 'addpb']);
Route::post('/phongban/themphongban', [PhongBanController::class, 'themdsPhongBan'])->name('phongban.them');
Route::delete('/phongban/xoa-phong-ban/{id}', [HomeController::class, 'xoapb']);
// -----------------------------------------NhanVien-----------------------------------------
Route::get('/nhanvien',[NhanVienController::class, 'nvList'])->name('nhanvien.xem');
Route::get('/nhanvien/xemnv/{nv}',[NhanVienController::class, 'nvView']);
Route::get('/nhanvien/suanv/{nv}',[NhanVienController::class, 'nvEdit'])->name('nhanvien.edit');
Route::post('/nhanvien/suanv/{nv}',[NhanVienController::class, 'nvUpdate']);
Route::get('/nhanvien/themnv', [NhanVienController::class, 'nvAddView'])->name('nhanvien.them');
Route::post('/nhanvien/themnv', [NhanVienController::class, 'nvAdd']);
Route::delete('/nhanvien/xoanv/{id}', [NhanVienController::class, 'nvDelete']);

// -----------------------------------------ChucDanh-----------------------------------------
Route::get('/chucdanh',[ChucDanhController::class, 'cdListView']);
Route::get('/chucdanh/xemcd/{cd}',[ChucDanhController::class, 'cdViewDetail'])->name('chucdanh.xem');
Route::get('/chucdanh/suacd/{cd}',[ChucDanhController::class, 'cdEdit'])->name('chucdanh.edit');
Route::post('/chucdanh/suacd/{cd}',[ChucDanhController::class, 'cdUpdate']);
Route::get('/chucdanh/themcd',[ChucDanhController::class, 'cdAddView']);
Route::post('/chucdanh/themcd', [ChucDanhController::class, 'cdAdd'])->name('chucdanh.them');
Route::delete('/chucdanh/xoacd/{id}', [ChucDanhController::class, 'cdDelete']);
