<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lien_hes extends Model
{
    use HasFactory;

    protected $table = 'lien_hes';

    // Các cột được phép gán giá trị hàng loạt
    protected $fillable = [
        'ten_nguoi_gui',
        'email_nguoi_gui',
        'tin_nhan',
        'trang_thai_tra_loi',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
