<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

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
        return $this->hasMany(related: DanhGiaSanPham::class);
    }

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class);
    }
}
