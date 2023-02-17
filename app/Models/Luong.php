<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;
    protected $table = 'table_luong';
    protected $fillable = [
        'ma_nhan_vien',
        'thang1',
        'thang2',
        'thang3',
        'thang4',
        'thang5',
        'thang6',
        'thang7',
        'thang8',
        'thang9',
        'thang10',
        'thang11',
        'thang12',
        
    ];
    public function luongNv()
    {
        return $this->hasOne('namespace App\Models\NhanVien');
    }
}
