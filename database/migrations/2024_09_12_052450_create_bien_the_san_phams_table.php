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
        Schema::create('bien_the_san_phams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('san_pham_id');
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
            $table->unsignedInteger('so_luong');
            $table->unsignedInteger('gia_cu');
            $table->unsignedInteger('gia_moi');
            $table->unsignedBigInteger('dung_luong_id');
            $table->foreign('dung_luong_id')->references('id')->on('dung_luongs')->onDelete('cascade');
            $table->unsignedBigInteger('mau_sac_id');
            $table->foreign('mau_sac_id')->references('id')->on('mau_sacs')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_the_san_phams');
    }
};
