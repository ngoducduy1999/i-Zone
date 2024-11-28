<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lien_hes', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('message');
            $table->dropColumn('is_replied');
            $table->dropColumn('email_nguoi_gui');
            $table->dropColumn('trang_thai_tra_loi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lien_hes', function (Blueprint $table) {
            //
         
            $table->string('name');
            $table->string('email');
            $table->string('message');
            $table->string('is_replied');
            $table->string('email_nguoi_gui');
            $table->string('trang_thai_tra_loi');
        });
    }
};
