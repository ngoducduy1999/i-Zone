<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DungLuong extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'ten_dung_luong',
        'deleted_at'
    ];

    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class);
    }
}
