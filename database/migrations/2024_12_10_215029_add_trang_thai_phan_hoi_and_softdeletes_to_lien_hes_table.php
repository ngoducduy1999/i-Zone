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
        Schema::table('lien_hes', function (Blueprint $table) {
            $table->softDeletes(); // Thêm xóa mềm
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lien_hes', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Xóa cột xóa mềm (deleted_at)
        });
    }
};
