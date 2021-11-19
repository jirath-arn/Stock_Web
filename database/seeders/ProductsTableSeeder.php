<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'code_name'         => 'A01',
                'category_id'       => 1,
                'product_name'      => 'เสื้อคอเต่า',
                'wholesale_price'   => '1000.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'A02',
                'category_id'       => 2,
                'product_name'      => 'กางเกงขายาว',
                'wholesale_price'   => '2600.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        Product::insert($products);
    }
}
