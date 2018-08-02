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
                'image' => 'http://file.vforum.vn/hinh/2015/05/dien-thoai-chup-hinh-dep-nhat.jpg',
                'imageable_id' => 4,
                'imageable_type' => 'App\News',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'image' => 'http://genknews.genkcdn.vn/2014/1-1-lg-g2463-1386867599903-1390406958192.jpg',
                'imageable_id' => 5,
                'imageable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'image' => 'https://www.duchuymobile.com/image/cache/data/tin-tuc/0002/mua-iphone-6-lock-duchuymobile-1-480x271.png',
                'imageable_id' => 6,
                'imageable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
