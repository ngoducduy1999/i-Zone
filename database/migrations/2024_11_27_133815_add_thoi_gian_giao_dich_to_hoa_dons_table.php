<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->timestamp('thoi_gian_giao_dich')->nullable()->after('ngay_dat_hang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->dropColumn('thoi_gian_giao_dich');
        });
    }
};
