<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhMuc extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = [
        'ten_danh_muc',
        'anh_danh_muc',
    ];
    public function baiViets()
    {
        return $this->hasMany(BaiViet::class);
    }

    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }
}
