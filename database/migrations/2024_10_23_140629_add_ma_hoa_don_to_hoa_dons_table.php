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
            $table->string('ma_hoa_don')->after('id'); // Thêm cột ma_hoa_don sau id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->dropColumn('ma_hoa_don'); // Xóa cột ma_hoa_don nếu rollback
        });
    }
};
