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
        Schema::create('table_chuc_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_chuc_danh');
            $table->string('ten_chuc_danh');
            $table->string('mo_ta');
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
        Schema::dropIfExists('table_chuc_danh');
    }
};
