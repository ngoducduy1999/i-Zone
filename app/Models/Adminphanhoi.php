<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminphanhoi extends Model
{
    use HasFactory;
   
    protected $table = 'admin_phan_hois';

    // Các cột được phép gán giá trị hàng loạt
    protected $fillable = [
        'lien_hes_id',
        'reply',
    ];

    /**
     * Quan hệ với Feedback (Một phản hồi từ quản trị viên thuộc về một phản hồi khách hàng).
     */
    public function lienhe()
    {
        return $this->belongsTo(lien_hes::class);
    }

}
