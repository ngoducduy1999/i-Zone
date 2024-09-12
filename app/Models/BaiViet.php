<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'anh_bai_viet',
        'user_id',
        'danh_muc_id',
        'trang_thai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
}
