<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_gia_san_phams')->insert(
            [
                [
                    'user_id' => '1',
                    'san_pham_id' => '1',
                    'diem_so' => 100,                 
                    'nhan_xet' => 'Sản phẩm quá tuyệt vời',
                ],
                [
                    'user_id' => '1',
                    'san_pham_id' => '1',
                    'diem_so' => 100,                 
                    'nhan_xet' => 'Sản phẩm quá tuyệt vời',
                ],
                [
                    'user_id' => '1',
                    'san_pham_id' => '1',
                    'diem_so' => 100,                 
                    'nhan_xet' => 'Sản phẩm quá tuyệt vời',
                ],
                [
                    'user_id' => '1',
                    'san_pham_id' => '1',
                    'diem_so' => 100,                 
                    'nhan_xet' => 'Sản phẩm quá tuyệt vời',
                ],
                [
                    'user_id' => '1',
                    'san_pham_id' => '1',
                    'diem_so' => 100,                 
                    'nhan_xet' => 'Sản phẩm quá tuyệt vời',
                ]
            ]
        );
    }
}
