<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'danh_muc_id',
        'anh_san_pham',
        'mo_ta',
        'luot_xem',
        'da_ban'
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }

    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class);
    }

    public function hinhAnhSanPhams()
    {
        return $this->hasMany(HinhAnhSanPham::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_san_phams', 'san_pham_id', 'tag_id');
    }
    
    public function tagSanPhams()
    {
        return $this->hasMany(TagSanPham::class);
    }

    public function yeuThichs()
    {
        return $this->hasMany(YeuThich::class);
    }

    public function danhGias()
    {
        return $this->hasMany(DanhGiaSanPham::class);
    }
    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'bien_the_san_pham_id', 'id'); // Sử dụng cột đúng
    }
    


    protected $table = 'san_phams';

    public function bienThe()
    {
        return $this->hasMany(BienTheSanPham::class, 'san_pham_id');
    }

    public function danhmucs()
    {
    return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    }
    
    public function getAvgRatingAttribute()
    {
        return $this->danhGias()->avg('diem_so');
    }
}
