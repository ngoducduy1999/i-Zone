<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraLoi extends Model
{
    use HasFactory;

    // Bảng mà model này liên kết
    protected $table = 'tra_lois';

    // Các cột có thể gán hàng loạt
    protected $fillable = [
        'danh_gia_id',
        'user_id',
        'noi_dung',
    ];

    // Quan hệ với bảng đánh giá
    public function danhGia()
    {
        return $this->belongsTo(DanhGiaSanPham::class, 'danh_gia_id');
    }

    // Quan hệ với bảng người dùng (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function danhGiaSanPham()
    {
        return $this->belongsTo(DanhGiaSanPham::class, 'danh_gia_id', 'id');
    }
}