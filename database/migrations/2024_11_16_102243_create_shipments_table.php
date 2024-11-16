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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // ID đơn hàng
            $table->string('tracking_number')->nullable(); // Mã vận đơn
            $table->string('carrier')->default('GHN'); // Nhà vận chuyển
            $table->string('status')->default('pending'); // Trạng thái: pending, shipped, delivered
            $table->decimal('shipping_cost', 10, 2)->nullable(); // Phí giao hàng
            $table->timestamps();
        
            $table->foreign('order_id')->references('id')->on('hoa_dons')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
