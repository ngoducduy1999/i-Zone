<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->enum('trang_thai_thanh_toan', ['Đã thanh toán', 'Thanh toán thất bại', 'Chưa thanh toán'])->default('Chưa thanh toán')->after('trang_thai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->dropColumn('trang_thai_thanh_toan');
        });
    }
};
