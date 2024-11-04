<?php

use Illuminate\Support\Facades\DB;
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
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->string('phuong_thuc_thanh_toan')->change();
        });
      
        DB::table('hoa_dons')
            ->where('phuong_thuc_thanh_toan', 'online')
            ->update(['phuong_thuc_thanh_toan' => 'Thanh toán qua chuyển khoản ngân hàng']);
            
        DB::table('hoa_dons')
            ->where('phuong_thuc_thanh_toan', 'offline')
            ->update(['phuong_thuc_thanh_toan' => 'Thanh toán khi nhận hàng']);

        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->enum('phuong_thuc_thanh_toan', [
                'Thanh toán khi nhận hàng', 
                'Thanh toán qua chuyển khoản ngân hàng'
            ])->default('Thanh toán khi nhận hàng')->change();
        });
    }

    public function down(): void
    {
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->enum('phuong_thuc_thanh_toan', ['online', 'offline'])->default('offline')->change();
        });
    }
};
