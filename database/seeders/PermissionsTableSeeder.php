<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => 1,
                'title'      => 'product_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 2,
                'title'      => 'product_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 3,
                'title'      => 'product_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 4,
                'title'      => 'product_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 5,
                'title'      => 'product_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 6,
                'title'      => 'category_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 7,
                'title'      => 'category_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 8,
                'title'      => 'category_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 9,
                'title'      => 'category_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 10,
                'title'      => 'category_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 11,
                'title'      => 'history_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 12,
                'title'      => 'history_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 13,
                'title'      => 'history_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 14,
                'title'      => 'history_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 15,
                'title'      => 'history_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 16,
                'title'      => 'dashboard_create',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 17,
                'title'      => 'dashboard_edit',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 18,
                'title'      => 'dashboard_show',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 19,
                'title'      => 'dashboard_delete',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 20,
                'title'      => 'dashboard_access',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
        ];

        Permission::insert($permissions);
    }
}
