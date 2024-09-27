<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MauSac extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'ten_mau_sac',
        'trang_thai',
        'deleted_at'
    ];
    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class);
    }
}
