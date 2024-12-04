<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaSanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'san_pham_id',
        'diem_so',
        'nhan_xet'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function traLois()
    {
        return $this->hasMany(TraLoi::class, 'danh_gia_id');
    }
    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class, 'san_pham_id', 'san_pham_id');
    }
    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'san_pham_id', 'san_pham_id');
    }
    // In the DanhGiaSanPham model
public function replies()
{
    return $this->hasMany(TraLoi::class, 'danh_gia_id');
}
// Define the relationship with BienTheSanPham
public function bienTheSanPham()
{
    return $this->belongsTo(BienTheSanPham::class, 'bien_the_san_pham_id');
}

}
