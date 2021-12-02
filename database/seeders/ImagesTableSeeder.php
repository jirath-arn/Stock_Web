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
                'base64'            => '',
                'mime'              => 'data:image/png;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 2,
                'product_code_name' => 'A02',
                'base64'            => '',
                'mime'              => 'data:image/png;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 3,
                'product_code_name' => 'A03',
                'base64'            => '',
                'mime'              => 'data:image/png;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 4,
                'product_code_name' => 'A04',
                'base64'            => '',
                'mime'              => 'data:image/png;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 5,
                'product_code_name' => 'B01',
                'base64'            => '',
                'mime'              => 'data:image/jpeg;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
            [
                'id'                => 6,
                'product_code_name' => 'C01',
                'base64'            => '',
                'mime'              => 'data:image/jpeg;base64,',
                'created_at'        => '2021-11-18 18:05:00',
                'updated_at'        => '2021-11-18 18:05:00',
            ],
        ];

        Image::insert($images);
    }
}
