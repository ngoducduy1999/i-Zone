<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'ten',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'anh_dai_dien',
        'vai_tro',
        'dia_chi',
    ];

    protected $dates = ['deleted_at'];
}
