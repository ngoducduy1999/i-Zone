<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lien_hes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'lien_hes';

    // Các cột được phép gán giá trị hàng loạt

    const STATUS_PENDING = 'pending';
    const STATUS_RESOLVED = 'resolved';
    const STATUS_DELETED = 'deleted';

    
    protected $fillable = [
        'ten_nguoi_gui',
     
        'tin_nhan',
        'trang_thai_phan_hoi',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
