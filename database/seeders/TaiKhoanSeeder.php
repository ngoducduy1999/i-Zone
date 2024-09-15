<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'ten' => 'phiphikiet',
                    'email' => 'phiphikiet1206@gmail.com',
                    'mat_khau' => '12345678',                 
                    'so_dien_thoai' => '0123456789',
                    'anh_dai_dien' => '',
                    'vai_tro' => 'admin',
                    'dia_chi' => 'Hà Nội',
                    'ngay_sinh' => '2004-06-12',
                ]
            ]
        );
    }
}
