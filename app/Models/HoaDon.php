<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    const TRANG_THAI = [
        '1' => 'Chờ xác nhận',
        '2' => 'Đã xác nhận',
        '3' => 'Đang chuẩn bị',
        '4' => 'Đang vận chuyển',
        '5' => 'Đã giao hàng',
        '6' => 'Đơn hàng đã hủy',
    ];

    const PHUONG_THUC_THANH_TOAN = [
        'offline' => 'Thanh toán khi nhận hàng',
        'online' => 'Thanh toán qua chuyển khoản ngân hàng',
    ];

    const CHO_XAC_NHAN = '1';

    const DA_XAC_NHAN = '2';

    const DANG_CHUAN_BI = '3';

    const DANG_VAN_CHUYEN = '4';

    const DA_GIAO_HANG = '5';

    const HUY_DON_HANG = '6';

    const THANH_TOAN_KHI_NHAN_HANG = 'online';

    const THANH_TOAN_QUA_CHUYEN_KHOAN = 'offline';

    protected $fillable = [
        'user_id',
        'giam_gia',
        'tong_tien',
        'dia_chi_nhan_hang',
        'email',
        'so_dien_thoai',
        'ten_nguoi_nhan',
        'ngay_dat_hang',
        'ghi_chu',
        'phuong_thuc_thanh_toan',
        'trang_thai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class);
    }
}
