<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_tag',
        'trang_thai'
    ];

    public function tagSanPhams()
    {
        return $this->hasMany(TagSanPham::class);
    }
    protected $table = 'tags';

    // Quan hệ nhiều-nhiều với bảng SanPham thông qua bảng trung gian tag_san_phams
    public function sanPhams()
    {
        return $this->belongsToMany(SanPham::class, 'tag_san_phams', 'tag_id', 'san_pham_id');
    }
}
