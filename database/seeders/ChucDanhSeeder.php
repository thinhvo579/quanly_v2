<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucDanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'ma_chuc_danh'=>'GD',
                'ten_chuc_danh'=>'Giám Đốc',
                'mo_ta'=>'-'
            ], 
            [
                'ma_chuc_danh'=>'PGĐ',
                'ten_chuc_danh'=>'Phó Giám Đốc',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_chuc_danh'=>'TP',
                'ten_chuc_danh'=>'Trưởng Phòng',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_chuc_danh'=>'PP',
                'ten_chuc_danh'=>'Phó Phòng',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_chuc_danh'=>'NV',
                'ten_chuc_danh'=>'Nhân Viên',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_chuc_danh'=>'BV',
                'ten_chuc_danh'=>'Bảo Vệ',
                'mo_ta'=>'-'
            ]
            ];
            DB::table('table_chuc_danh')->insert($data);
    
    }
}
