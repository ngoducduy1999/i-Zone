<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'ten',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'anh_dai_dien',
        'vai_tro',
        'dia_chi',
        'ngay_sinh',
    ];

    protected $hidden = [
        'mat_khau',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mat_khau' => 'hashed',
    ];

    // Accessor để Laravel hiểu cột 'mat_khau' là 'password'
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function baiViets()
    {
        return $this->hasMany(BaiViet::class);
    }

    public function yeuThichs()
    {
        return $this->hasMany(YeuThich::class);
    }

    public function danhGias()
    {
        return $this->hasMany(DanhGiaSanPham::class);
    }

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class);
    }
}
