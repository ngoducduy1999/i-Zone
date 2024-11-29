<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Illuminate\Support\Facades\Log;

class DeleteExpiredOrders extends Command 
{
    protected $signature = 'orders:cancel-expired';
    protected $description = 'Hủy các đơn hàng chưa thanh toán qua ngân hàng sau 15 phút';

    public function handle()
    {
        // Lấy các đơn hàng chưa thanh toán qua ngân hàng và đã hết hạn
        $expiredOrders = HoaDon::where('trang_thai_thanh_toan', HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'])
            ->where('thoi_gian_het_han', '<', now())
            ->where('phuong_thuc_thanh_toan', 'Thanh toán qua chuyển khoản ngân hàng') // Điều kiện bổ sung
            ->get();

        foreach ($expiredOrders as $order) {
            Log::info("Hủy đơn hàng hết hạn: ", (array) $order);

            // Lấy danh sách chi tiết hóa đơn
            $chiTietHoaDons = ChiTietHoaDon::where('hoa_don_id', $order->id)->get();

            // Cập nhật số lượng tồn kho
            foreach ($chiTietHoaDons as $chiTiet) {
                $bienThe = $chiTiet->bienTheSanPham;
                if ($bienThe) {
                    $bienThe->so_luong += $chiTiet->so_luong; // Cộng lại số lượng vào kho
                    $bienThe->save();
                }
            }

            // Cập nhật trạng thái đơn hàng
            $order->trang_thai = 6; // Trạng thái "Đã hủy"
            $order->save();
        }

        $this->info('Đã hủy các đơn hàng hết hạn chưa thanh toán qua ngân hàng.');
    }
}

