<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagSanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'san_pham_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
