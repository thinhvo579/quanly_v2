<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhongBanSeeder extends Seeder
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
                'ma_phong_ban'=>'01',
                'ten_phong_ban'=>'Ban Giám Đốc',
                'mo_ta'=>'-'
            ], 
            [
                'ma_phong_ban'=>'02',
                'ten_phong_ban'=>'Phòng Nhân Sự',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_phong_ban'=>'03',
                'ten_phong_ban'=>'Phòng CNTT',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_phong_ban'=>'04',
                'ten_phong_ban'=>'Phòng Kế Toán',
                'mo_ta'=>'-'
            ]
            , 
            [
                'ma_phong_ban'=>'05',
                'ten_phong_ban'=>'Phòng Marketing',
                'mo_ta'=>'-'
            ]
            ];
            DB::table('table_phong_ban')->insert($data);
    }
}
