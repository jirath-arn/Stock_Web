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
                'product_name'      => 'เสื้อยืดมินิมอล',
                'wholesale_price'   => '1000.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'A02',
                'category_id'       => 1,
                'product_name'      => 'เสื้อยืด Over Size',
                'wholesale_price'   => '2600.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'A03',
                'category_id'       => 1,
                'product_name'      => 'เสื้อยืดเรียบง่าย',
                'wholesale_price'   => '2300.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'A04',
                'category_id'       => 1,
                'product_name'      => 'เสื้อยืดตัวใหญ่',
                'wholesale_price'   => '2300.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'B01',
                'category_id'       => 1,
                'product_name'      => 'เสื้อยืดแขนสั้น',
                'wholesale_price'   => '3100.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'code_name'         => 'C01',
                'category_id'       => 2,
                'product_name'      => 'กางเกงขาสั้น',
                'wholesale_price'   => '1100.00',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        Product::insert($products);
    }
}
