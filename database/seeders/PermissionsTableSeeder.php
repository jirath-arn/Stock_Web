<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'         => 1,
                'title'      => 'product_add',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
        ];

        Permission::insert($permissions);
    }
}
