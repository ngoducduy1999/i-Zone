<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Log;

class DeleteExpiredOrders extends Command
{
    protected $signature = 'orders:delete-expired';
    protected $description = 'Xóa các đơn hàng chưa thanh toán qua ngân hàng sau 15 phút';

    public function handle()
    {
        // Lấy các đơn hàng chưa thanh toán qua ngân hàng và đã hết hạn
        $expiredOrders = HoaDon::where('trang_thai_thanh_toan', HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'])
            ->where('thoi_gian_het_han', '<', now())
            ->where('phuong_thuc_thanh_toan', 'Thanh toán qua chuyển khoản ngân hàng') // Điều kiện bổ sung
            ->get();

        foreach ($expiredOrders as $order) {
            Log::info("Xóa đơn hàng hết hạn: ", (array) $order);
            $order->delete(); // Xóa hóa đơn
        }

        $this->info('Đã xóa các đơn hàng hết hạn chưa thanh toán qua ngân hàng.');
    }
}
