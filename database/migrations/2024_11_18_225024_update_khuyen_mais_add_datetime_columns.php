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
        Schema::table('khuyen_mais', function (Blueprint $table) {
            // Sửa các trường ngày bắt đầu và ngày kết thúc thành kiểu datetime
            $table->dateTime('ngay_bat_dau')->nullable()->change();
            $table->dateTime('ngay_ket_thuc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khuyen_mais', function (Blueprint $table) {
            // Trở lại kiểu date cho các trường nếu rollback
            $table->date('ngay_bat_dau')->nullable()->change();
            $table->date('ngay_ket_thuc')->nullable()->change();
        });
    }
};
