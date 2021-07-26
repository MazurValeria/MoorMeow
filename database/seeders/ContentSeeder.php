<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'name' => 'Цвет',
                'name_en' => 'Color',
                'options' => [
                    [
                        'name' => 'Светлый Беж',
                        'name_en' => 'Ivory',
                                            ],
                    [
                        'name' => 'Черный',
                        'name_en' => 'Black',
                                           ],
                    [
                        'name' => 'Серый',
                        'name_en' => 'Grey',
                                            ],
                    [
                        'name' => 'Оранжевый',
                        'name_en' => 'Orange',
                    ],
                    [
                        'name' => 'Красный',
                        'name_en' => 'Red',
                    ],
                    [
                        'name' => 'Синий',
                        'name_en' => 'Blue',
                    ],
                    [
                        'name' => 'Бордовый',
                        'name_en' => 'Wine Red',
                    ],
                    [
                        'name' => 'Темный беж',
                        'name_en' => 'Latte',
                    ],
                    [
                        'name' => 'Фиолетовый',
                        'name_en' => 'Purple',
                    ],
                    [
                        'name' => 'Салатовый',
                        'name_en' => 'Salad Green',
                    ],
                ],
            ],
            [
                'name' => 'Размеры',
                'name_en' => 'Dimensions',
                'options' => [
                    [
                        'name' => '37x45x58cm',
                        'name_en' => '37x45x58cm',
                    ],
                    [
                        'name' => '37x47x24cm',
                        'name_en' => '37x47x24cm',
                    ],
                    [
                        'name' => '37x60x24cm',
                        'name_en' => '37x60x24cm',
                    ],
                    [
                        'name' => '53x51x21cm',
                        'name_en' => '53x51x21cm',
                    ],
                ],
            ],
            [
                'name' => 'Цвет фанеры',
                'name_en' => 'Wood Colour',
                'options' => [
                    [
                        'name' => 'Светлый',
                        'name_en' => 'Light Wood',
                    ],
                    [
                        'name' => 'Темный',
                        'name_en' => 'Dark Wood',
                    ],
                ],
            ],
        ];


        foreach ($properties as $property) {
            $property['created_at'] = Carbon::now();
            $property['updated_at'] = Carbon::now();
            $options = $property['options'];
            unset($property['options']);
            $propertyId = DB::table('properties')->insertGetId($property);

            foreach ($options as $option) {
                $option['created_at'] = Carbon::now();
                $option['updated_at'] = Carbon::now();
                $option['property_id'] = $propertyId;
                DB::table('property_options')->insert($option);

            }
        }

        $categories = [
            [
                'name' => 'Гамачок оконный',
                'name_en' => 'Window Hammock',
                'code' => 'window',
                'description' => 'Идеальный мягкий гамачок для любителей вечно полежать!',
                'description_en' => 'An ideal hammock for your furry friend!',
                'image' => 'categories/windowhammockcatopt.png',
                'products' =>[
                    [
                        'name' => 'Гамачок оконный',
                        'name_en' => 'Window Hammock',
                        'code' => 'window',
                        'description' => 'Идеальный мягкий гамачок для любителей вечно полежать!',
                        'description_en' => 'An ideal hammock for your furry friend!',
                        'image' => 'categories/windowhammockcatopt.png',
                        'properties'=>[
                            1,
                        ],
                        'options' =>[
                            [
                                1, 11,
                            ],
                            [
                                2, 11,
                            ],
                            [
                                3, 11,
                            ],
                            [
                                4, 11,
                            ],
                            [
                                5, 11,
                            ],
                            [
                                6, 11,
                            ],
                            [
                                7, 11,
                            ],
                            [
                                8, 11,
                            ],
                            [
                                9, 11,
                            ],
                            [
                                10, 11,
                            ],
                        ],
                    ],
            ],
                ],
            [
                'name' => 'Гамачок на батарею',
                'name_en' => 'Radiator hammock',
                'code' => 'battery S',
                'description' => 'Вот кому будет теплей всего зимой!',
                'description_en' => 'Look who is the luckiest now!',
                'image' => 'categories/batteryhammockcatopt.jpeg',
                'products' =>[

                    [
                        'name' => 'Гамачок на батарею стандарт',
                        'name_en' => 'Radiator hammock',
                        'code' => 'battery S',
                        'description' => 'Вот кому будет теплей всего зимой!',
                        'description_en' => 'Look who is the luckiest now!',
                        'image' => 'products/Moormeow_batteryhammock_wine.jpeg',
                        'properties'=>[
                            1, 2,
                        ],
                        'options' =>[
                            [
                                1, 12,
                            ],
                            [
                                2, 12,
                            ],
                            [
                                3, 12,
                            ],
                            [
                                4, 12,
                            ],
                            [
                                5, 12,
                            ],
                            [
                                6, 12,
                            ],
                            [
                                7, 12,
                            ],
                            [
                                8, 12,
                            ],
                            [
                                9, 12,
                            ],
                            [
                                10, 12,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Гамачок на батарею большой',
                        'name_en' => 'Radiator hammock',
                        'code' => 'battery xl',
                        'description' => 'Вот кому будет теплей всего зимой!',
                        'description_en' => 'Look who is the luckiest now!',
                        'image' => 'products/Moormeow_batteryhammock_blue.jpeg',
                        'properties'=>[
                            1, 2
                        ],
                        'options' =>[
                            [
                                1, 13,
                            ],
                            [
                                2, 13,
                            ],
                            [
                                3, 13,
                            ],
                            [
                                4, 13,
                            ],
                            [
                                5, 13,
                            ],
                            [
                                6, 13,
                            ],
                            [
                                7, 13,
                            ],
                            [
                                8, 13,
                            ],
                            [
                                9, 13,
                            ],
                            [
                                10, 13,
                            ],
                        ],
                    ],
            ],
                ],

            [
                'name' => 'Гамачок напольный',
                'name_en' => 'Floor hammock',
                'code' => 'floor',
                'description' => 'Отличный классический лежачок для вашего любимца!',
                'description_en' => 'The best offer for your lovely pet!',
                'image' => 'categories/floorhammockcatopt.jpeg',
                'products' =>[
                    [
                        'name' => 'Гамачок напольный светлое дерево',
                        'name_en' => 'Floor hammock light',
                        'code' => 'floor light',
                        'description' => 'Отличный классический лежачок для вашего любимца!',
                        'description_en' => 'The best offer for your lovely pet!',
                        'image' => 'products/Moormeow_hammock_black.jpeg',
                        'properties'=>[
                            1, 2, 3
                        ],
                        'options' =>[
                            [
                                1, 14, 15,
                            ],
                            [
                                2, 14, 15,
                            ],
                            [
                                3, 14, 15,
                            ],
                            [
                                4, 14, 15,
                            ],
                            [
                                5, 14, 15,
                            ],
                            [
                                6, 14, 15,
                            ],
                            [
                                7, 14, 15,
                            ],
                            [
                                8, 14, 15,
                            ],
                            [
                                9, 14, 15,
                            ],
                            [
                                10, 14, 15,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Гамачок напольный темное дерево',
                        'name_en' => 'Floor hammock dark',
                        'code' => 'floor dark',
                        'description' => 'Отличный классический лежачок для вашего любимца!',
                        'description_en' => 'The best offer for your lovely pet!',
                        'image' => 'products/Moormeow_hammock_latte2.jpeg',
                        'properties'=>[
                            1, 3,
                        ],
                        'options' =>[
                            [
                                1, 14, 16,
                            ],
                            [
                                2, 14, 16,
                            ],
                            [
                                3, 14, 16,
                            ],
                            [
                                4, 14, 16,
                            ],
                            [
                                5, 14, 16,
                            ],
                            [
                                6, 14, 16,
                            ],
                            [
                                7, 14, 16,
                            ],
                            [
                                8, 14, 16,
                            ],
                            [
                                9, 14, 16,
                            ],
                            [
                                10, 14, 16,
                            ],
                        ],
                    ],
            ],
                ],
            [
                'name' => 'Наборы с гамачками',
                'name_en' => 'Hammock Set',
                'code' => 'set',
                'description' => 'Если душа просит осчасливить любимца вдвойне!',
                'description_en' => 'What if you want double pleasure for your pet?',
                'image' => 'categories/hammocksetcatopt.jpeg',
                'products' =>[
                    [
                        'name' => 'Наборы с гамачками',
                        'name_en' => 'Hammock Set',
                        'code' => 'set',
                        'description' => 'Если душа просит осчасливить любимца вдвойне!',
                        'description_en' => 'What if you want double pleasure for your pet?',
                        'image' => 'products/Moormeow_hammockset_salad.jpeg',
                        'properties'=>[
                            1,
                        ],
                        'options' =>[
                            [
                                1,
                            ],
                            [
                                2,
                            ],
                            [
                                3,
                            ],
                            [
                                4,
                            ],
                            [
                                5,
                            ],
                            [
                                6,
                            ],
                            [
                                7,
                            ],
                            [
                                8,
                            ],
                            [
                                9,
                            ],
                            [
                                10,
                            ],
                        ],
                    ],
            ],
                ],
        ];

        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            $products = $category['products'];
            unset($category['products']);
            $categoryId = DB::table('categories')->insertGetId($category);

            foreach ($products as $product) {
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();
                $product['hit'] = !boolval(rand(0, 3));
                $product['recommend'] = rand(0, 1);
                $product['new'] = rand(0, 1);
                $product['category_id'] = $categoryId;

                if (isset($product['properties'])) {
                    $properties = $product['properties'];
                    unset($product['properties']);
                    $skusOptions = $product['options'];
                    unset($product['options']);
                }

                $productId = DB::table('products')->insertGetId($product);

                if (isset($properties)) {
                    foreach ($properties as $propertyId) {
                        DB::table('property_product')->insert([
                            'product_id' => $productId,
                            'property_id' => $propertyId,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }

                    foreach ($skusOptions as $skuOptions) {
                        $skuId = DB::table('skus')->insertGetId([
                            'product_id' => $productId,
                            'count' => rand(1, 100),
                            'price' => rand(5000, 100000),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

                        foreach ($skuOptions as $skuOption) {
                            $skuData['sku_id'] = $skuId;
                            $skuData['property_option_id'] = $skuOption;
                            $skuData['created_at'] = Carbon::now();
                            $skuData['updated_at'] = Carbon::now();

                            DB::table('sku_property_option')->insert($skuData);
                        }
                    }

                    unset($properties);
                } else {
                    DB::table('skus')->insert([
                        'product_id' => $productId,
                        'count' => rand(1, 100),
                        'price' => rand(5000, 100000),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
