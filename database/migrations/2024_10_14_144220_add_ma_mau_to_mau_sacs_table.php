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
        Schema::table('mau_sacs', function (Blueprint $table) {
            $table->string('ma_mau')->nullable()->after('ten_mau_sac'); // Thêm cột ma_mau
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mau_sacs', function (Blueprint $table) {
            $table->dropColumn('ma_mau'); // Xóa cột ma_mau khi rollback
        });
    }
};
