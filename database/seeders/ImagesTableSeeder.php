<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        $images = [
            [
                'id'                => 1,
                'product_code_name' => 'A01',
                'filename'          => '1622264489_1.jpg',
                'path'              => '1/restaurant_1/1622264489_1.jpg',
                'size'              => 457300,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 2,
                'product_code_name' => 'A02',
                'filename'          => '1622264489_2.jpg',
                'path'              => '1/restaurant_1/1622264489_2.jpg',
                'size'              => 580544,
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        Image::insert($images);
    }
}
