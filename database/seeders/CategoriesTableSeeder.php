<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id'         => 1,
                'title'      => 'เสื้อ',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => 2,
                'title'      => 'กางเกง',
                'created_at' => '2019-09-15 06:10:06',
                'updated_at' => '2019-09-15 06:10:06',
            ],
            [
                'id'         => 3,
                'title'      => 'รองเท้า',
                'created_at' => '2019-09-15 06:10:06',
                'updated_at' => '2019-09-15 06:10:06',
            ],
            [
                'id'         => 4,
                'title'      => 'ถุงมือ',
                'created_at' => '2019-09-15 06:10:06',
                'updated_at' => '2019-09-15 06:10:06',
            ],
            [
                'id'         => 5,
                'title'      => 'ผ้าพันคอ',
                'created_at' => '2019-09-15 06:10:06',
                'updated_at' => '2019-09-15 06:10:06',
            ],
            [
                'id'         => 6,
                'title'      => 'หมวก',
                'created_at' => '2019-09-15 06:10:06',
                'updated_at' => '2019-09-15 06:10:06',
            ],
        ];

        Category::insert($categories);
    }
}
