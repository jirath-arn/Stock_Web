<?php

namespace Database\Seeders;

use App\Models\HistoryAuthentication;
use Illuminate\Database\Seeder;

class HistoryAuthenticationsTableSeeder extends Seeder
{
    public function run()
    {
        $history_authentications = [
            [
                'id'                => 1,
                'user_id'           => 1,
                'detail'            => 'มีการเข้าสู่ระบบ',
                'created_at'        => '2021-11-18 18:00:00',
            ],
            [
                'id'                => 2,
                'user_id'           => 1,
                'detail'            => 'มีการออกจากระบบ',
                'created_at'        => '2021-11-18 18:10:00',
            ],
            [
                'id'                => 3,
                'user_id'           => 2,
                'detail'            => 'มีการเข้าสู่ระบบ',
                'created_at'        => '2021-11-18 18:00:00',
            ],
            [
                'id'                => 4,
                'user_id'           => 2,
                'detail'            => 'มีการออกจากระบบ',
                'created_at'        => '2021-11-18 18:10:00',
            ],
        ];

        HistoryAuthentication::insert($history_authentications);
    }
}
