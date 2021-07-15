<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('currencies')->truncate();

        \DB::table('currencies')->insert([
            [
                'code' => 'MDL',
                'symbol' => 'MDL',
                'is_main' => 1,
                'rate' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'code' => 'USD',
                'symbol' => 'USD',
                'is_main' => 0,
                'rate' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'EUR',
                'symbol' => 'EUR',
                'is_main' => 0,
                'rate' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
