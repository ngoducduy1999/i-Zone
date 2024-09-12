<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
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
