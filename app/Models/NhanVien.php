<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'table_nhan_vien';
    protected $fillable = [
        'ma_nhan_vien',
        'ten_nhan_vien',
        'gioi_tinh',
        'ngay_sinh',
        'ma_phong_ban',
        'ma_chuc_danh',
        'so_dt',
        'dia_chi',
        'luong'
    ];
}
