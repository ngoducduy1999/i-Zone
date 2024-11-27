<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class UpdateExpiredPromotions extends Command
{
    protected $signature = 'promotions:update-expired';
    protected $description = 'Cập nhật trạng thái của các khuyến mãi đã hết hạn';

    public function handle()
    {
        $now = Carbon::now();

        // Cập nhật trạng thái của các khuyến mãi đã hết hạn
        $updatedCount = KhuyenMai::where('ngay_ket_thuc', '<', $now)
            ->where('trang_thai', true) // Chỉ cập nhật nếu trạng thái là đang hoạt động
            ->update(['trang_thai' => false]);

        $this->info("Đã cập nhật trạng thái của $updatedCount khuyến mãi đã hết hạn.");
    }
}
