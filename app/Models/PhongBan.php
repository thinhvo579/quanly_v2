<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhongBan extends Model
{
    use HasFactory;
    protected $table = 'table_phong_ban';
    protected $fillable = [
        'ma_phong_ban',
        'ten_phong_ban',
        'sdt_pb',
        'thongtin_pb'
    ];

}
