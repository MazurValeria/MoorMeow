<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name'=>'Гамачок оконный',
                'code'=> 'window',
                'description' => 'Гамачок оконный для кота',
                'image' =>'categories/windowhammock.jpeg',
            ],
            [
                'name'=>'Гамачок на батарею',
                'code'=> 'battery',
                'description' => 'Гамачок напольный для кота',
                'image' =>'categories/batteryhammock.jpeg',
            ],
            [
                'name'=>'Гамачок напольный',
                'code'=> 'floor',
                'description' => 'Гамачок на батарею для кота',
                'image' =>'categories/floorhammock.jpeg',
            ],
            [
                'name'=>'Набор с гамачками',
                'code'=> 'set',
                'description' => 'Набор с гамачками',
                'image' =>'categories/hammockset.jpeg',
            ],
        ]);
    }
}
