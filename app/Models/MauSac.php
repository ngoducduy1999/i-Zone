<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MauSac extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'ten_mau_sac',
        'ma_mau',
        'trang_thai',

    ];
    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class);
    }

}
