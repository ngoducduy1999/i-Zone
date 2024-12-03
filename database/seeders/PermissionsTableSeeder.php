<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 6,
                'name' => 'QL khuyen_mais',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 0, 48),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 32, 13),
            ],
            [
                'id' => 10,
                'name' => 'QL phan quyen',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 29, 8),
                'updated_at' => Carbon::create(2024, 11, 13, 22, 29, 14),
            ],
            [
                'id' => 11,
                'name' => 'QL dashboard',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 36, 27),
                'updated_at' => Carbon::create(2024, 11, 13, 22, 36, 27),
            ],
            [
                'id' => 12,
                'name' => 'QL nhanviens',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 45, 35),
                'updated_at' => Carbon::create(2024, 11, 13, 22, 45, 35),
            ],
            [
                'id' => 13,
                'name' => 'QL profile',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 47, 19),
                'updated_at' => Carbon::create(2024, 11, 13, 22, 47, 19),
            ],
            [
                'id' => 14,
                'name' => 'QL khachhangs',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 22, 50, 42),
                'updated_at' => Carbon::create(2024, 11, 13, 22, 50, 42),
            ],
            [
                'id' => 15,
                'name' => 'QL danhmucs',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 23, 39, 44),
                'updated_at' => Carbon::create(2024, 11, 13, 23, 39, 44),
            ],
            [
                'id' => 16,
                'name' => 'QL hoadons',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 0, 4, 9),
                'updated_at' => Carbon::create(2024, 11, 14, 0, 4, 9),
            ],
            [
                'id' => 17,
                'name' => 'QL sanphams',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 33, 34),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 33, 34),
            ],
            [
                'id' => 18,
                'name' => 'QL mausacs',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 39, 22),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 39, 22),
            ],
            [
                'id' => 19,
                'name' => 'QL dungluongs',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 39, 50),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 39, 50),
            ],
            [
                'id' => 20,
                'name' => 'QL baiviets',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 40, 15),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 40, 15),
            ],
            [
                'id' => 21,
                'name' => 'QL banners',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 40, 35),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 40, 35),
            ],
            [
                'id' => 22,
                'name' => 'QL tag',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 14, 6, 41, 7),
                'updated_at' => Carbon::create(2024, 11, 14, 6, 41, 7),
            ],
            [
                'id' => 23,
                'name' => 'Creat danhmuc',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 15, 6, 58, 10),
                'updated_at' => Carbon::create(2024, 11, 15, 6, 58, 10),
            ],
        ]);
    }
}
