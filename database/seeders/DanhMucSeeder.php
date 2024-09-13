<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_mucs')->insert(
            [
                [
                    'ten_danh_muc' => 'Iphone',
                    'anh_danh_muc' => '',                 
                ]
            ]
        );
    }
}
