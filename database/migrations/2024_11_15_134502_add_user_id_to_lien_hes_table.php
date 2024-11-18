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
            //
            $table->unsignedBigInteger('user_id')->nullable(); // Cột user_id, cho phép null
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lien_hes', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
        });
    }
};
