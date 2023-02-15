<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucDanh extends Model
{
    use HasFactory;
    protected $table = 'table_chuc_danh';
    protected $fillable = [
        'ma_chuc_danh',
        'ten_chuc_danh',
        'mo_ta'
    ];
}
