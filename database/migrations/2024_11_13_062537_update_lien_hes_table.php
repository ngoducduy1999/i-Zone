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
        //
        Schema::table('lien_hes', function (Blueprint $table) {
            $table->string('ten_nguoi_gui');
            $table->string('email_nguoi_gui');
            $table->text('tin_nhan');
            $table->boolean('trang_thai_tra_loi')->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
           
            $table->dropColumn('ten_nguoi_gui');
            $table->dropColumn('email_nguoi_gui');
            $table->dropColumn('tin_nhan');
            $table->dropColumn('trang_thai_tra_loi');
         
        });

    }
};
