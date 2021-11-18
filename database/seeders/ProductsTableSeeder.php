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
                'product_name'      => 'เสื้อคอเต่า',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'A02',
                'product_name'      => 'เสื้อยืด',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        Product::insert($products);
    }
}
