<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nhan_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nhan_vien');
            $table->string('ten_nhan_vien');
            $table->string('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('so_dt');
            $table->string('dia_chi');
            $table->string('chuc_vu');
            $table->string('luong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_nhan_vien');
    }
};
