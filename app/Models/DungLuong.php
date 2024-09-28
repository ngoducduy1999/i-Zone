<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DungLuong extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_dung_luong',
        'trang_thai',

    ];

    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class);
    }
}
