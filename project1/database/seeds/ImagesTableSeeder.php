<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'image' => asset('images\1.jpg'),
                'imageable_id' => 4,
                'imageable_type' => 'App\News',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'image' => asset('images\1.jpg'),
                'imageable_id' => 5,
                'imageable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'image' => asset('images\1.jpg'),
                'imageable_id' => 6,
                'imageable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
