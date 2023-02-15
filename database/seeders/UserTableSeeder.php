<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
                'name'=>'thinh',
                'email'=>'thinh@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'1'
            ],
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'2'
            ],
        ];
        DB::table('table_users_login')->insert($data);
    }
}
