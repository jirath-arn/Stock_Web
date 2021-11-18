<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'role_id'           => 1,
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => '$2y$10$Uhe3/biAz6AEJlyTS555M.TF9SvTsqVx2ndcLGt6O1okij/.emkve',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'last_logout_at'    => '2021-11-18 18:10:00',
                'created_at'        => '2021-10-24 01:55:31',
                'updated_at'        => '2021-10-24 01:55:31',
            ],
            [
                'id'                => 2,
                'role_id'           => 2,
                'name'              => 'User',
                'email'             => 'user@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'last_logout_at'    => '2021-11-18 18:10:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
        ];

        User::insert($users);
    }
}
