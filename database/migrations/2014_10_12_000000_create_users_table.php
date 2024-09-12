<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id (PK, unsigned big integer)
            $table->string('ten'); // ten (varchar)
            $table->string('email')->unique(); // email (varchar)
            $table->string('mat_khau'); // mat_khau (varchar)
            $table->string('so_dien_thoai')->nullable(); // so_dien_thoai (varchar)
            $table->string('anh_dai_dien')->nullable(); // anh_dai_dien (varchar)
            $table->enum('vai_tro', ['quan_ly', 'khach_hang', 'nhan_vien'])->default('khach_hang'); // vai_tro (enum)
            $table->text('dia_chi')->nullable(); // dia_chi (text)
            $table->softDeletes(); // deleted_at (soft delete)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
