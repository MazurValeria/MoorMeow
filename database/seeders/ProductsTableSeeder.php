<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Гамачок на батарею стандарт',
                'name_en' => 'Radiator hammock',
                'code' => 'battery S',
                'description' => 'РАЗМЕР:	37х47 см.
                                  ВЫСОТА:	24 см.
                                  ДЛЯ КОТОВ:	до 12 кг.
                                  ДЛЯ БАТАРЕЙ:	3-10 см.',
                'category_id'=> 2,
                'image' => 'storage/categories/Images/Moormeow_batteryhammock_black.jpeg',
            ],
            [
                'name' => 'Гамачок на батарею большой',
                'name_en' => 'Radiator hammock',
                'code' => 'battery xl',
                'description' => 'РАЗМЕР:	37х60 см.
                                  ВЫСОТА:	24 см.
                                  ДЛЯ КОТОВ:	до 12 кг.
                                  ДЛЯ БАТАРЕЙ:	3-17 см.',
                'category_id'=> 2,
                'image' => 'storage/categories/Images/Moormeow_batteryhammock_blue.jpeg',
            ],
            [
                'name' => 'Гамачок напольный светлое дерево',
                'name_en' => 'Floor hammock light',
                'code' => 'floor light',
                'description' => 'РАЗМЕР:	53х51 см.
                                  ВЫСОТА:	21 см.
                                  ДЛЯ КОТОВ:	до 12 кг.
                                  РАЗМЕР УПАКОВКИ:	52х25х9 см.',
                'category_id'=> 3,
                'image' => 'storage/categories/Images/Moormeow_hammock_grey.jpeg',
            ],
            [
                'name' => 'Гамачок напольный темное дерево',
                'name_en' => 'Floor hammock dark',
                'code' => 'floor dark',
                'description' => 'РАЗМЕР:	53х51 см.
                                  ВЫСОТА:	21 см.
                                  ДЛЯ КОТОВ:	до 12 кг.
                                  РАЗМЕР УПАКОВКИ:	52х25х9 см.',
                'category_id'=> 3,
                'image' => 'storage/categories/Images/Moormeow_hammock_wine.jpeg',
            ],
            [
                'name' => 'Гамачок оконный',
                'name_en' => 'Window hanging hammock',
                'code' => 'window',
                'description' => 'РАЗМЕР:	37х45 см.
                                  ВЫСОТА:	58 см.
                                  ДЛЯ КОТОВ:	до 12 кг.',
                'category_id'=> 1,
                'image' => 'storage/categories/Images/Moormeow_windowhammock_red.jpeg',
            ],
            [
                'name' => 'Наборы с гамачками',
                'name_en' => 'Hammock set',
                'code' => 'set',
                'description' => 'В набор входит:
                                  - Гамачок напольный
                                  - Гамачок на батарею',
                'category_id'=> 4,
                'image' => 'storage/categories/Images/hammockset.jpeg',
            ],
        ],
        );
    }
}
