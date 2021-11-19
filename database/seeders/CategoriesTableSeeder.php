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
        ];

        Category::insert($categories);
    }
}
