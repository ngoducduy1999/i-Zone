<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyGiamToiDaColumnInKhuyenMaisTable extends Migration
{
    public function up()
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->bigInteger('giam_toi_da')->change(); // Đổi sang kiểu bigInteger để lưu giá trị lớn hơn
        });
    }

    public function down()
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            $table->integer('giam_toi_da')->change(); // Đổi lại kiểu cũ nếu rollback
        });
    }
}

