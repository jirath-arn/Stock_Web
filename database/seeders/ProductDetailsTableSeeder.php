<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{
    public function run()
    {
        $product_details = [
            [
                'id'                => 1,
                'product_code_name' => 'A01',
                'product_color'     => 'สีแดง',
                'balance_amount'    => 20,
                'total_amount'      => 50,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 2,
                'product_code_name' => 'A01',
                'product_color'     => 'สีขาว',
                'balance_amount'    => 15,
                'total_amount'      => 50,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 3,
                'product_code_name' => 'A01',
                'product_color'     => 'สีดำ',
                'balance_amount'    => 7,
                'total_amount'      => 50,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 4,
                'product_code_name' => 'A02',
                'product_color'     => 'สีแดง',
                'balance_amount'    => 49,
                'total_amount'      => 100,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 5,
                'product_code_name' => 'A02',
                'product_color'     => 'สีฟ้า',
                'balance_amount'    => 100,
                'total_amount'      => 100,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        ProductDetail::insert($product_details);
    }
}
