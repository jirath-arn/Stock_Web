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
                'name'              => 'Admin Dome',
                'email'             => 'dome@admin.com',
                'password'          => '$2y$10$Uhe3/biAz6AEJlyTS555M.TF9SvTsqVx2ndcLGt6O1okij/.emkve',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:31',
                'updated_at'        => '2021-10-24 01:55:31',
            ],
            [
                'id'                => 2,
                'role_id'           => 1,
                'name'              => 'Admin Ice',
                'email'             => 'ice@admin.com',
                'password'          => '$2y$10$Uhe3/biAz6AEJlyTS555M.TF9SvTsqVx2ndcLGt6O1okij/.emkve',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:31',
                'updated_at'        => '2021-10-24 01:55:31',
            ],
            [
                'id'                => 3,
                'role_id'           => 2,
                'name'              => 'User 1',
                'email'             => 'user1@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 4,
                'role_id'           => 2,
                'name'              => 'User 2',
                'email'             => 'user2@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 5,
                'role_id'           => 2,
                'name'              => 'User 3',
                'email'             => 'user3@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 6,
                'role_id'           => 2,
                'name'              => 'User 4',
                'email'             => 'user4@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 7,
                'role_id'           => 2,
                'name'              => 'User 5',
                'email'             => 'user5@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 8,
                'role_id'           => 2,
                'name'              => 'User 6',
                'email'             => 'user6@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 9,
                'role_id'           => 2,
                'name'              => 'User 7',
                'email'             => 'user7@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 10,
                'role_id'           => 2,
                'name'              => 'User 8',
                'email'             => 'user8@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 11,
                'role_id'           => 2,
                'name'              => 'User 9',
                'email'             => 'user9@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
            [
                'id'                => 12,
                'role_id'           => 2,
                'name'              => 'User 10',
                'email'             => 'user10@user.com',
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'email_verified_at' => null,
                'last_login_at'     => '2021-11-18 18:00:00',
                'created_at'        => '2021-10-24 01:55:32',
                'updated_at'        => '2021-10-24 01:55:32',
            ],
        ];

        User::insert($users);
    }
}
