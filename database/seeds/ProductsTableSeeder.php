<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
                'name' => 'HTC M8',
                'description' => 'sieu pham 2016',
                'price' => 1000000,
                'view' => 111,
                'ram' => 8,
                'hard_disk' => '1TB',
                'specification_more' => str_random(10),
                'slug' => Str::slug('HTC M8','-'),
                'cpu' => '3Hz',
                'operating_system' => 'android 8.0',
                'pin' => 2000,
                'screen' => '5.5 inch',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sony Z3',
                'description' => 'sieu pham 2015',
                'price' => 900000,
                'view' => 71,
                'ram' => 3,
                'hard_disk' => '32GB',
                'specification_more' => str_random(10),
                'slug' => Str::slug('Sony Z3','-'),
                'cpu' => '3Hz',
                'operating_system' => 'android 6.0',
                'pin' => 2200,
                'screen' => '5 inch',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'iphone 6s',
                'description' => 'sieu pham 2017',
                'price' => 1200000,
                'view' => 141,
                'ram' => 2,
                'hard_disk' => '32GB',
                'specification_more' => str_random(10),
                'slug' => Str::slug('iphone 6s','-'),
                'cpu' => '3Hz',
                'operating_system' => 'apple 12.0',
                'pin' => 1750,
                'screen' => '4.7 inch',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
