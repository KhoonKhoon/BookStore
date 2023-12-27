<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'user_id' => 1,
                'permission_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'permission_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],


        ];

        DB::table('user_permissions')->insert($param);
    }
}
