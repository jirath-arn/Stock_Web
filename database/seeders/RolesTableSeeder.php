<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'ผู้ดูแล',
                'created_at' => '2021-10-24 01:55:31',
                'updated_at' => '2021-10-24 01:55:31',
            ],
            [
                'id'         => 2,
                'title'      => 'พนักงาน',
                'created_at' => '2021-10-24 01:55:32',
                'updated_at' => '2021-10-24 01:55:32',
            ],
        ];

        Role::insert($roles);
    }
}
