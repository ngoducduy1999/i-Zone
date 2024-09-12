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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('giam_gia')->default(0);
            $table->unsignedBigInteger('tong_tien');
            $table->text('dia_chi_nhan_hang');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->string('ten_nguoi_nhan');
            $table->date('ngay_dat_hang');
            $table->text('ghi_chu')->nullable();
            $table->enum('phuong_thuc_thanh_toan', ['online', 'offline'])->default('offline');
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
