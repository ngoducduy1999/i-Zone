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
        Schema::create('tra_lois', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('danh_gia_id'); // ID của đánh giá
            $table->unsignedBigInteger('user_id'); // ID của người dùng
            $table->text('noi_dung'); // Nội dung trả lời
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('danh_gia_id')->references('id')->on('danh_gia_san_phams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tra_lois');
    }
};
