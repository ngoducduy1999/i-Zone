<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
