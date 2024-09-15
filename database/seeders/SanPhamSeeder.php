<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_phams')->insert(
            [
                [
                    'ma_san_pham' => 'SP001',
                    'ten_san_pham' => 'Iphone 15',
                    'anh_san_pham' => '',                 
                    'luot_xem' => 10,
                    'da_ban' => 10,
                    'danh_muc_id' => 1,
                    'mo_ta' => 'Mô tả sản phẩm',
                ]
            ]
        );
    }
}
