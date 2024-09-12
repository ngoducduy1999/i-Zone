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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_the_san_pham_id');
            $table->foreign('bien_the_san_pham_id')->references('id')->on('bien_the_san_phams')->onDelete('cascade');
            $table->unsignedBigInteger('hoa_don_id');
            $table->foreign('hoa_don_id')->references('id')->on('hoa_dons')->onDelete('cascade');
            $table->unsignedInteger('so_luong');
            $table->unsignedBigInteger('don_gia');
            $table->unsignedBigInteger('thanh_tien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};
