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
                'user_id'           => 1,
                'detail'            => 'มีการสร้างสินค้าใหม่',
                'created_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 2,
                'user_id'           => 2,
                'detail'            => 'มีการนำสินค้าออก',
                'created_at'        => '2021-11-18 18:07:00',
            ],
        ];

        HistoryTransaction::insert($history_transactions);
    }
}
