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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('url_lien_ket')->nullable()->after('anh_banner'); // Thêm cột URL liên kết
            $table->dateTime('ngay_bat_dau')->nullable()->after('url_lien_ket'); // Thêm ngày bắt đầu hiển thị
            $table->dateTime('ngay_ket_thuc')->nullable()->after('ngay_bat_dau'); // Thêm ngày kết thúc hiển thị
            $table->string('vi_tri')->nullable()->after('ngay_ket_thuc'); // Thêm vị trí hiển thị
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['url_lien_ket', 'ngay_bat_dau', 'ngay_ket_thuc', 'vi_tri']); // Xóa các cột đã thêm
        });
    }
};
