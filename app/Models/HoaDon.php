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
        '7' => 'Đã nhận được hàng'
    ];

    const PHUONG_THUC_THANH_TOAN = [

        'Thanh toán khi nhận hàng' => 'Thanh toán khi nhận hàng',
        'Thanh toán qua chuyển khoản ngân hàng' => 'Thanh toán qua chuyển khoản ngân hàng',
    ];

    const CHO_XAC_NHAN = '1';

    const DA_XAC_NHAN = '2';

    const DANG_CHUAN_BI = '3';

    const DANG_VAN_CHUYEN = '4';

    const DA_GIAO_HANG = '5';

    const HUY_DON_HANG = '6';

    const DA_NHAN_HANG = '7';
    
    const THANH_TOAN_KHI_NHAN_HANG = 'offline';

    const THANH_TOAN_QUA_CHUYEN_KHOAN = 'online';

    protected $fillable = [
        'ma_hoa_don',
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
