<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 9, 47, 16),
                'updated_at' => Carbon::create(2024, 11, 13, 9, 47, 16),
            ],
            [
                'id' => 2,
                'name' => 'staff',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 13, 9, 47, 16),
                'updated_at' => Carbon::create(2024, 11, 13, 9, 47, 16),
            ],
            [
                'id' => 4,
                'name' => 'shipper',
                'guard_name' => 'web',
                'created_at' => Carbon::create(2024, 11, 16, 2, 41, 12),
                'updated_at' => Carbon::create(2024, 11, 16, 2, 41, 21),
            ],
        ]);
    }
}
