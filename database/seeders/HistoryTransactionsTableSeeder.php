<?php

namespace Database\Seeders;

use App\Models\HistoryTransaction;
use Illuminate\Database\Seeder;

class HistoryTransactionsTableSeeder extends Seeder
{
    public function run()
    {
        $history_transactions = [
            [
                'id'                => 1,
                'detail'            => 'Admin Dome มีการสร้างสินค้าใหม่',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 2,
                'detail'            => 'User 1 มีการนำสินค้าออก 10 ตัว',
                'created_at'        => '2021-11-18 18:07:00',
                'updated_at'        => '2021-11-18 18:07:00',
            ],
            [
                'id'                => 3,
                'detail'            => 'User 2 มีการนำสินค้าออก 10 ตัว',
                'created_at'        => '2021-11-18 18:09:00',
                'updated_at'        => '2021-11-18 18:09:00',
            ],
            [
                'id'                => 4,
                'detail'            => 'User 3 มีการนำสินค้าออก 10 ตัว',
                'created_at'        => '2021-11-18 18:11:00',
                'updated_at'        => '2021-11-18 18:11:00',
            ],
            [
                'id'                => 5,
                'detail'            => 'User 4 มีการนำสินค้าออก 10 ตัว',
                'created_at'        => '2021-11-18 18:13:00',
                'updated_at'        => '2021-11-18 18:13:00',
            ],
            [
                'id'                => 6,
                'detail'            => 'User 5 มีการนำสินค้าออก 10 ตัว',
                'created_at'        => '2021-11-18 18:15:00',
                'updated_at'        => '2021-11-18 18:15:00',
            ],
        ];

        HistoryTransaction::insert($history_transactions);
    }
}
